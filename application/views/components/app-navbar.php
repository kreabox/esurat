<nav class="app-header navbar navbar-expand bg-body">
	<!--begin::Container-->
	<div class="container-fluid">
		<!--begin::Start Navbar Links-->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
					<i class="bi bi-list"></i>
				</a>
			</li>
			<li class="nav-item d-none d-md-block">
				<a href="<?= base_url() ?>" class="nav-link">Home</a>
			</li>
			<li class="nav-item dropdown" data-bs-theme="light">
				<button
				class="btn btn-link nav-link py-2 px-0 px-lg-2 dropdown-toggle d-flex align-items-center"
				id="bd-theme"
				type="button"
				aria-expanded="false"
				data-bs-toggle="dropdown"
				data-bs-display="static"
				>
				<span class="theme-icon-active">
					<i class="my-1"></i>
				</span>
				<span class="d-lg-none ms-2" id="bd-theme-text">Toggle theme</span>
				</button>
				<ul
				class="dropdown-menu dropdown-menu-end"
				aria-labelledby="bd-theme-text"
				style="--bs-dropdown-min-width: 8rem;"
				>
				<li>
					<button
					type="button"
					class="dropdown-item d-flex align-items-center active"
					data-bs-theme-value="light"
					aria-pressed="false"
					>
					<i class="bi bi-sun-fill me-2"></i>
					Light
					<i class="bi bi-check-lg ms-auto d-none"></i>
					</button>
				</li>
				<li>
					<button
					type="button"
					class="dropdown-item d-flex align-items-center"
					data-bs-theme-value="dark"
					aria-pressed="false"
					>
					<i class="bi bi-moon-fill me-2"></i>
					Dark
					<i class="bi bi-check-lg ms-auto d-none"></i>
					</button>
				</li>
				</ul>
			</li>
		</ul>
		<!--end::Start Navbar Links-->

		<!--begin::End Navbar Links-->
		<ul class="navbar-nav ms-auto">
			<!--begin::Navbar Search-->
			<li class="nav-item">
				<a class="nav-link" data-widget="navbar-search" href="#" role="button">
					<i class="bi bi-search"></i>
				</a>
			</li>
			<!--end::Navbar Search-->

			<!--begin::User Menu Dropdown-->
			<li class="nav-item dropdown user-menu">
				<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
					<img src="<?= base_url('upload/noimage.png') ?>" class="user-image rounded-circle shadow" alt="User Image">
					<span class="d-none d-md-inline"><?= $this->session->userdata('user')['nama_lengkap']?? 'Nama User' ?></span>
				</a>
				<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
					<!--begin::User Image-->
					<li class="user-header text-bg-primary">
						<img src="<?= base_url('upload/noimage.png') ?>" class="rounded-circle shadow" alt="User Image">
						<p>
							<?= $this->session->userdata('user')['nama_lengkap']?? 'Nama User' ?>
							<small><?= date('Ymd') ?></small>
						</p>
					</li>
					<!--end::User Image-->
					<!--end::Menu Body-->
					<!--begin::Menu Footer-->
					<li class="user-footer">
						<!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
						<a href="<?= base_url('logout') ?>" class="btn btn-default btn-flat float-end">Sign out</a>
					</li>
					<!--end::Menu Footer-->
				</ul>
			</li>
			<!--end::User Menu Dropdown-->
		</ul>
		<!--end::End Navbar Links-->
	</div>
	<!--end::Container-->
</nav>
