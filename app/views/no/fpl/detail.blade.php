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
                        <a href="{{ URL::to('/')}}/no/fpl/{{ $fpl->id }}/print" class="btn btn-primary"><i class="fa fa-print"></i> Print Document</a>
                    </div>
                </div>
                <div class="row">
                    <form class="form form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-md-2">Nama Pemohon</label>
                            <div class="col-md-8">
                                <label class="control-label">{{ $fpl->pemohon->nama }}</label>
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
                                <label class="control-label">
                                  @foreach($fpl->perbaikans as $pb)
                                    {{ $pb->details }},&nbsp;
                                  @endforeach
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Pembelian</label>
                            <div class="col-md-8">
                                <label class="control-label">
                                  @foreach($fpl->pembelians as $pb)
                                    {{ $pb->details }},&nbsp;
                                  @endforeach
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">TRX ID</label>
                            <div class="col-md-8">
                                <label class="control-label">{{ $fpl->trx_id }}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Periode TRX ID</label>
                            <div class="col-md-8">
                                <label class="control-label">{{ $fpl->periode_trx_id }}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">NO Acc</label>
                            <div class="col-md-8">
                                <label class="control-label">{{ $fpl->no_acc }}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Kebutuhan</label>
                            <div class="col-md-8">
                                <label class="control-label">
                                  @foreach($fpl->kebutuhans as $pb)
                                    {{ $pb->details }},&nbsp;
                                  @endforeach
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Spesifikasi</label>
                            <div class="col-md-8">
                                <label class="control-label">
                                  @foreach($fpl->specs as $pb)
                                    {{ $pb->details }},&nbsp;
                                  @endforeach
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Jumlah & Estimasi</label>
                            <div class="col-md-8">
                                <label class="control-label">{{ $fpl->jumlah_dan_estimasi }}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Mengetahui</label>
                            <div class="col-md-8">
                                <label class="control-label">
                                  @foreach($fpl->mengetahui as $u)
                                    {{ $u->nama }},&nbsp;
                                  @endforeach
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Menyetujui</label>
                            <div class="col-md-8">
                                <label class="control-label">Asep Awalludin</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
