@extends('layouts.layout')
@section('title', 'STPD')
@section('breadcrumb')
    <h2>STPD</h2>
    <ol class="breadcrumb">
        <li class="active">
            <strong>STPD</strong>
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
                <li class="active"><a data-toggle="tab" href="#tab-1">List STPD</a></li>
                <li><a data-toggle="tab" href="#tab-2">Create STPD</a></li>
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
                                <th>Tujuan</th>
                                <th>Berangkat</th>
                                <th>Kembali</th>
                                <th>Jumlah UHPD</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stpd as $pd)
                                <tr>
                                    <td>{{ $pd->id }}</td>
                                    <td>{{ $pd->user->nama }}</td>
                                    <td>{{ $pd->tujuan_penugasan }}</td>
                                    <td>{{ $pd->tanggal_berangkat }}</td>
                                    <td>{{ $pd->tanggal_kembali }}</td>
                                    <td class="price">{{ $pd->jumlah }}</td>
                                    <td>
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a href="{{ URL::to('/') }}/no/stpd/{{ $pd->id }}/details">Details</a></li>
                                        </ul>
                                      </div>
                                    </td>
                                </tr>
                            @endforeach        
                        </tbody>
                    </table>
                </div>
                <div id="tab-2" class="tab-pane">
                    {{ Form::open(array('url' => 'no/stpd' , 'class' => 'form form-horizontal')) }}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-3" for="nama">Nama</label>
                                <div class="col-md-6">
                                    <input type="hidden" name="nama" value="{{ Auth::user()->id }}">
                                    <label>{{ Auth::user()->nama }}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="tujuan_penugasan">Tujuan Penugasan</label>
                                <div class="col-md-6">
                                    <input type="text" name="tujuan_penugasan" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="tanggal_berangkat">Tanggal Berangkat</label>
                                <div class="col-md-6">
                                    <input type="text" name="tanggal_berangkat" class="form-control datepicker">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="tanggal_kembali">Tanggal Kembali</label>
                                <div class="col-md-6">
                                    <input type="text" name="tanggal_kembali" class="form-control datepicker">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="kelas_kendaraan">Kelas Kendaraan</label>
                                <div class="col-md-6">
                                    <select name="kelas_kendaraan" class="chosen form-control">
                                        <option value="darat">Darat</option>
                                        <option value="laut">Laut</option>
                                        <option value="udara">Udara</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="kegiatan">Kegiatan</label>
                                <div class="col-md-6">
                                    <textarea name="kegiatan" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="uhpd">Jenis UHPD</label>
                                <div class="col-md-6">
                                    <input type="radio" value="darat" name="uhpd"> Darat
                                    <input type="radio" value="sebagian" name="uhpd"> Sebagian
                                    <input type="radio" value="udara" name="uhpd"> Udara 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="trans_bandara">Bantuan Transport Udara</label>
                                <div class="col-md-6">
                                    <input type="text" name="trans_bandara" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="menugaskan">Menugaskan</label>
                                <div class="col-md-6">
                                    <select class="form-control chosen" name="menugaskan">
                                    @foreach($user_no as $no)
                                        <option value="{{ $no->id }}">{{ $no->nama }} - {{ $no->jabatan }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="mengetahui">Mengetahui</label>
                                <div class="col-md-6">
                                    <select class="form-control chosen" name="mengetahui">
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

<div class="modal inmodal fade in" id="myModal6" tabindex="-1" role="dialog" aria-hidden="true" style="padding-left: 0px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Biaya Lain Lain</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Keterangan</label>
                        <input type="text" class="form-control" id="ajaxpj-keterangan">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Biaya</label>
                        <input type="text" class="form-control" id="ajaxpj-biaya">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button onclick="newLain()" class="btn btn-primary">Save changes</button>
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
        $('.datepicker').datepicker({
            
        });
        $('.chosen').chosen({});
        $('.price').each(function(){
            var Pformat = numeral($(this).text()).format('0,0');
            $(this).text('Rp '+Pformat);
        });
        function popupdelete(id){
            console.log('click');
            var choice = confirm('Anda yakin akan menghapus ?');
            if(choice){
                window.location = '{{ URL::to('/') }}'+'/admin/stpd/'+id+'/delete';
            }
        }
    </script>
@stop
