@extends('layouts.layout')
@section('title', 'SPPH')
@section('breadcrumb')
    <h2>Surat Permintaan Penawaran Harga</h2>
    <ol class="breadcrumb">
        <li class="">
            <strong>SPPH</strong>
        </li>
        <li class="active">
            <strong>Detail</strong>
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
                        <h2>Detail SPPH</h2>
                    </div>
                    <div class="col-md-2 pull-right">
                        <a href="{{ URL::to('/')}}/no/spph/{{ $spph->id }}/print" class="btn btn-primary"><i class="fa fa-print"></i> Print Document</a>
                    </div>
                </div>
                <div class="row">
                    <form class="form form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-md-2">No Surat</label>
                            <div class="col-md-8">
                                <label class="control-label">{{ $spph->no_surat }}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Tempat/Tanggal</label>
                            <div class="col-md-8">
                                <label class="control-label">{{ $spph->tempat_tanggal }}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Kepada</label>
                            <div class="col-md-8">
                                <label class="control-label">{{ $spph->kepada }}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Kegiatan</label>
                            <div class="col-md-8">
                                <label class="control-label">{{ $spph->kegiatan }}</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
