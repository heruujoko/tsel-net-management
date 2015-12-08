@extends('layouts.layout')
@section('title', 'Tanda Tangan')
@section('breadcrumb')
    <h2>Tanda Tangan</h2>
    <ol class="breadcrumb">
        <li class="active">
            <strong>Tanda Tangan</strong>
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
                <li class="active"><a data-toggle="tab" href="#tab-1">List Tanda Tangan</a></li>
                <li><a data-toggle="tab" href="#tab-2">Create Tanda Tangan</a></li>
            </ul>
        </div>
        <div class="panel-body">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="1%">ID</th>
                                <th>User ID</th>
                                <th>Signature Pic</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($signature as $sign)
                                <tr>
                                    <td>{{ $sign->id }}</td>
                                    <td>{{ $sign->user_id }}</td>
                                    <td>{{ $sign->signature_pic }}</td>
                                    <td>
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a href="{{ URL::to('/') }}/admin/signature/{{ $sign->id }}/edit">Edit</a></li>
                                          <li><a href="{{ URL::to('/') }}/admin/signature/{{ $sign->id }}/delete">Delete</a></li>
                                        </ul>
                                      </div>
                                  </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="tab-2" class="tab-pane">
                    {{ Form::open(array('url' => 'admin/signature' , 'class' => 'form form-horizontal')) }}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-3" for="user_id">User ID</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="user_id" type="text" id="user_id" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="signature_pic">Signature Pic</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="signature_pic" type="text" id="signature_pic" required>
                                </div>
                            </div>
                            <div class="form-group">
                              {{ Form::submit('Save', array('class'=>'btn btn-primary btn-block')) }}
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
