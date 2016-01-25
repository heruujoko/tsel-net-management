@if($active == 'dashboard')
    <li class="active">
        <a href="{{ URL::to('/bantek') }}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/bantek') }}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span> </a>
    </li>
@endif

@if($active == 'users')
    <li class="active">
        <a href="{{ URL::to('/bantek/users') }}"><i class="fa fa-users"></i> <span class="nav-label">Users</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/bantek/users') }}"><i class="fa fa-users"></i> <span class="nav-label">Users</span> </a>
    </li>
@endif

@if($active == 'oss')
    @if(isset($material))
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">OSS</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li class="active"><a href="{{ URL::to('/bantek/oss/material') }}">OSS Material</a></li>
            <li><a href="{{ URL::to('/bantek/oss/spj') }}">OSS SPJ Bantek</a></li>
        </ul>
    </li>
    @elseif(isset($spj))
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li><a href="{{ URL::to('/bantek/oss/material') }}">OSS Material</a></li>
            <li class="active"><a href="{{ URL::to('/bantek/oss/spj') }}">OSS SPJ Bantek</a></li>
        </ul>
    </li>
    @endif
@else
    <li class="">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">OSS</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse ">
            <li><a href="{{ URL::to('/bantek/oss/material') }}">OSS Material</a></li>
            <li><a href="{{ URL::to('/bantek/oss/spj') }}">OSS SPJ Bantek</a></li>
        </ul>
    </li>
@endif

@if($active == 'fpl')
    <li class="active">
        <a href="{{ URL::to('/bantek/fpl') }}"><i class="fa fa-briefcase"></i> <span class="nav-label">FPL</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/bantek/fpl') }}"><i class="fa fa-briefcase"></i> <span class="nav-label">FPL</span> </a>
    </li>
@endif

@if($active == 'spph')
    <li class="active">
        <a href="{{ URL::to('/bantek/spph') }}"><i class="fa fa-briefcase"></i> <span class="nav-label">SPPH</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/bantek/spph') }}"><i class="fa fa-briefcase"></i> <span class="nav-label">SPPH</span> </a>
    </li>
@endif

@if($active == 'st')
    <li class="active">
        <a href="{{ URL::to('/bantek/surattugas') }}"><i class="fa fa-envelope"></i> <span class="nav-label">Surat Tugas</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/bantek/surattugas') }}"><i class="fa fa-envelope"></i> <span class="nav-label">Surat Tugas</span> </a>
    </li>
@endif

@if($active == 'pj')
    <li class="active">
        <a href="{{ URL::to('/bantek/perjalanandinas') }}"><i class="fa fa-plane"></i> <span class="nav-label">Perjalanan Dinas</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/bantek/perjalanandinas') }}"><i class="fa fa-plane"></i> <span class="nav-label">Perjalanan Dinas</span> </a>
    </li>
@endif

@if($active == 'stpd')
    <li class="active">
        <a href="{{ URL::to('/bantek/stpd') }}"><i class="fa fa-envelope"></i> <span class="nav-label">STPD</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/bantek/stpd') }}"><i class="fa fa-envelope"></i> <span class="nav-label">STPD</span> </a>
    </li>
@endif

@if($active == 'versheet')
    <li class="active">
        <a href="{{ URL::to('/bantek/versheet') }}"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Verification Sheet</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/bantek/versheet') }}"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Verification Sheet</span> </a>
    </li>
@endif

@if($active == 'fpjp')
    <li class="active">
        <a href="{{ URL::to('/bantek/fpjp') }}"><i class="fa fa-clipboard"></i> <span class="nav-label">FPJP</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/bantek/fpjp') }}"><i class="fa fa-clipboard"></i> <span class="nav-label">FPJP</span> </a>
    </li>
@endif

@if($active == 'bantek')
    <li class="active">
        <a href="{{ URL::to('/bantek/bantek') }}"><i class="fa fa-users"></i> <span class="nav-label">Bantek</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/bantek/bantek') }}"><i class="fa fa-users"></i> <span class="nav-label">Bantek</span> </a>
    </li>
@endif
