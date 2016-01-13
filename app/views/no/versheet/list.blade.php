@extends('layouts.layout')
@section('title', 'Verification Sheet')
@section('breadcrumb')
    <h2>Verification Sheet</h2>
    <ol class="breadcrumb">
        <li class="active">
            <strong>Verification Sheet</strong>
        </li>
    </ol>
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::to('/') }}/datepicker/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/bower_components/chosen-bootstrap/chosen.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/bower_components/datatables-bootstrap3-plugin/media/css/datatables-bootstrap3.min.css">
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
        <div class="panel-options">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-1">List Versheet</a></li>
                <li><a data-toggle="tab" href="#tab-2">Create Versheet</a></li>
            </ul>
        </div>
        <div class="panel-body">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th width="1%">ID</th>
                                <th>Nama</th>
                                <th>Pembayaran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vs as $sheet)
                                <tr>
                                    <td>{{ $sheet->id }}</td>
                                    <td>{{ $sheet->kepada_nama }}</td>
                                    <td>{{ $sheet->untuk_pembayaran }}</td>
                                    <td>
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a href="{{ URL::to('/') }}/no/versheet/{{ $sheet->id }}/details">Details</a></li>
                                        </ul>
                                      </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="tab-2" class="tab-pane">
                    {{ Form::open(array('url' => 'no/versheet' , 'class' => 'form form-horizontal')) }}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-3" for="invoice">No Invoice</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="invoice">
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
                                        @foreach($doc_type as $doc)
                                            <option value="{{ $doc->doc_name }}">{{ $doc->doc_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="pembayaran">Untuk Pembayaran</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="pembayaran" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="jumlah">Jumlah Pembayaran</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="jumlah" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="trxid">TRX ID</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="trxid">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="cost_centre">Cost Centre</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="cost_centre">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="budget_account">Budget Account</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="budget_account">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="activity_code">Activity Code</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="activity_code">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="kepada">Dibayarkan Kepada</label>
                                <div class="col-md-6">
                                    @if(Auth::user()->role != 'admin')
                                        <input type="text" class="form-control" name="kepada_nama" placeholder="Nama">
                                        <input type="text" class="form-control" name="kepada_bank" placeholder="Bank / Cabang">
                                        <input type="text" class="form-control" name="kepada_rekening" placeholder="Rekening">
                                    @else
                                        <input type="text" class="form-control" name="kepada_nama" placeholder="Nama" value="{{ Auth::user()->nama }}">
                                        <input type="text" class="form-control" name="kepada_bank" placeholder="Bank / Cabang" value="{{ Auth::user()->bank }}">
                                        <input type="text" class="form-control" name="kepada_rekening" placeholder="Rekening" value="{{ Auth::user()->no_rekening }}">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="menyetujui">Menyetujui</label>
                                <div class="col-md-6">
                                    <select class="form-control chosen" name="menyetujui">
                                        @foreach($user_no as $no)
                                            <option value="{{ $no->id }}">{{ $no->nama }} - {{ $no->jabatan }}</option>
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
    <script type="text/javascript" src="{{ URL::to('/') }}/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/bower_components/datatables-bootstrap3-plugin/media/js/datatables-bootstrap3.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/bower_components/moment/moment.js"></script>
    <script type="text/javascript">
        $('.datepicker').datepicker({

        });
        $('.datatable').DataTable({
          "iDisplayLength" : 10,
          "aaSorting": []
        });
        $('.chosen').chosen({});
        $('.price').each(function(){
            var Pformat = numeral($(this).text()).format('0,0');
            $(this).text('Rp '+Pformat);
        });
        function popupdelete(id){
            console.log('click');
            var choice = confirm('Anda yakin akan menghapus ?');
            if(choice){
                window.location = '{{ URL::to('/') }}'+'/admin/versheet/'+id+'/delete';
            }
        }
    </script>
@stop
