@extends('layouts.layout')
@section('title', 'Oss')
@section('breadcrumb')
    <h2>OSS</h2>
    <ol class="breadcrumb">
        
        <li class="active">
            <strong>On Site Support</strong>
        </li>
    </ol>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-3">
                        <h2>Detail OSS Material</h2>
                    </div>
                    <div class="col-md-2 pull-right">
                        <a href="/admin/oss/material/{{ $oss->id }}/print" class="btn btn-primary"><i class="fa fa-print"></i> Print Document</a>
                    </div>
                </div>
                <div class="row">
                    <form class="form form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-md-2">Tanggal</label>
                            <div class="col-md-8">
                                <p class="time">{{ $oss->tanggal }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Site</label>
                            <div class="col-md-8">
                                <p>{{ $oss->sites->sitelocation }} - {{ $oss->sites->btsname }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Permasalahan</label>
                            <div class="col-md-8">
                                <p>{{ $oss->permasalahan }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Action</label>
                            <div class="col-md-8">
                                <p>{{ $oss->action }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Harga</label>
                            <div class="col-md-8">
                                <p class="price">{{ $oss->harga }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Mengetahui</label>
                            <div class="col-md-8">
                                <p>{{ $oss->mengetahui->nama }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Di Kerjakan Oleh</label>
                            <div class="col-md-8">
                                <p>{{ $oss->dikerjakan->nama }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Di Setujui Oleh</label>
                            <div class="col-md-8">
                                @foreach($oss->menyetujui as $stj)
                                    <p>{{ $stj->nama }}</p>
                                @endforeach
                            </div>
                        </div>        
                    </form>
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
        $('.price').each(function(){
            var Pformat = numeral($(this).text()).format('0,0');
            $(this).text('Rp '+Pformat);
        });
    </script>
@stop
