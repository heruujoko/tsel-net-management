@if($active == 'dashboard')
    <li class="active">
        <a href="{{ URL::to('/no') }}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/no') }}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span> </a>
    </li>
@endif

@if($active == 'users')
    <li class="active">
        <a href="{{ URL::to('/no/users') }}"><i class="fa fa-users"></i> <span class="nav-label">Users</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/no/users') }}"><i class="fa fa-users"></i> <span class="nav-label">Users</span> </a>
    </li>
@endif

@if($active == 'oss')
    @if(isset($material))
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">OSS</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li class="active"><a href="{{ URL::to('/no/oss/material') }}">OSS Material</a></li>
            <li><a href="{{ URL::to('/no/oss/spj') }}">OSS SPJ Bantek</a></li>
        </ul>
    </li>
    @elseif(isset($spj))
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li><a href="{{ URL::to('/no/oss/material') }}">OSS Material</a></li>
            <li class="active"><a href="{{ URL::to('/no/oss/spj') }}">OSS SPJ Bantek</a></li>
        </ul>
    </li>
    @endif
@else
    <li class="">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">OSS</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse ">
            <li><a href="{{ URL::to('/no/oss/material') }}">OSS Material</a></li>
            <li><a href="{{ URL::to('/no/oss/spj') }}">OSS SPJ Bantek</a></li>
        </ul>
    </li>
@endif

@if($active == 'fpl')
    <li class="active">
        <a href="{{ URL::to('/no/fpl') }}"><i class="fa fa-briefcase"></i> <span class="nav-label">FPL</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/no/fpl') }}"><i class="fa fa-briefcase"></i> <span class="nav-label">FPL</span> </a>
    </li>
@endif

@if($active == 'spph')
    <li class="active">
        <a href="{{ URL::to('/no/spph') }}"><i class="fa fa-briefcase"></i> <span class="nav-label">SPPH</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/no/spph') }}"><i class="fa fa-briefcase"></i> <span class="nav-label">SPPH</span> </a>
    </li>
@endif

@if($active == 'st')
    <li class="active">
        <a href="{{ URL::to('/no/surattugas') }}"><i class="fa fa-envelope"></i> <span class="nav-label">Surat Tugas</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/no/surattugas') }}"><i class="fa fa-envelope"></i> <span class="nav-label">Surat Tugas</span> </a>
    </li>
@endif

@if($active == 'pj')
    <li class="active">
        <a href="{{ URL::to('/no/perjalanandinas') }}"><i class="fa fa-plane"></i> <span class="nav-label">Perjalanan Dinas</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/no/perjalanandinas') }}"><i class="fa fa-plane"></i> <span class="nav-label">Perjalanan Dinas</span> </a>
    </li>
@endif

@if($active == 'stpd')
    <li class="active">
        <a href="{{ URL::to('/no/stpd') }}"><i class="fa fa-envelope"></i> <span class="nav-label">STPD</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/no/stpd') }}"><i class="fa fa-envelope"></i> <span class="nav-label">STPD</span> </a>
    </li>
@endif

@if($active == 'versheet')
    <li class="active">
        <a href="{{ URL::to('/no/versheet') }}"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Verification Sheet</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/no/versheet') }}"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Verification Sheet</span> </a>
    </li>
@endif

@if($active == 'fpjp')
    <li class="active">
        <a href="{{ URL::to('/no/fpjp') }}"><i class="fa fa-clipboard"></i> <span class="nav-label">FPJP</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/no/fpjp') }}"><i class="fa fa-clipboard"></i> <span class="nav-label">FPJP</span> </a>
    </li>
@endif

@if($active == 'bantek')
    <li class="active">
        <a href="{{ URL::to('/no/bantek') }}"><i class="fa fa-users"></i> <span class="nav-label">Bantek</span> </a>
    </li>
@else
    <li class="">
        <a href="{{ URL::to('/no/bantek') }}"><i class="fa fa-users"></i> <span class="nav-label">Bantek</span> </a>
    </li>
@endif

@if($active == 'import')
    @if(isset($sl))
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Import Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li class="active"><a href="{{ URL::to('/no/import/shoplists') }}">Import Shoppinglist</a></li>
            <li><a href="{{ URL::to('/no/import/mastertp') }}">Import Mastertp</a></li>
        </ul>
    </li>
    @else
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Import Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li><a href="{{ URL::to('/no/import/shoplists') }}">Import Shoppinglist</a></li>
            <li class="active"><a href="{{ URL::to('/no/import/mastertp') }}">Import Mastertp</a></li>
        </ul>
    </li>
    @endif
@else
<li class="">
    <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Import Data</span><span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
        <li><a href="{{ URL::to('/no/import/shoplists') }}">Import Shoppinglist</a></li>
        <li><a href="{{ URL::to('/no/import/mastertp') }}">Import Mastertp</a></li>
    </ul>
</li>
@endif

@if($active == 'data')
    @if(isset($mitra))
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li><a href="{{ URL::to('/no/lokasikerja') }}">Lokasi Kerja</a></li>
            <li class="active"><a href="{{ URL::to('/no/mitra') }}">Mitra</a></li>
            <li><a href="{{ URL::to('/no/signature') }}">Tanda Tangan</a></li>
        </ul>
    </li>
    @elseif(isset($signature))
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li><a href="{{ URL::to('/no/lokasikerja') }}">Lokasi Kerja</a></li>
            <li><a href="{{ URL::to('/no/mitra') }}">Mitra</a></li>
            <li class="active"><a href="{{ URL::to('/no/signature') }}">Tanda Tangan</a></li>
        </ul>
    </li>
    @elseif(isset($lokasikerja))
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li class="active"><a href="{{ URL::to('/no/lokasikerja') }}">Lokasi Kerja</a></li>
            <li><a href="{{ URL::to('/no/mitra') }}">Mitra</a></li>
            <li><a href="{{ URL::to('/no/signature') }}">Tanda Tangan</a></li>
        </ul>
    </li>
    @else
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li><a href="{{ URL::to('/no/lokasikerja') }}">Lokasi Kerja</a></li>
            <li><a href="{{ URL::to('/no/mitra') }}">Mitra</a></li>
            <li><a href="{{ URL::to('/no/signature') }}">Tanda Tangan</a></li>
        </ul>
    </li>
    @endif
@else
    <li class="">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse ">
            <li><a href="{{ URL::to('/no/lokasikerja') }}">Lokasi Kerja</a></li>
            <li><a href="{{ URL::to('/no/mitra') }}">Mitra</a></li>
            <li><a href="{{ URL::to('/no/signature') }}">Tanda Tangan</a></li>
        </ul>
    </li>
@endif
