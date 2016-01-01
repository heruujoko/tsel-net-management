@extends('layouts.layout')
@section('title', 'FPJP')
@section('breadcrumb')
    <h2>FPJP</h2>
    <ol class="breadcrumb">
        <li class="">
            <p>FPJP</p>
        </li>
        <li class="active">
            <strong>edit</strong>
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
                        {{ Form::open(array('method'=> 'PATCH', 'url' => 'admin/fpjp/'.$fpjp->id.'' , 'class' => 'form form-horizontal')) }}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-3" for="user">User</label>
                                <div class="col-md-6">
                                    <label class="control-label">{{ Auth::user()->nama }}</label>
                                    <input type="hidden" class="form-control" name="user" value="{{ Auth::user()->id }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="user">Tanggal</label>
                                <div class="col-md-6">
                                    <input type="text" name="tanggal" class="form-control datepicker time" value="{{ $fpjp->tanggal }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="user">Uraian</label>
                                <div class="col-md-6">
                                    <div id="list-uraian">
                                      @foreach($fpjp->uraians as $urai)
                                        <p id='fp-{{ $urai->id }}'>{{ $urai->uraian }} <a onclick="hapusUraian('{{ $urai->id }}')">hapus</a></p>
                                      @endforeach
                                    </div>
                                    <input type="hidden" name="ids_uraian" id="ids_uraian" value="{{ $uraians }}">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal6">
                                        Tambah baru
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="user">Diketahui Oleh</label>
                                <div class="col-md-6">
                                    <select name="mengetahui" class="form-control chosen">
                                        @foreach($user_no as $no)
                                            @if($no->id == $fpjp->user_mengetahui)
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
                <h4 class="modal-title">Uraian</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Uraian</label>
                        <input type="text" class="form-control" id="ajaxfp-uraian">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Biaya</label>
                        <input type="text" class="form-control" id="ajaxfp-jumlah">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button onclick="newUraian()" class="btn btn-primary">Save changes</button>
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

        function hapusUraian(id){
            var str = $('#ids_uraian').val();
            var res = str.replace(id+',' , '');
            $('#ids_uraian').val(res);
            $('#fp-'+id).hide();

        }
        function newUraian(){
            var formData = {
                'uraian'  : $('#ajaxfp-uraian').val(),
                'jumlah'  : $('#ajaxfp-jumlah').val()
            };

            $.ajax({
                url: "{{ URL::to('/') }}/ajax/fpjp/uraian/create",
                method: "POST",
                data: formData,
                success : function(output){
                    console.log(output);
                    $('#myModal6').modal('toggle');
                    // window.location.reload();
                    $('#list-uraian').append("<p id='fp-"+output.id+"'>"+output.uraian+" <a onclick=\"hapusUraian('"+output.id+"')\">hapus</a></p>");
                    var ur = $('#ids_uraian').val();
                    $('#ids_uraian').val(ur+output.id+',');
                },
                error: function(msg){
                    console.log(msg);
                }
            })
        }
        function popupdelete(id){
            console.log('click');
            var choice = confirm('Anda yakin akan menghapus ?');
            if(choice){
                window.location = '{{ URL::to('/') }}'+'/admin/fpjp/'+id+'/delete';
            }
        }
    </script>
@stop
