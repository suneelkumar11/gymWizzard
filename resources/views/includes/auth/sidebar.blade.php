<!-- Sidebar -->
<ul class="navbar-nav bg-white sidebar sidebar-dark accordion" id="accordionSidebar">
	<div class="logo-toggle">
		<div class="text-center d-none d-md-inline">
			<button class="rounded-circle border-0" id="sidebarToggle"><i class="fas fa-bars"></i></button>
		</div>
		<a class="sidebar-brand d-flex align-items-center justify-content-center logo-img" href="{{ url('admin') }}">
			<div class="sidebar-brand-text mx-3"><img src="{{ url('assets/images/logo.png') }}"></div>
		</a>
	</div>
	<div class="user-icon-outer">
		<div class="img-user">
			@if(Auth::user()->profile)
				<img src="{{ url(Auth::user()->profile) }}" class="profile-pictur">
			@else 
				<img src="{{ url('assets/images/avtar.png') }}" class="profile-pictur">
			@endif
		</div>
		<h3>{{ ucwords(Auth::user()->name) }}</h3>
		<p>{{ ucwords(Auth::user()->type) }}</p>
	</div>
	
	<!-- Nav Item - Dashboard -->
	<li class="nav-item {{ Request::segment(2) == null ? 'active' : '' }}">
		<a class="nav-link" href="{{ url('/dashboard') }}">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span>
		</a>
	</li>
	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item {{ Request::segment(2) == 'users' ? 'active' : '' }}">
		<a class="nav-link collapsed" href="{{ url('/users') }}">
			<i class="fas fa-user"></i>
			<span>Users</span>
		</a>
	</li>
</ul>
<!-- End of Sidebar -->