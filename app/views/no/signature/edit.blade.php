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

@section('css')
    <link rel="stylesheet" href="{{ URL::to('/') }}/datepicker/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/bower_components/chosen-bootstrap/chosen.bootstrap.min.css">
    <style>
        .datepicker table tr td.active:hover, .datepicker table tr td.active:hover:hover, .datepicker table tr td.active.disabled:hover, .datepicker table tr td.active.disabled:hover:hover, .datepicker table tr td.active:focus, .datepicker table tr td.active:hover:focus, .datepicker table tr td.active.disabled:focus, .datepicker table tr td.active.disabled:hover:focus, .datepicker table tr td.active:active, .datepicker table tr td.active:hover:active, .datepicker table tr td.active.disabled:active, .datepicker table tr td.active.disabled:hover:active, .datepicker table tr td.active.active, .datepicker table tr td.active:hover.active, .datepicker table tr td.active.disabled.active, .datepicker table tr td.active.disabled:hover.active, .open .dropdown-toggle.datepicker table tr td.active, .open .dropdown-toggle.datepicker table tr td.active:hover, .open .dropdown-toggle.datepicker table tr td.active.disabled, .open .dropdown-toggle.datepicker table tr td.active.disabled:hover {
            color: #fff;
            background-color: #1ab394;
            border-color: #1ab394;
        }
        .chosen-results > li.highlighted {
            color: #fff;
            background-color: #1ab394;
        }
    </style>
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
          <div class="col-md-10">
            <div class="form-group">
              <label class="control-label col-md-3" for="user_id">User</label>
              <div class="col-md-6">
                <label class="control-label">{{ $signature->user->nama }} - {{ $signature->user->jabatan }}</label>
                <input type="hidden" value="{{ $signature->user->id }}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3" for="signature_pic">Signature Pic</label>
              <div class="col-md-6">
                <img src="{{ URL::to('/').$signature->signature_pic }}" width="100" height="100">
                <input class="form-control" type="file" name="file" id="signature_pic">
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

@section('js')
    <script src="{{ URL::to('/') }}/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ URL::to('/') }}/chosen/chosen.jquery.js"></script>
    <script src="{{ URL::to('/') }}/bower_components/numeral/numeral.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/bower_components/moment/moment.js"></script>
    <script type="text/javascript">
        $('.chosen').chosen();
    </script>    
@stop       
