@extends('layouts.layout')
@section('title', 'Users')
@section('breadcrumb')
    <h2>Bantek</h2>
    <ol class="breadcrumb">
        <li class="active">
            <strong>Users</strong>
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
        <div class="panel-options">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-1">List User</a></li>
                <li><a data-toggle="tab" href="#tab-2">Create User</a></li>
            </ul>
        </div>
        <div class="panel-body">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="1%">ID</th>
                                <th>Nama</th>
                                <th>jabatan</th>
                                <th>Cluster</th>
                                <th>Bank</th>
                                <th>No Rekening</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->jabatan }}</td>
                                    <td>{{ $user->cluster }}</td>
                                    <td>{{ $user->bank }}</td>
                                    <td>{{ $user->no_rekening }}</td>
                                    <td>
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a href="{{ URL::to('/') }}/admin/users/{{ $user->id }}/edit">Edit</a></li>
                                          <li><a href="{{ URL::to('/') }}/admin/users/{{ $user->id }}/delete">Delete</a></li>
                                        </ul>
                                      </div>
                                  </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="tab-2" class="tab-pane">
                    {{ Form::open(array('url' => 'admin/users' , 'class' => 'form form-horizontal')) }}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-3" for="nama">Nama</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="nama" id="nama" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="email">Email</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="email" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="password">Password</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="password" name="password" id="password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="cpassword">Confirm Password</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="password" name="cpassword" id="cpassword" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="role">Role</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="role" id="role" required>
                                        <option value="admin">Admin</option>
                                        <option value="no">User NO</option>
                                        <option value="bantek">Bantek</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="jabatan">Jabatan</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="jabatan" id="jabatan" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="cluster">Cluster</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="cluster" id="cluster" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="nik">NIK</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="nik" id="nik" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="lokasi">Lokasi Kerja</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="lokasi" id="lokasi" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="bank">Bank</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="bank" id="bank" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="rekening">No Rekening</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="rekening" id="rekening" required>
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
  </div>
</div>
@stop
