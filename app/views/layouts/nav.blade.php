@if($active == 'dashboard')
    <li class="active">
        <a href="{{ URL::to('/admin') }}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/admin') }}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span> </a>
    </li>
@endif

@if($active == 'oss')
    @if(isset($material))
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">OSS</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li class="active"><a href="{{ URL::to('/admin/oss/material') }}">OSS Material</a></li>
            <li><a href="{{ URL::to('/admin/oss/spj') }}">OSS SPJ Bantek</a></li>
        </ul>
    </li>
    @elseif(isset($spj))
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li><a href="{{ URL::to('/admin/oss/material') }}">OSS Material</a></li>
            <li class="active"><a href="{{ URL::to('/admin/oss/spj')}}">OSS SPJ Bantek</a></li>
        </ul>
    </li>
    @endif
@else
    <li class="">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">OSS</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse ">
            <li><a href="{{ URL::to('/admin/oss/material') }}">OSS Material</a></li>
            <li><a href="{{ URL::to('/admin/oss/spj') }}">OSS SPJ Bantek</a></li>
        </ul>
    </li>
@endif

@if($active == 'fpl')
    <li class="active">
        <a href="{{ URL::to('/admin/fpl') }}"><i class="fa fa-briefcase"></i> <span class="nav-label">FPL</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/admin/fpl') }}"><i class="fa fa-briefcase"></i> <span class="nav-label">FPL</span> </a>
    </li>
@endif

@if($active == 'spph')
    <li class="active">
        <a href="{{ URL::to('/admin/spph') }}"><i class="fa fa-briefcase"></i> <span class="nav-label">SPPH</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/admin/spph') }}"><i class="fa fa-briefcase"></i> <span class="nav-label">SPPH</span> </a>
    </li>
@endif

@if($active == 'st')
    <li class="active">
        <a href="{{ URL::to('/admin/surattugas') }}"><i class="fa fa-envelope"></i> <span class="nav-label">Surat Tugas</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/admin/surattugas') }}"><i class="fa fa-envelope"></i> <span class="nav-label">Surat Tugas</span> </a>
    </li>
@endif

@if($active == 'pj')
    <li class="active">
        <a href="{{ URL::to('/admin/perjalanandinas') }}"><i class="fa fa-plane"></i> <span class="nav-label">Perjalanan Dinas</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/admin/perjalanandinas') }}"><i class="fa fa-plane"></i> <span class="nav-label">Perjalanan Dinas</span> </a>
    </li>
@endif

@if($active == 'stpd')
    <li class="active">
        <a href="{{ URL::to('/admin/stpd') }}"><i class="fa fa-envelope"></i> <span class="nav-label">STPD</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/admin/stpd') }}"><i class="fa fa-envelope"></i> <span class="nav-label">STPD</span> </a>
    </li>
@endif

@if($active == 'versheet')
    <li class="active">
        <a href="{{ URL::to('/admin/versheet') }}"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Verification Sheet</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/admin/versheet') }}"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Verification Sheet</span> </a>
    </li>
@endif

@if($active == 'fpjp')
    <li class="active">
        <a href="{{ URL::to('/admin/fpjp') }}"><i class="fa fa-clipboard"></i> <span class="nav-label">FPJP</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/admin/fpjp') }}"><i class="fa fa-clipboard"></i> <span class="nav-label">FPJP</span> </a>
    </li>
@endif

@if($active == 'bantek')
    <li class="active">
        <a href="{{ URL::to('/admin/bantek') }}"><i class="fa fa-users"></i> <span class="nav-label">Bantek</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/admin/bantek') }}"><i class="fa fa-users"></i> <span class="nav-label">Bantek</span> </a>
    </li>
@endif

@if($active == 'activity')
    <li class="active">
        <a href="{{ URL::to('/admin/activity') }}"><i class="fa fa-clipboard"></i> <span class="nav-label">Activity</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/admin/activity') }}"><i class="fa fa-clipboard"></i> <span class="nav-label">Activity</span> </a>
    </li>
@endif

