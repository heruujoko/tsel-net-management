@extends('layouts.layout')
@section('title', 'Perjalanan Dinas')
@section('breadcrumb')
    <h2>Perjalanan Dinas</h2>
    <ol class="breadcrumb">
        <li class="">
            <p>Perjalanan Dinas</p>
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
                        {{ Form::open(array('method'=> 'PATCH', 'url' => 'admin/perjalanandinas/'.$pj->id.'' , 'class' => 'form form-horizontal')) }}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-3" for="nama">Nama</label>
                                <div class="col-md-6">
                                    <select class="form-control chosen" name="nama" id="nama" required>
                                        @foreach($users as $us)
                                            @if($pj->user->id == $us->id)
                                                <option selected value="{{ $us->id }}">{{ $us->nama }} - {{ $us->jabatan }}</option>
                                            @else
                                                <option value="{{ $us->id }}">{{ $us->nama }} - {{ $us->jabatan }}</option>
                                            @endif    
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="tujuan">Kota Tujuan</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="tujuan" id="tujuan" value="{{ $pj->kota_tujuan }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="kegiatan">Kegiatan</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="kegiatan" id="kegiatan" value="{{ $pj->kegiatan }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="pergi">Tanggal Pergi</label>
                                <div class="col-md-6">
                                    <input class="form-control datepicker time" name="pergi" id="pergi" value="{{ $pj->tanggal_berangkat }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="kembali">Tanggal Kembali</label>
                                <div class="col-md-6">
                                    <input class="form-control datepicker time" name="kembali" id="kembali" value="{{ $pj->tanggal_kembali }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="kendaraan">Kendaraan</label>
                                <div class="col-md-6">
                                    @if($pj->kendaraan == 'darat')
                                        <input type="radio" name="kendaraan" value="darat" checked=""> Darat
                                    @else
                                        <input type="radio" name="kendaraan" value="darat"> Darat
                                    @endif
                                    @if($pj->kendaraan == 'laut')
                                        <input type="radio" name="kendaraan" value="laut" checked=""> Laut
                                    @else
                                        <input type="radio" name="kendaraan" value="laut"> Laut
                                    @endif
                                    @if($pj->kendaraan == 'udara')
                                        <input type="radio" name="kendaraan" value="udara" checked=""> Udara
                                    @else
                                        <input type="radio" name="kendaraan" value="udara"> Udara
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="jenis_uhpd">Jenis UHPD</label>
                                <div class="col-md-6">
                                    @if($pj->jenis_uhpd == 'darat')
                                        <input type="radio" name="jenis_uhpd" value="darat" checked=""> Darat
                                    @else
                                        <input type="radio" name="jenis_uhpd" value="darat"> Darat
                                    @endif
                                    @if($pj->jenis_uhpd == 'udara')
                                        <input type="radio" name="jenis_uhpd" value="udara" checked=""> Udara
                                    @else
                                        <input type="radio" name="jenis_uhpd" value="udara"> Udara
                                    @endif
                                    @if($pj->jenis_uhpd == 'sebagian')
                                        <input type="radio" name="jenis_uhpd" value="sebagian" checked=""> Sebagian
                                    @else
                                        <input type="radio" name="jenis_uhpd" value="sebagian"> Sebagian
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="trans_bandara">Transport Bandara</label>
                                <div class="col-md-6">
                                    <input type="text" name="trans_bandara" class="form-control" value="{{ $pj->transport_bandara }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="">Biaya Hotel</label>
                                <div class="col-md-6">
                                    <input type="text" name="hotel_perhari" class="form-control" placeholder="biaya perhari" value="{{ $pj->biaya_hotel }}">
                                    <input type="text" name="hotel_hari" class="form-control" placeholder="lama dalam hari" value="{{ $pj->hari_hotel }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="">Biaya Pesawat</label>
                                <div class="col-md-6">
                                    <input type="text" name="pesawat_biaya" class="form-control" placeholder="biaya pesawat" value="{{ $pj->biaya_pesawat }}">
                                    <input type="text" name="pesawat_kota" class="form-control" placeholder="kota tujuan" value="{{ $pj->tujuan_pesawat }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="">Biaya Lain</label>
                                <div class="col-md-6">
                                    <div id="list_biaya_lain">
                                        @foreach($pj->lainlain as $lain)
                                            <p id='pjl-{{ $lain->id }}'>{{ $lain->detail }} <a onclick="hapusLain('{{ $lain->id }}')">hapus</a></p>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="ids_lain" id="ids_lain" value="{{ $lain_ids }}">    
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal6">
                                        Tambah baru
                                    </button>
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
