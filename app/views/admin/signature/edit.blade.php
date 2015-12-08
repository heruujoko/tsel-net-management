@extends('layouts.layout')
@section('title', 'Edit Tanda Tangan')
@section('breadcrumb')
<h2>Tanda Tangan</h2>
<ol class="breadcrumb">
  <li>
    <strong>Tanda Tangan</strong>
  </li>
  <li class="active">
    <strong>Edit Tanda Tangan</strong>
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
          {{ Form::open(array('method'=> 'PATCH', 'url' => 'admin/signature/'.$signature->id.'' , 'class' => 'form form-horizontal')) }}
          <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label col-md-3" for="user_id">User ID</label>
              <div class="col-md-6">
                <input class="form-control" type="text" name="user_id" id="user_id" value="{{ $signature->user_id }}" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3" for="signature_pic">Signature Pic</label>
              <div class="col-md-6">
                <input class="form-control" type="text" name="signature_pic" id="signature_pic" value="{{ $signature->signature_pic }}" required>
              </div>
            </div>
          </div>
          </div>
          <div class="form-group">
            {{ Form::submit('Save', array('class'=>'btn btn-block btn-primary')) }}
          </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</div>
@stop
