@extends('layouts.layout')
@section('title', 'Users')
@section('breadcrumb')
    <h2>Lokasi</h2>
    <ol class="breadcrumb">
        <li class="active">
            <strong>Lokasi</strong>
        </li>
    </ol>
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/bower_components/datatables-bootstrap3-plugin/media/css/datatables-bootstrap3.min.css">
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
                <li class="active"><a data-toggle="tab" href="#tab-1">List Lokasi</a></li>
                <li><a data-toggle="tab" href="#tab-2">Create Lokasi</a></li>
            </ul>
        </div>
        <div class="panel-body">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th width="1%">ID</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lokasi as $lok)
                                <tr>
                                    <td>{{ $lok->id }}</td>
                                    <td>{{ $lok->nama }}</td>
                                    <td>
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a href="{{ URL::to('/') }}/admin/lokasikerja/{{ $lok->id }}/edit">Edit</a></li>
                                          <li><a href="{{ URL::to('/') }}/admin/lokasikerja/{{ $lok->id }}/delete">Delete</a></li>
                                        </ul>
                                      </div>
                                  </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="tab-2" class="tab-pane">
                    {{ Form::open(array('url' => 'admin/lokasikerja' , 'class' => 'form form-horizontal')) }}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-3" for="nama">Nama</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="nama" id="nama" required autofocus>
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

@section('js')
    <script type="text/javascript" src="{{ URL::to('/') }}/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/bower_components/datatables-bootstrap3-plugin/media/js/datatables-bootstrap3.min.js"></script>
    <script type="text/javascript">
        $('.datatable').DataTable({
          "iDisplayLength" : 10,
          "aaSorting": []
        });
    </script>
@stop
