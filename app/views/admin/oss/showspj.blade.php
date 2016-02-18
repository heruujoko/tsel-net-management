@extends('layouts.layout')
@section('title', 'Oss')
@section('breadcrumb')
    <h2>OSS</h2>
    <ol class="breadcrumb">
        <li class="">
            <strong>On Site Support</strong>
        </li>
        <li class="active">
            <strong>SPJ Bantek</strong>
        </li>
    </ol>
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::to('/') }}/datepicker/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/bower_components/chosen-bootstrap/chosen.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/bower_components/datatables-bootstrap3-plugin/media/css/datatables-bootstrap3.min.css">
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
                <li class="active"><a data-toggle="tab" href="#tab-1">List OSS</a></li>
                <li><a data-toggle="tab" href="#tab-2">Create OSS</a></li>
            </ul>
        </div>
        <div class="panel-body">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>No. OSS</th>
                                <th>Tanggal</th>
                                <th>Nama Site</th>
                                <th>Permasalahan</th>
                                <th>Nama Bantek</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($oss as $ossd)
                                <tr>
                                    <td>{{ $ossd->id }}</td>
                                    <td>{{ $ossd->no_oss }}</td>
                                    <td>{{ $ossd->tanggal }}</td>
                                    <td>{{ $ossd->sites->sitelocation }}</td>
                                    <td>{{ $ossd->permasalahan }}</td>
                                    <td>{{ $ossd->banteks->nama }}</td>
                                    <td class="price">{{ $ossd->harga }}</td>
                                    <td>
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a href="{{ URL::to('/') }}/admin/oss/spj/{{ $ossd->id }}/details">Details</a></li>
                                          <li><a href="{{ URL::to('/') }}/admin/oss/spj/{{ $ossd->id }}/edit">Edit</a></li>
                                          <li><a onclick="popupdelete('{{ $ossd->id }}')">Delete</a></li>
                                        </ul>
                                      </div>
                                  </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="tab-2" class="tab-pane">
                    {{ Form::open(array('url' => URL::to('/').'/admin/oss/spj' , 'class' => 'form form-horizontal')) }}
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="control-label col-md-3" for="namasite">Nama Site</label>
                                <div class="col-md-6">
                                    <select class="chosen" name="namasite" id="namasite">
                                        @foreach($sites as $site)
                                            <option value="{{ $site->id }}">{{ $site->sitelocation }}</option>
                                        @endforeach
                                    </select>

                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal6">
                                    Tambah baru
                                </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="tanggal">Tanggal</label>
                                <div class="col-md-6">
                                    <input class="datepicker form-control" data-date-format="mm/dd/yyyy" name="tanggal" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="permasalahan">Nama Bantek</label>
                                <div class="col-md-6">
                                    <select class="chosen form-control" name="bantek" required>
                                        @foreach($bantek as $b)
                                            <option value="{{ $b->id }}">{{ $b->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="action">Berangkat / Mulai</label>
                                <div class="col-md-6">
                                    <input type="text" class="datepicker form-control" name="mulai" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="action">Kembali / Selesai</label>
                                <div class="col-md-6">
                                    <input type="text" class="datepicker form-control" name="selesai" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="permasalahan">Kode RKS</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="kode_rks">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="permasalahan">Deksripsi RKS</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="deskripsi_rks">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="permasalahan">Permasalahan</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="permasalahan" id="permasalahan" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="action">Action</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="action" id="action" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="transport">Transportasi</label>
                                <div class="col-md-6">
                                    <select class="chosen form-control" id="transport" name="transport">
                                        <option value="no">Tidak Ada</option>
                                        <option value="darat">Darat</option>
                                        <option value="laut">Laut</option>
                                        <option value="udara">Udara</option>
                                    </select>
                                    <button type="button" class="btn btn-primary btn-sm" onclick="showbiaya()">
                                    Tambah Biaya Transport
                                </button>
                                </div>
                            </div>
                            <div class="form-group" id="formbiaya">
                                <label class="control-label col-md-3" for="">Biaya Transport</label>
                                <div class="col-md-6">
                                    <input type="text" class="col-md-6 form-control" name="kode_sl_trans" id="biayatrans" placeholder="Kode Shopping List">
                                    <input type="text" class="col-md-6 form-control" name="deskripsi_sl_trans" id="biayatrans" placeholder="Deskripsi">
                                    <input type="text" class="col-md-6 form-control" name="satuan_sl_trans" id="biayatrans" placeholder="Satuan">
                                    <input type="text" class="col-md-6 form-control" name="harga_sl_trans" id="biayatrans" placeholder="Biaya Transport">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="shoplist">Shopping List</label>
                                <div class="col-md-6">
                                    <select multiple="" class="chosen form-control" id="shoplist" name="shoplist[]">
                                        @foreach($shoplists as $shop)
                                            <option value="{{ $shop->id }}">{{ $shop->kode }} - {{ $shop->deskripsi }}</option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal7">
                                    Tambah baru
                                </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="mengetahui">Mengetahui</label>
                                <div class="col-md-6">
                                    <select class="chosen form-control" id="mengetahui" name="mengetahui">
                                        @foreach($userno as $no)
                                            <option value="{{ $no->id }}">{{ $no->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="mengerjakan">Dikerjakan oleh</label>
                                <div class="col-md-6">
                                    <label>{{ Auth::user()->nama }}</label>
                                    <input type="hidden" value="{{ Auth::user()->id }}" name="mengerjakan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="menyetujui">Menyetujui</label>
                                <div class="col-md-6">
                                    <select multiple="" class="chosen form-control" id="menyetujui" name="menyetujui[]">
                                        @foreach($userno as $no)
                                            <option value="{{ $no->id }}">{{ $no->nama }}</option>
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
                <h4 class="modal-title">Tambah Site Baru</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Nama Site</label>
                        <div class="">
                            <input class="form-control" for="ajaxnamasite" id="ajaxnamasite" name="ajaxnamasite">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nama BTS</label>
                        <div class="">
                            <input class="form-control" for="ajaxnamabts" id="ajaxnamabts" name="ajaxnamabts">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button onclick="newMastertp()" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal fade in" id="myModal7" tabindex="-1" role="dialog" aria-hidden="true" style="padding-left: 0px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Tambah Shoplist Baru</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Kode</label>
                        <div class="">
                            <input class="form-control" for="ajaxkode" id="ajaxkode" name="ajaxkode">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Deskripsi</label>
                        <div class="">
                            <input class="form-control" for="ajaxdeskripsi" id="ajaxdeskripsi" name="ajaxdeskripsi">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Satuan</label>
                        <div class="">
                            <input class="form-control" for="ajaxsatuan" id="ajaxsatuan" name="ajaxsatuan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Harga</label>
                        <div class="">
                            <input class="form-control" for="ajaxharga" id="ajaxharga" name="ajaxharga">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button onclick="newShoplist()" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@stop

@section('js')
    <script src="{{ URL::to('/') }}/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ URL::to('/') }}/chosen/chosen.jquery.js"></script>
    <script src="{{ URL::to('/') }}/bower_components/numeral/numeral.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/bower_components/datatables-bootstrap3-plugin/media/js/datatables-bootstrap3.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/bower_components/moment/moment.js"></script>
    <script type="text/javascript">
        $('#formbiaya').hide();
        $('.datepicker').datepicker({

        });

        $('.datatable').DataTable({
          "iDisplayLength" : 10,
          "aaSorting": []
        });

        $('.chosen').chosen({
            width: "100%",
        });

        $('.price').each(function(){
            var Pformat = numeral($(this).text()).format('0,0');
            $(this).text('Rp '+Pformat);
        });
        function newShoplist(){
            var formData = {
                'kode' : $('#ajaxkode').val(),
                'deskripsi'  : $('#ajaxdeskripsi').val(),
                'satuan'  : $('#ajaxsatuan').val(),
                'harga'  : $('#ajaxharga').val()
            };

            $.ajax({
                url: "{{ URL::to('/') }}/ajax/shoplist/create",
                method: "POST",
                data: formData,
                success : function(output){
                    console.log(output);
                    window.location.reload();
                },
                error: function(msg){
                    console.log(msg);
                }
            })
        }

        function newMastertp(){
            var formData = {
                'namasite' : $('#ajaxnamasite').val(),
                'namabts'  : $('#ajaxnamabts').val()
            };

            $.ajax({
                url: "{{ URL::to('/') }}/ajax/mastertp/create",
                method: "POST",
                data: formData,
                success : function(output){
                    console.log(output);
                    window.location.reload();
                },
                error: function(msg){
                    console.log(msg);
                }
            })
        }

        function popupdelete(id){
            console.log('click');
            var choice = confirm('Anda yakin akan menghapus ?');
            if(choice){
                window.location = '{{ URL::to('/') }}'+'/admin/oss/spj/'+id+'/delete';
            }
        }

        function showbiaya(){
            $('#formbiaya').show();
        }
    </script>
@stop
