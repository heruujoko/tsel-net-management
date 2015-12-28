@extends('layouts.layout')
@section('title', 'STPD')
@section('breadcrumb')
    <h2>STPD</h2>
    <ol class="breadcrumb">
        <li class="">
            <p>STPD</p>
        </li>
        <li class="active">
            <strong>edit</strong>
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
                        {{ Form::open(array('method'=> 'PATCH', 'url' => 'admin/stpd/'.$stpd->id.'' , 'class' => 'form form-horizontal')) }}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-3" for="nama">Nama</label>
                                <div class="col-md-6">
                                    <input type="hidden" name="nama" value="{{ $stpd->user->id }}">
                                    <label>{{ $stpd->user->nama }}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="tujuan_penugasan">Tujuan Penugasan</label>
                                <div class="col-md-6">
                                    <input type="text" name="tujuan_penugasan" class="form-control" value="{{ $stpd->tujuan_penugasan }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="tanggal_berangkat">Tanggal Berangkat</label>
                                <div class="col-md-6">
                                    <input type="text" name="tanggal_berangkat" class="form-control datepicker time" value="{{ $stpd->tanggal_berangkat }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="tanggal_kembali">Tanggal Kembali</label>
                                <div class="col-md-6">
                                    <input type="text" name="tanggal_kembali" class="form-control datepicker time" value="{{ $stpd->tanggal_kembali }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="kelas_kendaraan">Kelas Kendaraan</label>
                                <div class="col-md-6">
                                    <select name="kelas_kendaraan" class="chosen form-control">
                                        @if($stpd->kendaraan == 'darat')
                                            <option value="darat" selected>Darat</option>
                                        @else
                                            <option value="darat">Darat</option>
                                        @endif
                                        @if($stpd->kendaraan == 'laut')
                                            <option value="laut" selected>Laut</option>
                                        @else
                                            <option value="laut">Laut</option>
                                        @endif
                                        @if($stpd->kendaraan == 'udara')
                                            <option value="udara" selected>Udara</option>
                                        @else
                                            <option value="udara">Udara</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="kegiatan">Kegiatan</label>
                                <div class="col-md-6">
                                    <textarea name="kegiatan" class="form-control">{{ $stpd->kegiatan }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="uhpd">Jenis UHPD</label>
                                <div class="col-md-6">
                                    @if($stpd->jenis_uhpd == 'darat')
                                        <input type="radio" value="darat" name="uhpd" checked> Darat
                                    @else
                                        <input type="radio" value="darat" name="uhpd"> Darat
                                    @endif
                                    @if($stpd->jenis_uhpd == 'sebagian')
                                        <input type="radio" value="sebagian" name="uhpd" checked> Sebagian
                                    @else
                                        <input type="radio" value="sebagian" name="uhpd"> Sebagian
                                    @endif
                                    @if($stpd->jenis_uhpd == 'udara')
                                        <input type="radio" value="udara" name="uhpd" checked> Udara
                                    @else
                                        <input type="radio" value="udara" name="uhpd"> Udara
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="trans_bandara">Bantuan Transport Udara</label>
                                <div class="col-md-6">
                                    <input type="text" name="trans_bandara" class="form-control" value="{{ $stpd->trans_bandara }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="menugaskan">Menugaskan</label>
                                <div class="col-md-6">
                                    <select class="form-control chosen" name="menugaskan">
                                    @foreach($user_no as $no)
                                        @if($stpd->menugaskan->id == $no->id)
                                            <option value="{{ $no->id }}" selected>{{ $no->nama }} - {{ $no->jabatan }}</option>
                                        @else
                                            <option value="{{ $no->id }}">{{ $no->nama }} - {{ $no->jabatan }}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="mengetahui">Mengetahui</label>
                                <div class="col-md-6">
                                    <select class="form-control chosen" name="mengetahui">
                                    @foreach($user_no as $no)
                                        @if($stpd->mengetahui->id == $no->id)
                                            <option value="{{ $no->id }}" selected>{{ $no->nama }} - {{ $no->jabatan }}</option>
                                        @else
                                            <option value="{{ $no->id }}">{{ $no->nama }} - {{ $no->jabatan }}</option>
                                        @endif
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
        $('.time').each(function(){
            var Tformat = moment($(this).val()).format('L');
            $(this).val(Tformat);
        });
        $('.time').promise().done(function(){
            $('.datepicker').datepicker({
                
            });
        });

        function hapusLain(id){
            var str = $('#ids_lain').val();
            var res = str.replace(id+',' , '');
            $('#ids_lain').val(res);
            $('#pjl-'+id).hide();

        }
        function newLain(){
            var formData = {
                'details'  : $('#ajaxpj-keterangan').val(),
                'biaya'  : $('#ajaxpj-biaya').val()
            };

            $.ajax({
                url: "{{ URL::to('/') }}/ajax/pj/lain/create",
                method: "POST",
                data: formData,
                success : function(output){
                    console.log(output);
                    $('#myModal6').modal('toggle');
                    // window.location.reload();
                    $('#list_biaya_lain').append("<p id='pjl-"+output.id+"'>"+output.detail+" <a onclick=\"hapusLain('"+output.id+"')\">hapus</a></p>");
                    var spec = $('#ids_lain').val();
                    $('#ids_lain').val(spec+output.id+',');
                },
                error: function(msg){
                    console.log(msg);
                }
            })
        }
    </script>
@stop
