@extends('layouts.layout')
@section('title', 'Surat Tugas')
@section('breadcrumb')
    <h2>Surat Tugas</h2>
    <ol class="breadcrumb">
        <li class="">
            <strong>Surat Tugas</strong>
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
                        <h2>Detail Surat Tugas</h2>
                    </div>
                    <div class="col-md-2 pull-right">
                        <a href="{{ URL::to('/')}}/no/surattugas/{{ $surat->id }}/print" class="btn btn-primary"><i class="fa fa-print"></i> Print Document</a>
                    </div>
                </div>
                <div class="row">
                    <form class="form form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-md-2">No Surat</label>
                            <div class="col-md-8">
                                <label class="control-label">{{ $surat->no_surat }}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Bantek</label>
                            <div class="col-md-8">
                            @foreach ($surat->banteks as $srt)
                                <label class="control-label">{{ $srt->nama }} ({{ $srt->hp }}) - {{ $srt->perusahaan }}</label><br>
                            @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Time</label>
                            <div class="col-md-8">
                                <label class="control-label">19 November s/d 19 Desember</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Site</label>
                            <div class="col-md-8">
                            @foreach ( $surat->activities as $act )
                                <label class="control-label">{{ $act->sites->sitelocation }}</label><br>
                            @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Activity</label>
                            <div class="col-md-8">
                            @foreach ( $surat->activities as $ac )
                                <label class="control-label">{{ $ac->activity }}</label><br>
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
