@extends('layouts.layout')
@section('title', 'SPPH')
@section('breadcrumb')
    <h2>Surat Permintaan Penawaran Harga</h2>
    <ol class="breadcrumb">
        <li class="active">
            <strong>SPPH</strong>
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
                <li class="active"><a data-toggle="tab" href="#tab-1">List SPPH</a></li>
                <li><a data-toggle="tab" href="#tab-2">Create SPPH</a></li>
            </ul>
        </div>
        <div class="panel-body">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th width="1%">ID</th>
                                <th>No Surat</th>
                                <th>Tanggal</th>
                                <th>Perihal</th>
                                <th>Kegiatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($spph as $sp)
                                <tr>
                                    <td>{{ $sp->id }}</td>
                                    <td>{{ $sp->no_surat }}</td>
                                    <td>{{ $sp->tempat_tanggal }}</td>
                                    <td>{{ $sp->perihal }}</td>
                                    <td>{{ $sp->kegiatan }}</td>
                                    <td>
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a href="{{ URL::to('/') }}/admin/spph/{{ $sp->id }}/details">Details</a></li>
                                          <li><a href="{{ URL::to('/') }}/admin/spph/{{ $sp->id }}/edit">Edit</a></li>
                                          <li><a onclick="popupdelete('{{ $sp->id }}')">Delete</a></li>
                                        </ul>
                                      </div>
                                    </td>
                                </tr>
                            @endforeach   
                        </tbody>
                    </table>
                </div>
                <div id="tab-2" class="tab-pane">
                    {{ Form::open(array('url' => 'admin/spph' , 'class' => 'form form-horizontal')) }}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-3" for="kepada">Kepada</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="kepada" id="kepada" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="perihal">Perihal</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="perihal" id="perihal" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="kegiatan">Kegiatan</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="kegiatan" id="kegiatan" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="jangka_waktu">Jangak Waktu</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="jangka_waktu" type="number" id="jangka_waktu" placeholder="dalam hari" required>
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
        function popupdelete(id){
            console.log('click');
            var choice = confirm('Anda yakin akan menghapus ?');
            if(choice){
                window.location = '{{ URL::to('/') }}'+'/admin/spph/'+id+'/delete';
            }
        }
    </script>
@stop
