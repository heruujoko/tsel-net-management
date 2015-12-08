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
    <li class="active">
        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Data</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse in">
            <li><a href="/admin/lokasikerja">Lokasi Kerja</a></li>
            <li><a href="/admin/mitra">Mitra</a></li>
            <li><a href="/admin/signature">Tanda Tangan</a></li>
        </ul>
    </li>
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
