@extends('layouts.layout')
@section('title', 'Perjalanan Dinas')
@section('breadcrumb')
    <h2>Perjalanan Dinas</h2>
    <ol class="breadcrumb">
        <li class="">
            <p>Perjalanan Dinas</p>
        </li>
        <li class="active">
            <strong>details</strong>
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
  <div class="col-lg-12">
    <div class="ibox">
        <div class="ibox-content">
            <div class="panel-body">
              <div class="pull-right">
                  <div class="">
                      @if($pj->nodin != '')
                        <a href="{{ URL::to('/') }}{{ $pj->nodin }}" class="btn btn-primary"><i class="fa fa-paste"></i> Download Nodin</a>
                      @endif
                  </div>
              </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">Perjalaan Dinas</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">STPD</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">Versheet</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-4" aria-expanded="false">FPJP</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                    <form class="form form-horizontal">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">User</label>
                                            <label class="control-label">{{ $pj->user->nama }}</label>
                                        </div>
                                    </form>
                                    <form class="form form-horizontal">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Kegiatan</label>
                                            <label class="control-label">{{ $pj->kegiatan }}</label>
                                        </div>
                                    </form>
                                    <form class="form form-horizontal">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Berangkat</label>
                                            <label class="control-label">{{ $pj->tanggal_berangkat }}</label>
                                        </div>
                                    </form>
                                    <form class="form form-horizontal">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Kembali</label>
                                            <label class="control-label">{{ $pj->tanggal_kembali }}</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                    <div class="pull-right">
                                        <div class="">

                                              <a href="{{ URL::to('/')}}/no/stpd/{{ $pj->stpd->id }}/print" class="btn btn-primary"><i class="fa fa-print"></i> Print Document</a>

                                        </div>
                                    </div>
                                   <form class="form form-horizontal">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">User</label>
                                            <label class="control-label">{{ $pj->user->nama }}</label>
                                        </div>
                                        <div class="form form-horizontal">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Tujuan Penugasan</label>
                                                <label class="control-label">{{ $pj->stpd->tujuan_penugasan }}</label>
                                            </div>
                                        </div>
                                        <div class="form form-horizontal">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Tujuan Penugasan</label>
                                                <label class="control-label">{{ $pj->stpd->kendaraan }}</label>
                                            </div>
                                        </div>
                                        <div class="form form-horizontal">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Tujuan Penugasan</label>
                                                <label class="control-label">{{ $pj->stpd->kegiatan }}</label>
                                            </div>
                                        </div>
                                        <div class="form form-horizontal">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Berangkat</label>
                                                <label class="control-label">{{ $pj->stpd->tanggal_berangkat }}</label>
                                            </div>
                                        </div>
                                        <div class="form form-horizontal">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Kembali</label>
                                                <label class="control-label">{{ $pj->stpd->tanggal_kembali }}</label>
                                            </div>
                                        </div>
                                        <div class="form form-horizontal">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Jenis UHPD</label>
                                                <label class="control-label">{{ $pj->stpd->jenis_uhpd }}</label>
                                            </div>
                                        </div>
                                        <div class="form form-horizontal">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Transport Bandara</label>
                                                <label class="control-label">Rp. {{ number_format($pj->stpd->trans_bandara) }}</label>
                                            </div>
                                        </div>
                                        <div class="form form-horizontal">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Jenis UHPD</label>
                                                <label class="control-label">{{ $day }} hari x Rp {{ number_format($harian) }} = Rp {{ number_format($day*$harian) }}</label>
                                            </div>
                                        </div>
                                        <div class="form form-horizontal">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Total STPD</label>
                                                <label class="control-label">Rp {{ number_format($pj->stpd->jumlah) }}</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="tab-3" class="tab-pane">
                                <div class="panel-body">
                                    <div class="pull-right">
                                        <div class="">
                                              <a href="{{ URL::to('/')}}/no/versheet/{{ $pj->versheet->id }}/print" class="btn btn-primary"><i class="fa fa-print"></i> Print Document</a>
                                        </div>
                                    </div>
                                   <form class="form form-horizontal">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">User</label>
                                            <label class="control-label">{{ $pj->user->nama }}</label>
                                        </div>
                                        <div class="form form-horizontal">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Untuk Pembayaran</label>
                                                <label class="control-label">{{ $pj->versheet->untuk_pembayaran }}</label>
                                            </div>
                                        </div>
                                        <div class="form form-horizontal">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Jumlah Pembayaran</label>
                                                <label class="control-label">Rp. {{ number_format($pj->versheet->jumlah_pembayaran) }}</label>
                                            </div>
                                        </div>
                                        <div class="form form-horizontal">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Kepada</label>
                                                <label class="control-label">{{ $pj->versheet->kepada_bank }} {{ $pj->versheet->kepada_rekening }} {{ $pj->versheet->kepada_nama }}</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="tab-4" class="tab-pane">
                                <div class="panel-body">
                                    <div class="pull-right">
                                        <div class="">
                                              <a href="{{ URL::to('/')}}/no/fpjp/{{ $pj->fpjp->id }}/print" class="btn btn-primary"><i class="fa fa-print"></i> Print Document</a>
                                        </div>
                                    </div>
                                   <form class="form form-horizontal">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">User</label>
                                            <label class="control-label">{{ $pj->user->nama }}</label>
                                        </div>
                                        <div class="form form-horizontal">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Tanggal</label>
                                                <label class="control-label">{{ $pj->fpjp->tanggal }}</label>
                                            </div>
                                        </div>
                                        <div class="form form-horizontal">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Uraian</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-offset-2 col-md-10">
                                                    <table class="table table-stripped">
                                                        <thead>
                                                            <th>Keterangan</th>
                                                            <th>Jumlah</th>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($pj->fpjp->uraians as $ur)
                                                                <tr>
                                                                    <td>{{ $ur->uraian }}</td>
                                                                    <td>Rp. {{ number_format($ur->jumlah) }}</td>
                                                                </tr>
                                                            @endforeach
                                                            <tr>
                                                                <td><strong>TOTAL</strong></td>
                                                                <td><strong>Rp. {{ number_format($pj->fpjp->total) }}</strong></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
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
