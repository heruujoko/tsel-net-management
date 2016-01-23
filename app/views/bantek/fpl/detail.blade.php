@extends('layouts.layout')
@section('title', 'Form Pengadaan Langsung')
@section('breadcrumb')
    <h2>FPL</h2>
    <ol class="breadcrumb">
        <li class="">
            <strong>Form Pengadaan Langsung</strong>
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
                        <h2>Detail FPL</h2>
                    </div>
                    <div class="col-md-2 pull-right">
                        <a href="{{ URL::to('/')}}/bantek/fpl/{{ $fpl->id }}/print" class="btn btn-primary"><i class="fa fa-print"></i> Print Document</a>
                    </div>
                </div>
                <div class="row">
                    <form class="form form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-md-2">Nama Pemohon</label>
                            <div class="col-md-8">
                                <label class="control-label">Prasanthy Ganty</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Tanggal Permintaan</label>
                            <div class="col-md-8">
                                <label class="control-label">{{ $fpl->tanggal_permintaan }}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">No Ref. GA</label>
                            <div class="col-md-8">
                                <label class="control-label">{{ $fpl->no_ref_ga }}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">PIC</label>
                            <div class="col-md-8">
                                <label class="control-label">{{ $fpl->pic }}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Jenis Permintaan</label>
                            <div class="col-md-8">
                                <label class="control-label">{{ $fpl->jenis_permintaan }}</label><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Perbaikan & Pemeliharaan</label>
                            <div class="col-md-8">
                                <label class="control-label">&nbsp;</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Pembelian</label>
                            <div class="col-md-8">
                                <label class="control-label">&nbsp;</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">TRX ID</label>
                            <div class="col-md-8">
                                <label class="control-label">&nbsp;</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Periode TRX ID</label>
                            <div class="col-md-8">
                                <label class="control-label">&nbsp;</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">NO Acc</label>
                            <div class="col-md-8">
                                <label class="control-label">&nbsp;</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Kebutuhan</label>
                            <div class="col-md-8">
                                <label class="control-label">&nbsp;</label>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-2">Kebutuhan</label>
                            <div class="col-md-8">
                                <label class="control-label">&nbsp;</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Spesifikasi</label>
                            <div class="col-md-8">
                                <label class="control-label">&nbsp;</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Jumlah & Estimasi</label>
                            <div class="col-md-8">
                                <label class="control-label">&nbsp;</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Mengetahui</label>
                            <div class="col-md-8">
                                <label class="control-label">&nbsp;</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Menyetujui</label>
                            <div class="col-md-8">
                                <label class="control-label">&nbsp;</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
