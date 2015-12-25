@extends('layouts.layout')
@section('title', 'FPL')
@section('breadcrumb')
    <h2>Surat Permintaan Penawaran Harga</h2>
    <ol class="breadcrumb">
        <li class="">
            <strong>SPPH</strong>
        </li>
        <li class="active">
            <strong>Edit</strong>
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
                <div class="row">
                    <div class="col-md-10">
                        {{ Form::open(array('method'=> 'PATCH', 'url' => 'admin/spph/'.$spph->id.'' , 'class' => 'form form-horizontal')) }}
                        <div class="form-group">
                                <label class="control-label col-md-3" for="kepada">Kepada</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="kepada" id="kepada" value="{{ $spph->kepada }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="perihal">Perihal</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="perihal" id="perihal" value="{{ $spph->perihal }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="kegiatan">Kegiatan</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="kegiatan" id="kegiatan" value="{{ $spph->kegiatan }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="jangka_waktu">Jangak Waktu</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="jangka_waktu" id="jangka_waktu" value="{{ $spph->jangka_waktu }}" placeholder="dalam hari" required>
                                </div>
                            </div>
                        <div class="form-group">
                          {{ Form::submit('Save', array('class'=>'btn btn-primary col-md-offset-3')) }}
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
