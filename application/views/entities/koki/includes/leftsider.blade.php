<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ site_url('koki') }}" class="brand-link bg-primary">
        <img src="{{ asset('cpanel/img/logo.png') }}" alt="Logo" class="brand-image"
            style="opacity: .8">
        <span class="brand-text font-weight"><b>{{ getenv('APP_NAME') }}</b></span>
    </a>
    <!-- Profile panel -->
    <div class="user-profile d-flex">
        <div class="profile-canvas" style="background-image: linear-gradient(135deg,rgba(45,53,61,.79) 0,rgba(45,53,61,.5) 100%),url({{ asset('cpanel/img/bg.jpg') }})"></div>
        <a href="#" class="profile-link">
            <img src="{{ asset('cpanel/img/_guest.png') }}" alt="Logo" class="brand-image img-circle elevation-3">
            <span class="brand-text profile-text font-weight-light"><b>{{ $this->session->username }}</b> <i class="fa fa-cog"></i></span>
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2 sidebar-container">
            <ul class="nav nav-pills nav-sidebar flex-column sidebar-menu" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
			with font-awesome or any other icon font library -->
				<li class="nav-item {{ @$activeMenu == 'menu' ? 'menu-open' : '' }}">
					<a href="{{ site_url('koki/menu') }}" class="nav-link {{ @$activeMenu == 'menu' ? 'active' : '' }}">
						<i class="nav-icon fa fa-cutlery"></i>
						<p>
							Menu
						</p>
					</a>
				</li>
				<li class="nav-item {{ @$activeMenu == 'pesanan' ? 'menu-open' : '' }}">
                    <a href="{{ site_url('koki/pesanan') }}" class="nav-link {{ @$activeMenu == 'pesanan' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-tasks"></i>
                        <p>
                            Pesanan
                        </p>
                    </a>
				</li>
				<li class="nav-item {{ @$activeMenu == 'bahanbaku' ? 'menu-open' : '' }}" style="display: none">
                    <a href="{{ site_url('koki/bahanbaku') }}" class="nav-link {{ @$activeMenu == 'bahanbaku' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-cubes"></i>
                        <p>
                            Bahan Baku
                        </p>
                    </a>
				</li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