@if($active == 'data')
    @if(isset($mitra))
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li><a href="{{ URL::to('/admin/lokasikerja') }}">Lokasi Kerja</a></li>
            <li class="active"><a href="{{ URL::to('/admin/mitra') }}">Mitra</a></li>
            <li><a href="{{ URL::to('/admin/signature') }}">Tanda Tangan</a></li>
            <li><a href="{{ URL::to('/admin/users') }}"> <span class="nav-label">Users</span> </a><li>
              <li><a href="{{ URL::to('/admin/import/shoplists') }}">Import Shoppinglist</a></li>
              <li><a href="{{ URL::to('/admin/import/mastertp') }}">Import Mastertp</a></li>
        </ul>
    </li>
    @elseif(isset($signature))
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li><a href="{{ URL::to('/admin/lokasikerja') }}">Lokasi Kerja</a></li>
            <li><a href="{{ URL::to('/admin/mitra') }}">Mitra</a></li>
            <li class="active"><a href="{{ URL::to('/admin/signature') }}">Tanda Tangan</a></li>
            <li><a href="{{ URL::to('/admin/users') }}"> <span class="nav-label">Users</span> </a><li>
              <li><a href="{{ URL::to('/admin/import/shoplists') }}">Import Shoppinglist</a></li>
              <li><a href="{{ URL::to('/admin/import/mastertp') }}">Import Mastertp</a></li>
        </ul>
    </li>
    @elseif(isset($lokasikerja))
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li class="active"><a href="{{ URL::to('/admin/lokasikerja') }}">Lokasi Kerja</a></li>
            <li><a href="{{ URL::to('/admin/mitra') }}">Mitra</a></li>
            <li><a href="{{ URL::to('/admin/signature') }}">Tanda Tangan</a></li>
            <li><a href="{{ URL::to('/admin/users') }}"> <span class="nav-label">Users</span> </a><li>
              <li><a href="{{ URL::to('/admin/import/shoplists') }}">Import Shoppinglist</a></li>
              <li><a href="{{ URL::to('/admin/import/mastertp') }}">Import Mastertp</a></li>
        </ul>
    </li>
    @elseif(isset($usermenu))
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li><a href="{{ URL::to('/admin/lokasikerja') }}">Lokasi Kerja</a></li>
            <li><a href="{{ URL::to('/admin/mitra') }}">Mitra</a></li>
            <li><a href="{{ URL::to('/admin/signature') }}">Tanda Tangan</a></li>
            <li class="active"><a href="{{ URL::to('/admin/users') }}"> <span class="nav-label">Users</span> </a><li>
              <li><a href="{{ URL::to('/admin/import/shoplists') }}">Import Shoppinglist</a></li>
              <li><a href="{{ URL::to('/admin/import/mastertp') }}">Import Mastertp</a></li>
        </ul>
    </li>
    @elseif(isset($importshop))
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li><a href="{{ URL::to('/admin/lokasikerja') }}">Lokasi Kerja</a></li>
            <li><a href="{{ URL::to('/admin/mitra') }}">Mitra</a></li>
            <li><a href="{{ URL::to('/admin/signature') }}">Tanda Tangan</a></li>
            <li><a href="{{ URL::to('/admin/users') }}"> <span class="nav-label">Users</span> </a><li>
              <li class="active"><a href="{{ URL::to('/admin/import/shoplists') }}">Import Shoppinglist</a></li>
              <li><a href="{{ URL::to('/admin/import/mastertp') }}">Import Mastertp</a></li>
        </ul>
    </li>
    @elseif(isset($importsite))
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li><a href="{{ URL::to('/admin/lokasikerja') }}">Lokasi Kerja</a></li>
            <li><a href="{{ URL::to('/admin/mitra') }}">Mitra</a></li>
            <li><a href="{{ URL::to('/admin/signature') }}">Tanda Tangan</a></li>
            <li><a href="{{ URL::to('/admin/users') }}"> <span class="nav-label">Users</span> </a><li>
              <li><a href="{{ URL::to('/admin/import/shoplists') }}">Import Shoppinglist</a></li>
              <li class="active"><a href="{{ URL::to('/admin/import/mastertp') }}">Import Mastertp</a></li>
        </ul>
    </li>
    @else
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li><a href="{{ URL::to('/admin/lokasikerja') }}">Lokasi Kerja</a></li>
            <li><a href="{{ URL::to('/admin/mitra') }}">Mitra</a></li>
            <li><a href="{{ URL::to('/admin/signature') }}">Tanda Tangan</a></li>
            <li><a href="{{ URL::to('/admin/users') }}"> <span class="nav-label">Users</span> </a><li>
              <li><a href="{{ URL::to('/admin/import/shoplists') }}">Import Shoppinglist</a></li>
              <li><a href="{{ URL::to('/admin/import/mastertp') }}">Import Mastertp</a></li>
        </ul>
    </li>
    @endif
@else
    <li class="">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse ">
            <li><a href="{{ URL::to('/admin/lokasikerja') }}">Lokasi Kerja</a></li>
            <li><a href="{{ URL::to('/admin/mitra') }}">Mitra</a></li>
            <li><a href="{{ URL::to('/admin/signature') }}">Tanda Tangan</a></li>
            <li><a href="{{ URL::to('/admin/users') }}"> <span class="nav-label">Users</span> </a><li>
            <li><a href="{{ URL::to('/admin/import/shoplists') }}">Import Shoppinglist</a></li>
            <li><a href="{{ URL::to('/admin/import/mastertp') }}">Import Mastertp</a></li>
        </ul>
    </li>
@endif
