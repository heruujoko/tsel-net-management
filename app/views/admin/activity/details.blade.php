@extends('layouts.layout')
@section('title', 'Activity')
@section('breadcrumb')
    <h2>Activity</h2>
    <ol class="breadcrumb">
        <li class="active">
            <strong>Activity</strong>
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
                <li class="active"><a data-toggle="tab" href="#tab-2">Activity Details</a></li>
            </ul>
        </div>
        <div class="panel-body">
            <div class="tab-content">
                <div id="tab-2" class="tab-pane active">
                    {{ Form::open(array('url' => 'admin/activity/'.$activity->id.'/update' , 'class' => 'form form-horizontal')) }}
                        <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label col-md-2">User</label>
                              <div class="col-md-8">
                                <label class="control-label">{{ Auth::user()->nama }}</label>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-2">Nama Site</label>
                              <div class="col-md-8">
                                <label class="control-label">{{ $activity->sites->sitelocation }}</label>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-2">Problem</label>
                              <div class="col-md-8">
                                {{ $activity->problem }}
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-2">Activity</label>
                              <div class="col-md-8">
                                {{ $activity->activity }}
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-2">Detail Activity</label>
                              <div class="col-md-8">
                                {{ $activity->detail_activity }}
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-2">Mulai</label>
                              <div class="col-md-8">
                                <label class="control-label time">{{ $activity->mulai }}</label>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-2">Selesai</label>
                              <div class="col-md-8">
                                <label class="control-label time">{{ $activity->selesai }}</label>
                              </div>
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

@stop

@section('js')
    <script src="{{ URL::to('/') }}/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ URL::to('/') }}/chosen/chosen.jquery.js"></script>
    <script src="{{ URL::to('/') }}/bower_components/numeral/numeral.js"></script>
    <script src="{{ URL::to('/') }}/bower_components/moment/moment.js"></script>
    <script src="{{ URL::to('/') }}/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/bower_components/datatables-bootstrap3-plugin/media/js/datatables-bootstrap3.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/bower_components/moment/moment.js"></script>
    <script type="text/javascript">
        $('.datatable').DataTable({
          "iDisplayLength" : 10,
          "aaSorting": []
        });
        $('.price').each(function(){
            var Pformat = numeral($(this).text()).format('0,0');
            $(this).text('Rp '+Pformat);
        });
        $('.chosen').chosen();
        $('.time').each(function(id,val){
          $(this).val(moment(val).format('LL'));

        });
        $('.date').each(function(id,val){
          $(this).val(moment($(this).val()).format('L'));
        }).promise().done(function(){
          $('.datepicker').datepicker({});
        });
        function hapusPerbaikan(id){
            var str = $('#ids_perbaikan').val();
            var res = str.replace(id+',' , '');
            $('#ids_perbaikan').val(res);
            $('#b-'+id).hide();

        }

        function popupdelete(id){
            console.log('click');
            var choice = confirm('Anda yakin akan menghapus ?');
            if(choice){
                window.location = '{{ URL::to('/') }}'+'/admin/activity/'+id+'/delete';
            }
        }
        CKEDITOR.replace('problem');
        CKEDITOR.replace('activity');
        CKEDITOR.replace('dactivity');
    </script>
@stop
