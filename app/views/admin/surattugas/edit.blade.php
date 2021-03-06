@extends('layouts.layout')
@section('title', 'Surat Tugas')
@section('breadcrumb')
    <h2>Surat Tugas</h2>
    <ol class="breadcrumb">
        <li class="">
            <strong>Surat Tugas</strong>
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
                        {{ Form::open(array('method'=> 'PATCH', 'url' => 'admin/surattugas/'.$surat->id.'' , 'class' => 'form form-horizontal')) }}
                        <div class="form-group">
                            <label class="control-label col-md-3">Bantek</label>
                            <div class="col-md-6">
                                <select multiple class="chosen form-control" name="bantek[]">
                                    @if(count($surat->banteks) > 0)
                                    @foreach($bantek as $b)
                                        @foreach($surat->banteks as $sb)
                                            @if($b->id == $sb->id )
                                                <option selected value="{{ $b->id }}">{{ $b->nama }} - {{ $b->perusahaan }}</option>
                                            @else
                                                <option value="{{ $b->id }}">{{ $b->nama }} - {{ $b->perusahaan }}</option>
                                            @endif
                                        @endforeach
                                    @endforeach
                                    @else
                                        @foreach($bantek as $b)
                                            <option value="{{ $b->id }}">{{ $b->nama }} - {{ $b->perusahaan }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Activity</label>
                            <div class="col-md-6">
                                <div id="list-activity">
                                    @foreach($surat->activities as $act)
                                        <p id='ac-{{ $act->id }}'>{{ $act->activity }}<a onclick="hapusActivity('{{ $act->id }}')"> hapus</a></p>
                                    @endforeach
                                </div>
                                <input type="hidden" name="activity" id="activity" value="{{ $activity_ids }}">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal7">
                                    Tambah activity baru
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal8">
                                    Tambah site baru
                                </button>        
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="control-label col-md-3">Menyetujui</label>
                            <div class="col-md-6">
                                <select class="form-control chosen" name="menyetujui">
                                    @foreach($user_no as $no)
                                        @if($no->id == $surat->setuju->id )
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
                <h4 class="modal-title">Bantek</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Nama</label>
                        <input type="text" class="form-control" id="ajaxbantek-nama">
                    </div>
                    <div class="form-group">
                        <label class="control-label">HP</label>
                        <input type="text" class="form-control" id="ajaxbantek-hp">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Perusahaan</label>
                        <input type="text" class="form-control" id="ajaxbantek-perusahaan">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button onclick="newBantek()" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal fade in" id="myModal7" tabindex="-1" role="dialog" aria-hidden="true" style="padding-left: 0px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Tambah Activity Baru</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Nama Site</label>
                        <div class="">
                            <select class="form-control" id="ajaxactivity-site">
                                @foreach($sites as $site)
                                    <option value="{{ $site->id }}">{{ $site->sitelocation }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Mulai</label>
                        <div class="">
                            <input class="form-control datepicker" id="ajaxactivity-mulai">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Selesai</label>
                        <div class="">
                            <input class="form-control datepicker" id="ajaxactivity-selesai">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Activity</label>
                        <div class="">
                            <input class="form-control" id="ajaxactivity-activity">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button onclick="newActivity()" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal fade in" id="myModal8" tabindex="-1" role="dialog" aria-hidden="true" style="padding-left: 0px;">
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
@stop

@section('js')
    <script src="{{ URL::to('/') }}/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ URL::to('/') }}/chosen/chosen.jquery.js"></script>
    <script src="{{ URL::to('/') }}/bower_components/numeral/numeral.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/bower_components/moment/moment.js"></script>
    <script type="text/javascript">
        $('.datepicker').datepicker({});
        $('.price').each(function(){
            var Pformat = numeral($(this).text()).format('0,0');
            $(this).text('Rp '+Pformat);
        });
        $('.chosen').chosen();
        function hapusPerbaikan(id){
            var str = $('#ids_perbaikan').val();
            var res = str.replace(id+',' , '');
            $('#ids_perbaikan').val(res);
            $('#b-'+id).hide();

        }

        function newActivity(){
            var formData = {
                'site' : $('#ajaxactivity-site').val(),
                'mulai' : $('#ajaxactivity-mulai').val(),
                'selesai' : $('#ajaxactivity-selesai').val(),
                'activity' : $('#ajaxactivity-activity').val()
            };

            $.ajax({
                url: "{{ URL::to('/') }}/ajax/st/activity/create",
                method: "POST",
                data: formData,
                success : function(output){
                    console.log(output);
                    $('#myModal7').modal('toggle');
                    $('#list-activity').append("<p id='ac-"+output.id+"'>"+output.activity+" <a onclick=\"hapusActivity('"+output.id+"')\">hapus</a></p>");
                    // window.location.reload();
                    var act = $('#activity').val();
                    $('#activity').val(act+output.id+',');
                },
                error: function(msg){
                    console.log(msg);
                }
            })
        }

        function hapusActivity(id){
            var str = $('#activity').val();
            var res = str.replace(id+',' , '');
            $('#activity').val(res);
            $('#ac-'+id).hide();

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

        function newBantek(){
            var formData = {
                'nama' : $('#ajaxbantek-nama').val(),
                'hp'  : $('#ajaxbantek-hp').val(),
                'perusahaan'  : $('#ajaxbantek-perusahaan').val()
            };

            $.ajax({
                url: "{{ URL::to('/') }}/ajax/bantek/create",
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

        function popupdelete(id){
            console.log('click');
            var choice = confirm('Anda yakin akan menghapus ?');
            if(choice){
                window.location = '{{ URL::to('/') }}'+'/admin/spph/'+id+'/delete';
            }
        }
    </script>
@stop
