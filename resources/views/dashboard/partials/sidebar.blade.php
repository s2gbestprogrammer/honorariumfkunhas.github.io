  <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
                    @can('super-admin')
                    <li><a href="{{route('dashboard.admin')}}" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <span class="nav-text">Beranda  </span>
                    </a>


                </li>
                <li><a href="{{route('users.index')}}" aria-expanded="false">
                    <i class="fas fa-users"></i>
                    <span class="nav-text">Pengguna</span>
                </a>
                </li>
                <li><a href="{{route('honor.index')}}" aria-expanded="false">
                    <i class="fas fa-hand-holding-usd"></i>
                    <span class="nav-text">Honor</span>
                </a>
                <li><a href="{{route('divisions.index')}}" aria-expanded="false">
                    <i class="fas fa-clone"></i>
                    <span class="nav-text">Bagian</span>
                </a>
                <li><a href="{{route('categories.index')}}" aria-expanded="false">
                    <i class="fas fa-table"></i>
                    <span class="nav-text">Kategori</span>
                </a>
                <li><a href="{{route('adminfeedback.index')}}" aria-expanded="false">
                    <i class="fas fa-heart"></i>
                    <span class="nav-text">Feedback</span>
                </a>
                </li>
                @endcan

                    @can('admin')

                    <li><a href="{{route('dashboard.admin')}}" aria-expanded="false">
							<i class="fas fa-home"></i>
							<span class="nav-text">Beranda  </span>
						</a>


                    </li>
                    <li><a href="{{route('users.index')}}" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <span class="nav-text">Pengguna</span>
                    </a>
                    </li>
                    <li><a href="{{route('honor.index')}}" aria-expanded="false">
                        <i class="fas fa-hand-holding-usd"></i>
                        <span class="nav-text">Honor</span>
                    </a>
                    <li><a href="{{route('divisions.index')}}" aria-expanded="false">
                        <i class="fas fa-clone"></i>
                        <span class="nav-text">Bagian</span>
                    </a>
                    <li><a href="{{route('categories.index')}}" aria-expanded="false">
                        <i class="fas fa-table"></i>
                        <span class="nav-text">Kategori</span>
                    </a>
                    <li><a href="{{route('adminfeedback.index')}}" aria-expanded="false">
                        <i class="fas fa-heart"></i>
                        <span class="nav-text">Feedback</span>
                    </a>
                    </li>
                    @endcan
                    @can('dosen')
                    <li><a href="{{route('dashboard.dosen')}}" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <span class="nav-text">Beranda  </span>
                    </a>
                    </li>
                    <li><a href="{{route('feedback.index')}}" aria-expanded="false">
                        <i class="fas fa-heart"></i>
                        <span class="nav-text">Feedback</span>
                    </a>
                    </li>
                    <li><a href="{{route('dosen.honor.get', auth()->user()->id)}}" aria-expanded="false">
                        <i class="fas fa-hand-holding-usd"></i>
                        <span class="nav-text">Honor</span>
                    </a>
                    </li>

                    @endcan



                </ul>

			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
