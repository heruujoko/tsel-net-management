@extends('layouts.layout')
@section('title', 'FPL')
@section('breadcrumb')
    <h2>OSS</h2>
    <ol class="breadcrumb">
        <li class="active">
            <strong>Form Pengadaan Langsung</strong>
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
        <div class="panel-options">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-1">List FPL</a></li>
                <li><a data-toggle="tab" href="#tab-2">Create FPL</a></li>
            </ul>
        </div>
        <div class="panel-body">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Jenis Permintaan</th>
                                <th>Tanggal</th>
                                <th>Nilai FPL</th>
                                <th>TRX ID</th>
                                <th>No Account</th>
                                <th>Periode TRX ID</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fpl as $fp)
                                <tr>
                                    <td>{{ $fp->id }}</td>
                                    <td>{{ $fp->jenis_permintaan}}</td>
                                    <td>{{ $fp->tanggal_permintaan }}</td>
                                    <td class="price">{{ $fp->jumlah_dan_estimasi }}</td>
                                    <td>{{ $fp->trx_id }}</td>
                                    <td>{{ $fp->no_acc }}</td>
                                    <td>{{ $fp->periode_trx_id }}</td>
                                    <td>
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a href="{{ URL::to('/') }}/admin/fpl/{{ $fp->id }}/details">Details</a></li>
                                          <li><a href="{{ URL::to('/') }}/admin/fpl/{{ $fp->id }}/edit">Edit</a></li>
                                          <li><a onclick="popupdelete('{{ $fp->id }}')">Delete</a></li>
                                        </ul>
                                      </div>
                                    </td>
                                </tr>
                            @endforeach        
                        </tbody>
                    </table>
                </div>
                <div id="tab-2" class="tab-pane">
                    {{ Form::open(array('url' => URL::to('/').'/admin/fpl' , 'class' => 'form form-horizontal')) }}
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="control-label col-md-3">Nama Pemohon</label>
                                <div class="col-md-8">
                                    <label class="control-label">{{ Auth::user()->nama }}</label>
                                    <input type="hidden" name="pemohon" value="{{ Auth::user()->id }}">
                                </div>    
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Tanggal Permintaan</label>
                                <div class="col-md-6">
                                    <input class="form-control datepicker" name="tanggal_permintaan" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">No Ref GA</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="ref_ga">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">PIC</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="pic">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Jenis Permintaan</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="jenis_permintaan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Perbaikan & Pemeliharaan</label>
                                <div class="col-md-6">
                                    <div class="list-perbaikan">
                                                
                                    </div>
                                    <input type="hidden" name="ids_perbaikan" id="ids_perbaikan">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal6">
                                        Tambah baru
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Pembelian</label>
                                <div class="col-md-6">
                                    <div class="list-pembelian">
                                                
                                    </div>
                                    <input type="hidden" name="ids_pembelian" id="ids_pembelian">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal7">
                                        Tambah baru
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">TRX ID</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="trx_id">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Periode TRX ID</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="periode_trx_id" placeholder="mm/yy">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">No Acc</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="no_acc">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Kebutuhan</label>
                                <div class="col-md-6">
                                    <div class="list-kebutuhan">
                                                
                                    </div>
                                    <input type="hidden" name="ids_kebutuhan" id="ids_kebutuhan">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal8">
                                        Tambah baru
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Spesifikasi</label>
                                <div class="col-md-6">
                                    <div class="list-spec">
                                                
                                    </div>
                                    <input type="hidden" name="ids_spec" id="ids_spec">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal9">
                                        Tambah baru
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Jumlah & Estimasi</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="jumlah_estimasi">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Mengetahui</label>
                                <div class="col-md-6">
                                    <select multiple class="chosen form-control" name="mengetahui[]">
                                        @foreach($user_no as $no)
                                            <option value="{{ $no->id }}">{{ $no->nama }} - {{ $no->jabatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Menyetujui</label>
                                <div class="col-md-6">
                                    <select class="chosen form-control" name="menyetujui">
                                        @foreach($user_no as $no)
                                            <option value="{{ $no->id }}">{{ $no->nama }} - {{ $no->jabatan }}</option>
                                        @endforeach
                                    </select>
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


<!-- modal section -->

<div class="modal inmodal fade in" id="myModal6" tabindex="-1" role="dialog" aria-hidden="true" style="padding-left: 0px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Perbaikan & Pemeliharaan FPL</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Keterangan</label>
                        <input type="text" class="form-control" id="ajaxfpl-perbaikan">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button onclick="newFPLPerbaikan()" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal fade in" id="myModal7" tabindex="-1" role="dialog" aria-hidden="true" style="padding-left: 0px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Pembelian FPL</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Keterangan</label>
                        <input type="text" class="form-control" id="ajaxfpl-pembelian">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button onclick="newFPLPembelian()" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal fade in" id="myModal8" tabindex="-1" role="dialog" aria-hidden="true" style="padding-left: 0px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Kebutuhan FPL</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Keterangan</label>
                        <input type="text" class="form-control" id="ajaxfpl-kebutuhan">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button onclick="newFPLKebutuhan()" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal fade in" id="myModal9" tabindex="-1" role="dialog" aria-hidden="true" style="padding-left: 0px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Spesifikasi FPL</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Keterangan</label>
                        <input type="text" class="form-control" id="ajaxfpl-spec">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button onclick="newFPLSpec()" class="btn btn-primary">Save changes</button>
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
        $('.datepicker').datepicker({});
        $('.price').each(function(){
            var Pformat = numeral($(this).text()).format('0,0');
            $(this).text('Rp '+Pformat);
        });
        $('.chosen').chosen();
        function hapusPerbaikan(id){
            var str = $('#ids_perbaikan').val();
            var res = str.replace(id+',' , '');
            $('#ids_perbaikan').val(res);
            $('#b-'+id).hide();

        }
        function newFPLPerbaikan(){
            var formData = {
                'details'  : $('#ajaxfpl-perbaikan').val()
            };

            $.ajax({
                url: "{{ URL::to('/') }}/ajax/fpl/perbaikan/create",
                method: "POST",
                data: formData,
                success : function(output){
                    console.log(output);
                    $('#myModal6').modal('toggle');
                    // window.location.reload();
                    $('.list-perbaikan').append("<p id='b-"+output.id+"'>"+output.details+" <a onclick=\"hapusPerbaikan('"+output.id+"')\">hapus</a></p>");
                    var perbaikan = $('#ids_perbaikan').val();
                    $('#ids_perbaikan').val(perbaikan+output.id+',');
                },
                error: function(msg){
                    console.log(msg);
                }
            })
        }

        function hapusPembelian(id){
            var str = $('#ids_pembelian').val();
            var res = str.replace(id+',' , '');
            $('#ids_pembelian').val(res);
            $('#bl-'+id).hide();

        }
        function newFPLPembelian(){
            var formData = {
                'details'  : $('#ajaxfpl-pembelian').val()
            };

            $.ajax({
                url: "{{ URL::to('/') }}/ajax/fpl/pembelian/create",
                method: "POST",
                data: formData,
                success : function(output){
                    console.log(output);
                    $('#myModal7').modal('toggle');
                    // window.location.reload();
                    $('.list-pembelian').append("<p id='bl-"+output.id+"'>"+output.details+" <a onclick=\"hapusPembelian('"+output.id+"')\">hapus</a></p>");
                    var pembelian = $('#ids_pembelian').val();
                    $('#ids_pembelian').val(pembelian+output.id+',');
                },
                error: function(msg){
                    console.log(msg);
                }
            })
        }

        function hapusKebutuhan(id){
            var str = $('#ids_kebutuhan').val();
            var res = str.replace(id+',' , '');
            $('#ids_kebutuhan').val(res);
            $('#k-'+id).hide();

        }
        function newFPLKebutuhan(){
            var formData = {
                'details'  : $('#ajaxfpl-kebutuhan').val()
            };

            $.ajax({
                url: "{{ URL::to('/') }}/ajax/fpl/kebutuhan/create",
                method: "POST",
                data: formData,
                success : function(output){
                    console.log(output);
                    $('#myModal8').modal('toggle');
                    // window.location.reload();
                    $('.list-kebutuhan').append("<p id='k-"+output.id+"'>"+output.details+" <a onclick=\"hapusKebutuhan('"+output.id+"')\">hapus</a></p>");
                    var kebutuhan = $('#ids_kebutuhan').val();
                    $('#ids_kebutuhan').val(kebutuhan+output.id+',');
                },
                error: function(msg){
                    console.log(msg);
                }
            })
        }

        function hapusSpec(id){
            var str = $('#ids_spec').val();
            var res = str.replace(id+',' , '');
            $('#ids_spec').val(res);
            $('#s-'+id).hide();

        }
        function newFPLSpec(){
            var formData = {
                'details'  : $('#ajaxfpl-spec').val()
            };

            $.ajax({
                url: "{{ URL::to('/') }}/ajax/fpl/spec/create",
                method: "POST",
                data: formData,
                success : function(output){
                    console.log(output);
                    $('#myModal9').modal('toggle');
                    // window.location.reload();
                    $('.list-spec').append("<p id='s-"+output.id+"'>"+output.details+" <a onclick=\"hapusSpec('"+output.id+"')\">hapus</a></p>");
                    var spec = $('#ids_spec').val();
                    $('#ids_spec').val(spec+output.id+',');
                },
                error: function(msg){
                    console.log(msg);
                }
            })
        }
    </script>
@stop
