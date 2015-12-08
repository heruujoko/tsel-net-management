@extends('layouts.layout')
@section('title', 'Bantek')
@section('breadcrumb')
    <h2>Bantek</h2>
    <ol class="breadcrumb">
        <li class="active">
            <strong>Bantek</strong>
        </li>
    </ol>
@stop

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="ibox">
    <div class="ibox-content">
        <div class="panel-options">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-1">List Bantek</a></li>
                <li><a data-toggle="tab" href="#tab-2">Create Bantek</a></li>
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
                                <th>Hp</th>
                                <th>Perusahaan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($banteks as $bantek)
                                <tr>
                                    <td>{{ $bantek->id }}</td>
                                    <td>{{ $bantek->nama }}</td>
                                    <td>{{ $bantek->hp }}</td>
                                    <td>{{ $bantek->perusahaan }}</td>
                                    <td>
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a href="{{ URL::to('/') }}/admin/{{ $bantek->id }}/edit">Edit</a></li>
                                          <li><a href="{{ URL::to('/') }}/admin/{{ $bantek->id }}/delete">Delete</a></li>
                                        </ul>
                                      </div>
                                  </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="tab-2" class="tab-pane">
                    {{ Form::open(array('url' => 'admin/bantek' , 'class' => 'form form-horizontal')) }}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-3" for="nama">Nama</label>
                                <div class="col-md-6">
                                    <input class="form-control datepicker" name="nama" id="nama" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="hp">Hp</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="nama_pemohon" id="hp" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="perusahaan">Perusahaan</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="perusahaan" id="perusahaan" required>
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
