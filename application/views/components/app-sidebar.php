 <?php $uri = $this->uri->segment(1); ?>
 <!--begin::Sidebar-->
 <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
	<!--begin::Sidebar Brand-->
	<div class="sidebar-brand">
		<!--begin::Brand Link-->
		<a href="<?= base_url() ?>" class="brand-link">
			<!--begin::Brand Image-->
			<!-- <img src="../../dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"> -->
			<!--end::Brand Image-->
			<!--begin::Brand Text-->
			<span class="brand-text fw-bolder"><?= APPNAME ?></span>
			<!--end::Brand Text-->
		</a>
		<!--end::Brand Link-->
	</div>
	<!--end::Sidebar Brand-->
	<!--begin::Sidebar Wrapper-->
	<div class="sidebar-wrapper">
		<nav class="mt-2">
			<!--begin::Sidebar Menu-->
			<ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="<?= base_url() ?>" class="nav-link <?= $uri==='' ? 'active' : '' ?>">
						<i class="nav-icon bi bi-speedometer"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<!-- <li class="nav-header">Management Arsip</li>
				<li class="nav-item">
					<a href="#" class="nav-link <?= $uri==='arsip' ? 'active' : '' ?>">
						<i class="nav-icon bi bi-clipboard-fill"></i>
						<p>
							Arsip Surat
							<i class="nav-arrow bi bi-chevron-right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('arsip/form') ?>" class="nav-link">
								<i class="nav-icon bi bi-circle"></i>
								<p>Form Input Arsip</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('arsip') ?>" class="nav-link">
								<i class="nav-icon bi bi-circle"></i>
								<p>Arsip Surat Tersimpan</p>
							</a>
						</li>
					</ul>
				</li> -->
				<li class="nav-header">Management Surat</li>
				<li class="nav-item">
					<a href="#" class="nav-link <?= $uri==='surat_masuk' ? 'active' : '' ?>">
					<i class="nav-icon bi bi-download"></i>
						<p>
							Surat Masuk
							<!-- <span class="nav-badge badge text-bg-secondary me-3">6</span> -->
							<i class="nav-arrow bi bi-chevron-right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('surat_masuk/form') ?>" class="nav-link">
								<i class="nav-icon bi bi-circle"></i>
								<p>Form Input Surat Masuk</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('surat_masuk') ?>" class="nav-link">
								<i class="nav-icon bi bi-circle"></i>
								<p>Daftar Surat Masuk</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link <?= $uri==='surat_keluar' ? 'active' : '' ?>">
					<i class="nav-icon bi bi-upload"></i>
						<p>
							Surat Keluar
							<i class="nav-arrow bi bi-chevron-right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('surat_keluar/form') ?>" class="nav-link">
								<i class="nav-icon bi bi-circle"></i>
								<p>Form Input Surat Keluar</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('surat_keluar') ?>" class="nav-link">
								<i class="nav-icon bi bi-circle"></i>
								<p>Daftar Surat Keluar</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-header">Disposisi & Sirkulasi <span class="nav-badge badge text-bg-warning me-3">Under Maintenance</span></li>
				<li class="nav-item">
					<a href="#" class="nav-link <?= $uri==='disposisi' ? 'active' : '' ?>">
						<i class="nav-icon bi bi-share"></i>
						<p>
							Disposisi Surat
							<i class="nav-arrow bi bi-chevron-right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('disposisi/analytic') ?>" class="nav-link">
								<i class="nav-icon bi bi-circle"></i>
								<p>Analytic Sirkulasi</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('disposisi') ?>" class="nav-link">
								<i class="nav-icon bi bi-circle"></i>
								<p>Daftar Disposisi</p>
							</a>
						</li>
					</ul>
				</li>
				
				
				<li class="nav-header">Settings & Templating</li>
				<li class="nav-item">
					<a href="<?= base_url('settings') ?>" class="nav-link <?= $uri==='settings' ? 'active' : '' ?>">
						<i class="nav-icon bi bi-gear"></i>
						<p>Setting</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('templating') ?>" class="nav-link <?= $uri==='templating' ? 'active' : '' ?>">
						<i class="nav-icon bi bi-journal"></i>
						<p>Template Surat Keluar</p>
					</a>
				</li>
				
			</ul>
			<!--end::Sidebar Menu-->
		</nav>
	</div>
	<!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
