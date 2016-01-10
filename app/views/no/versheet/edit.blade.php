@extends('layouts.layout')
@section('title', 'Verification Sheet')
@section('breadcrumb')
    <h2>Verification Sheet</h2>
    <ol class="breadcrumb">
        <li class="">
            <p>Verification Sheet</p>
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
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-10">
                        {{ Form::open(array('method'=> 'PATCH', 'url' => 'admin/versheet/'.$vs->id.'' , 'class' => 'form form-horizontal')) }}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-3" for="invoice">No Invoice</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="invoice" value="{{ $vs->no_invoice }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="supplier">Supplier Name</label>
                                <div class="col-md-6">
                                    <input type="hidden" class="form-control" name="supplier" value="{{ Auth::user()->id }}">
                                    <label class="control-label">{{ Auth::user()->nama }}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="docs">Kelengkapan Dokumen</label>
                                <div class="col-md-6">
                                    <select multiple class="chosen form-control" name="docs[]" required>
                                        @foreach($doc_type as $type)
                                            <option value="{{$type->doc_name}}" @foreach($vs->docs as $doc) @if($type->doc_name == $doc->docs)selected="selected"@endif @endforeach>{{$type->doc_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="pembayaran">Untuk Pembayaran</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="pembayaran" value="{{ $vs->untuk_pembayaran }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="jumlah">Jumlah Pembayaran</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="jumlah" value="{{ $vs->jumlah_pembayaran }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="trxid">TRX ID</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="trxid" value="{{ $vs->trxid }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="cost_centre">Cost Centre</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="cost_centre" value="{{ $vs->cost_centre }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="budget_account">Budget Account</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="budget_account" value="{{ $vs->budget_account }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="activity_code">Activity Code</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="activity_code" value="{{ $vs->activity_code }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="kepada">Dibayarkan Kepada</label>
                                <div class="col-md-6">
                                        <input type="text" class="form-control" name="kepada_nama" placeholder="Nama" value="{{ $vs->kepada_nama }}">
                                        <input type="text" class="form-control" name="kepada_bank" placeholder="Bank / Cabang" value="{{ $vs->kepada_bank }}">
                                        <input type="text" class="form-control" name="kepada_rekening" placeholder="Rekening" value="{{ $vs->kepada_rekening }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="menyetujui">Menyetujui</label>
                                <div class="col-md-6">
                                    <select class="form-control chosen" name="menyetujui">
                                        @foreach($user_no as $no)
                                            @if($no->id == $vs->user_menyetujui )
                                                <option selected value="{{ $no->id }}">{{ $no->nama }} - {{ $no->jabatan }}</option>
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
            $('.chosen').chosen();
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
