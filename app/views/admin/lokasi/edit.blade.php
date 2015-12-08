@extends('layouts.layout')
@section('title', 'Edit Bantek')
@section('breadcrumb')
<h2>Lokasi</h2>
<ol class="breadcrumb">
  <li>
    <strong>Lokasi</strong>
  </li>
  <li class="active">
    <strong>Edit Lokasi</strong>
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
          {{ Form::open(array('method' => 'PATCH', 'url' => 'admin/lokasikerja/'.$lokasi->id.'' , 'class' => 'form form-horizontal')) }}
          <div class="col-md-12">
            <div class="form-group">
                <label class="control-label col-md-3" for="nama">Nama</label>
                <div class="col-md-6">
                  <input class="form-control" name="nama" id="nama" value="{{ $lokasi->nama }}" required autofocus>
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
