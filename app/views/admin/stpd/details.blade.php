@extends('layouts.layout')
@section('title', 'STPD')
@section('breadcrumb')
    <h2>STPD</h2>
    <ol class="breadcrumb">
        <li class="">
            <p>STPD</p>
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
                <div class="row">
                    <div class="panel-body">
                        <div class="pull-right">
                            <div class="">
                                <a href="/admin/stpd/{{ $stpd->id }}/edit" class="btn btn-primary"><i class="fa fa-print"></i> Edit Document</a>
                                <a href="/admin/stpd/{{ $stpd->id }}/print" class="btn btn-primary"><i class="fa fa-print"></i> Print Document</a>
                            </div>
                        </div>
                        <form class="form form-horizontal">
                            <div class="form-group">
                                <label class="col-md-2 control-label">User</label>
                                <label class="control-label">{{ $stpd->user->nama }}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Tujuan Penugasan</label>
                                <label class="control-label">{{ $stpd->tujuan_penugasan }}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Tanggal Berangkat</label>
                                <label class="control-label">{{ $stpd->tanggal_berangkat }}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Tanggal Kembali</label>
                                <label class="control-label">{{ $stpd->tanggal_kembali }}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Kendaraan</label>
                                <label class="control-label">{{ $stpd->kendaraan }}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Kegiatan</label>
                                <label class="control-label">{{ $stpd->kegiatan }}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Transport Bandara</label>
                                <label class="control-label">{{ $stpd->trans_bandara }}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Jumlah</label>
                                <label class="control-label">{{ $stpd->jumlah }}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Yang Menugaskan</label>
                                <label class="control-label">{{ $stpd->menugaskan->nama }} - {{ $stpd->menugaskan->jabatan }}</label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Yang Mengetahui</label>
                                <label class="control-label">{{ $stpd->mengetahui->nama }} - {{ $stpd->mengetahui->jabatan }}</label>
                            </div>
                        </form>
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
