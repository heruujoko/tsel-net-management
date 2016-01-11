@extends('layouts.layout')
@section('title', 'Edit Mitra')
@section('breadcrumb')
<h2>Mitra</h2>
<ol class="breadcrumb">
  <li>
    <strong>Mitra</strong>
  </li>
  <li class="active">
    <strong>Edit Mitra</strong>
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
          {{ Form::open(array('method'=> 'PATCH', 'url' => 'admin/mitra/'.$mitra->id.'' , 'class' => 'form form-horizontal')) }}
          <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label col-md-3" for="nama">Nama</label>
              <div class="col-md-6">
                <input class="form-control" type="text" name="nama" id="nama" value="{{ $mitra->nama }}" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3" for="cluster">Cluster</label>
              <div class="col-md-6">
                <input class="form-control" type="text" name="cluster" id="cluster" value="{{ $mitra->cluster }}" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3" for="pic">Pic</label>
              <div class="col-md-6">
                <input class="form-control" type="text" name="pic" id="pic" value="{{ $mitra->pic }}" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3" for="hp">Hp</label>
              <div class="col-md-6">
                <input class="form-control" type="text" name="hp" id="hp" value="{{ $mitra->hp }}" required>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label col-md-3" for="no_rekening">No Rekening</label>
              <div class="col-md-6">
                <input class="form-control" type="text" name="no_rekening" id="no_rekening" value="{{ $mitra->no_rekening }}" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3" for="nama_rekening">Nama Rekening</label>
              <div class="col-md-6">
                <input class="form-control" type="text" name="nama_rekening" id="nama_rekening" value="{{ $mitra->nama_rekening }}" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3" for="bank">Bank</label>
              <div class="col-md-6">
                <input class="form-control" type="text" name="bank" id="bank" value="{{ $mitra->bank }}" required>
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
