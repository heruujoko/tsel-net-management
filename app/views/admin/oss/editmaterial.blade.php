@extends('layouts.layout')
@section('title', 'Oss')
@section('breadcrumb')
    <h2>OSS</h2>
    <ol class="breadcrumb">
        <li class="">
            <strong>On Site Support</strong>
        </li>
        <li class="">
            <strong>Material</strong>
        </li>
        <li class="active">
            <strong>Edit</strong>
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
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Data</h2>
                    {{ Form::open(array('url' => URL::to('/').'/admin/oss/material/'.$oss->id.'/update' , 'class' => 'form form-horizontal')) }}
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="control-label col-md-3" for="namasite">Nama Site</label>
                                <div class="col-md-6">
                                    <select class="chosen" name="namasite" id="namasite">
                                        @foreach($sites as $site)
                                            @if($oss->sites->id == $site->id)
                                                <option selected value="{{ $site->id }}">{{ $site->sitelocation }}</option>
                                            @else
                                                <option value="{{ $site->id }}">{{ $site->sitelocation }}</option>
                                            @endif    
                                        @endforeach
                                    </select>

                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal6">
                                    Tambah baru
                                </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="tanggal">Tanggal</label>
                                <div class="col-md-6">
                                    <input class="time datepicker form-control" data-date-format="mm/dd/yyyy" value="{{ $oss->tanggal }}" name="tanggal">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="permasalahan">Permasalahan</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="permasalahan" id="permasalahan" required>{{ $oss->permasalahan }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="action">Action</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="action" id="action" required>{{ $oss->action }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="shoplist">Shopping List</label>
                                <div class="col-md-6">
                                    <select multiple="" class="chosen form-control" id="shoplist" name="shoplist[]">
                                        
                                        @foreach($shoplists as $shop)
                                            <option value="{{$shop->id}}" @foreach($oss->shoplists as $sl) @if($shop->id == $sl->id)selected="selected"@endif @endforeach>{{ $shop->kode }} - {{ $shop->deskripsi }}</option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal7">
                                    Tambah baru
                                </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Harga</label>        
                                <div class="col-md-6">
                                    <label class="control-label price">{{ $oss->harga }}</label>
                                    <p>Harga berubah saat di save.</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="mengetahui">Mengetahui</label>
                                <div class="col-md-6">
                                    <select class="chosen form-control" id="mengetahui" name="mengetahui">
                                        @foreach($userno as $no)
                                            @if($no->id == $oss->mengetahui->id)
                                                <option selected value="{{ $no->id }}">{{ $no->nama }}</option>
                                            @else
                                                <option value="{{ $no->id }}">{{ $no->nama }}</option>
                                            @endif    
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="mengerjakan">Dikerjakan oleh</label>
                                <div class="col-md-6">
                                    <label>{{ Auth::user()->nama }}</label>
                                    <input type="hidden" value="{{ Auth::user()->id }}" name="mengerjakan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="menyetujui">Menyetujui</label>
                                <div class="col-md-6">
                                    <select multiple="" class="chosen form-control" id="menyetujui" name="menyetujui[]">
                                        @foreach($userno as $no)
                                            @foreach($oss->menyetujui as $setuju)
                                                @if($no->id == $setuju->id)
                                                    <option selected value="{{ $no->id }}">{{ $no->nama }}</option>
                                                @else
                                                    <option value="{{ $no->id }}">{{ $no->nama }}</option>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                              {{ Form::submit('Save', array('class'=>'btn btn-primary col-md-offset-3')) }}
                            </div>
                        </div>    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal section -->

<div class="modal inmodal fade in" id="myModal6" tabindex="-1" role="dialog" aria-hidden="true" style="padding-left: 0px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Tambah Site Baru</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Nama Site</label>
                        <div class="">
                            <input class="form-control" for="ajaxnamasite" id="ajaxnamasite" name="ajaxnamasite">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nama BTS</label>
                        <div class="">
                            <input class="form-control" for="ajaxnamabts" id="ajaxnamabts" name="ajaxnamabts">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button onclick="newMastertp()" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal fade in" id="myModal7" tabindex="-1" role="dialog" aria-hidden="true" style="padding-left: 0px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Tambah Shoplist Baru</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Kode</label>
                        <div class="">
                            <input class="form-control" for="ajaxkode" id="ajaxkode" name="ajaxkode">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Deskripsi</label>
                        <div class="">
                            <input class="form-control" for="ajaxdeskripsi" id="ajaxdeskripsi" name="ajaxdeskripsi">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Satuan</label>
                        <div class="">
                            <input class="form-control" for="ajaxsatuan" id="ajaxsatuan" name="ajaxsatuan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Harga</label>
                        <div class="">
                            <input class="form-control" for="ajaxharga" id="ajaxharga" name="ajaxharga">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button onclick="newShoplist()" class="btn btn-primary">Save changes</button>
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
            $('.datepicker').datepicker({
                
            });
        });
        $('.price').each(function(){
            var Pformat = numeral($(this).text()).format('0,0');
            $(this).text('Rp '+Pformat);
        });
        $('.chosen').chosen({
            width: "100%",
        });

        function newShoplist(){
            var formData = {
                'kode' : $('#ajaxkode').val(),
                'deskripsi'  : $('#ajaxdeskripsi').val(),
                'satuan'  : $('#ajaxsatuan').val(),
                'harga'  : $('#ajaxharga').val()
            };

            $.ajax({
                url: "{{ URL::to('/') }}/ajax/shoplist/create",
                method: "POST",
                data: formData,
                success : function(output){
                    console.log(output);
                    window.location.reload();
                },
                error: function(msg){
                    console.log(msg);
                }
            })
        }

        function newMastertp(){
            var formData = {
                'namasite' : $('#ajaxnamasite').val(),
                'namabts'  : $('#ajaxnamabts').val()
            };

            $.ajax({
                url: "{{ URL::to('/') }}/ajax/mastertp/create",
                method: "POST",
                data: formData,
                success : function(output){
                    console.log(output);
                    window.location.reload();
                },
                error: function(msg){
                    console.log(msg);
                }
            })
        }
    </script>
@stop
