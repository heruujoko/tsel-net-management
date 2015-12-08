@extends('layouts.layout')
@section('title', 'Edit Bantek')
@section('breadcrumb')
<h2>Users</h2>
<ol class="breadcrumb">
  <li>
    <strong>Users</strong>
  </li>
  <li class="active">
    <strong>Edit User</strong>
  </li>
</ol>
@stop

@section('content')
<div class="row">
  @if(Session::get('error'))
  <div class="alert alert-danger alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    {{ Session::get('error') }}
  </div>
  @elseif(Session::get('success'))
  <div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    {{ Session::get('success') }}
  </div>
  @else
  @endif
  <div class="col-lg-12">
    <div class="ibox">
      <div class="ibox-content">
        <div class="panel-body">
          {{ Form::open(array('method' => 'PATCH', 'url' => 'admin/users/'.$user->id.'' , 'class' => 'form form-horizontal')) }}
          <div class="col-md-12">
            <div class="form-group">
                <label class="control-label col-md-3" for="nama">Nama</label>
                <div class="col-md-6">
                  <input class="form-control" name="nama" id="nama" value="{{ $user->nama }}" required autofocus>
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3" for="email">Email</label>
              <div class="col-md-6">
                <input class="form-control" type="email" name="email" id="email" value="{{ $user->email }}" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3" for="password">Password</label>
              <div class="col-md-6">
                <input class="form-control" type="password" name="password" id="password" placeholder="biarkan kosong jika tidak ingin merubah password">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3" for="cpassword">Confirm Password</label>
              <div class="col-md-6">
                <input class="form-control" type="password" name="cpassword" id="cpassword" placeholder="biarkan kosong jika tidak ingin merubah password">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3" for="role">Role</label>
                <div class="col-md-6">
                  <select class="form-control" name="role" id="role" required>
                    @if($user->role == 'admin')
                      <option selected value="admin">Admin</option>
                    @else
                      <option value="admin">Admin</option>
                    @endif
                    @if($user->role == 'no')
                      <option selected value="no">User No</option>
                    @else
                      <option value="no">Admin</option>
                    @endif
                    @if($user->role == 'bantek')
                      <option selected value="bantek">Bantek</option>
                    @else
                      <option value="bantek">Bantek</option>
                    @endif
                  </select>
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3" for="jabatan">Jabatan</label>
              <div class="col-md-6">
                <input class="form-control" name="jabatan" id="jabatan" value="{{ $user->jabatan }}" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3" for="cluster">Cluster</label>
              <div class="col-md-6">
                <input class="form-control" name="cluster" id="cluster" value="{{ $user->cluster }}" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3" for="nik">NIK</label>
                <div class="col-md-6">
                  <input class="form-control" name="nik" id="nik" value="{{ $user->nik }}" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3" for="lokasi">Lokasi Kerja</label>
                <div class="col-md-6">
                  <select class="form-control" name="lokasi" id="lokasi" required>  
                  @foreach($lokasi as $lok)
                    @if($lok->id == $user->lokasi_kerja_id)
                      <option selected value="{{ $lok->id }}">{{ $lok->nama }}</option>
                    @else
                      <option value="{{ $lok->id }}">{{ $lok->nama }}</option>
                    @endif  
                  @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3" for="bank">Bank</label>
                  <div class="col-md-6">
                    <input class="form-control" name="bank" id="bank" value="{{ $user->bank }}" required>
                  </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3" for="rekening">No Rekening</label>
                <div class="col-md-6">
                  <input class="form-control" name="rekening" id="rekening" value="{{ $user->no_rekening }}" required>
                </div>
              </div>
            <div class="form-group">
              {{ Form::submit('Save', array('class'=>'btn btn-primary col-md-offset-3')) }}
            </div>
          </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</div>
@stop
