  <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
                    @can('admin')

                    <li><a href="/dashboard/admin/" aria-expanded="false">
							<i class="fas fa-home"></i>
							<span class="nav-text">Beranda  </span>
						</a>


                    </li>
                    <li><a href="/dashboard/admin/users" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <span class="nav-text">Pengguna</span>
                    </a>
                    <li><a href="/dashboard/admin/honor" aria-expanded="false">
                        <i class="fas fa-hand-holding-usd"></i>
                        <span class="nav-text">Honor</span>
                    </a>
                    <li><a href="/dashboard/admin/divisions" aria-expanded="false">
                        <i class="fas fa-clone"></i>
                        <span class="nav-text">Bagian</span>
                    </a>
                    <li><a href="/dashboard/admin/categories" aria-expanded="false">
                        <i class="fas fa-table"></i>
                        <span class="nav-text">Kategori</span>
                    </a>
                    <li><a href="/dashboard/admin/feedback" aria-expanded="false">
                        <i class="fas fa-heart"></i>
                        <span class="nav-text">Feedback</span>
                    </a>
                    </li>
                    @endcan
                    @can('dosen')
                    <li><a href="/dashboard/dosen/" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <span class="nav-text">Beranda  </span>
                    </a>


                </li>
                    @endcan



                </ul>

			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
