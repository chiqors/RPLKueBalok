<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-warning elevation-4">
    <!-- Brand Logo -->
    <a href="{{ site_url('customer_servis') }}" class="brand-link bg-gray-light">
        <img src="{{ asset('cpanel/img/logo.png') }}" alt="Logo" class="brand-image"
            style="opacity: .8">
        <span class="brand-text font-weight"><b>{{ getenv('APP_NAME') }}</b></span>
    </a>
    <!-- Profile panel -->
    <div class="user-profile d-flex">
        <div class="profile-canvas" style="background-image: linear-gradient(135deg,rgba(45,53,61,.79) 0,rgba(45,53,61,.5) 100%),url({{ asset('cpanel/img/bg.jpg') }})"></div>
        <a href="#" class="profile-link">
            <img src="{{ asset('cpanel/img/_customerservis.png') }}" alt="Logo" class="brand-image img-circle elevation-3">
            <span class="brand-text profile-text font-weight-light"><b>{{ $this->session->username }}</b></span>
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2 sidebar-container">
            <ul class="nav nav-pills nav-sidebar flex-column sidebar-menu" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
			with font-awesome or any other icon font library -->
				<li class="nav-item {{ @$activeMenu == 'kuisioner' ? 'menu-open' : '' }}">
					<a href="{{ site_url('customer_servis/kuisioner') }}" class="nav-link {{ @$activeMenu == 'kuisioner' ? 'active' : '' }}">
						<i class="nav-icon fa fa-file-text"></i>
						<p>
							Kuisioner
						</p>
					</a>
				</li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
