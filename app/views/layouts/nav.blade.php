@if($active == 'dashboard')
    <li class="active">
        <a href="{{ URL::to('/admin') }}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/admin') }}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span> </a>
    </li>
@endif

@if($active == 'users')
    <li class="active">
        <a href="{{ URL::to('/admin/users') }}"><i class="fa fa-users"></i> <span class="nav-label">Users</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/admin/users') }}"><i class="fa fa-users"></i> <span class="nav-label">Users</span> </a>
    </li>
@endif

@if($active == 'oss')
    @if(isset($material))
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">OSS</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li class="active"><a href="/admin/oss/material">OSS Material</a></li>
            <li><a href="/admin/oss/spj">OSS SPJ Bantek</a></li>
        </ul>
    </li>
    @elseif(isset($spj))
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li><a href="/admin/oss/material">OSS Material</a></li>
            <li class="active"><a href="/admin/oss/spj">OSS SPJ Bantek</a></li>
        </ul>
    </li>
    @endif
@else
    <li class="">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">OSS</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse ">
            <li><a href="/admin/oss/material">OSS Material</a></li>
            <li><a href="/admin/oss/spj">OSS SPJ Bantek</a></li>
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

@if($active == 'bantek')
    <li class="active">
        <a href="{{ URL::to('/admin/bantek') }}"><i class="fa fa-users"></i> <span class="nav-label">Bantek</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/admin/bantek') }}"><i class="fa fa-users"></i> <span class="nav-label">Bantek</span> </a>
    </li>
@endif

@if($active == 'data')
    @if(isset($mitra))
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li><a href="/admin/lokasikerja">Lokasi Kerja</a></li>
            <li class="active"><a href="/admin/mitra">Mitra</a></li>
            <li><a href="/admin/signature">Tanda Tangan</a></li>
        </ul>
    </li>
    @elseif(isset($signature))
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li><a href="/admin/lokasikerja">Lokasi Kerja</a></li>
            <li><a href="/admin/mitra">Mitra</a></li>
            <li class="active"><a href="/admin/signature">Tanda Tangan</a></li>
        </ul>
    </li>
    @elseif(isset($lokasikerja))
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li class="active"><a href="/admin/lokasikerja">Lokasi Kerja</a></li>
            <li><a href="/admin/mitra">Mitra</a></li>
            <li><a href="/admin/signature">Tanda Tangan</a></li>
        </ul>
    </li>
    @else
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li><a href="/admin/lokasikerja">Lokasi Kerja</a></li>
            <li><a href="/admin/mitra">Mitra</a></li>
            <li><a href="/admin/signature">Tanda Tangan</a></li>
        </ul>
    </li>
    @endif
@else
    <li class="">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse ">
            <li><a href="/admin/lokasikerja">Lokasi Kerja</a></li>
            <li><a href="/admin/mitra">Mitra</a></li>
            <li><a href="/admin/signature">Tanda Tangan</a></li>
        </ul>
    </li>
@endif