					<ul class="nav nav-list">
						<li>
							<a href="#">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> {{ Lang::get('navigation.admin.dashboard') }} </span>
							</a>
						</li>

						<li class="pages_menu">
							<a href="#" class="dropdown-toggle">
								<i class="icon-edit"></i>
								<span class="menu-text"> {{ Lang::get('navigation.pages') }} </span>
							</a>
							<ul class="submenu">
								<li class="pages_menu_create">
									<a href="/admin/pages/create">
										<i class="icon-double-angle-right"></i>
										Create New
									</a>
								</li>

								<li class="pages_menu_all">
									<a href="/admin/pages">
										<i class="icon-double-angle-right"></i>
										Show All
									</a>
								</li>
							</ul>
						</li>

						<li class="companies_menu">
							<a href="#" class="dropdown-toggle">
								<i class="icon-globe"></i>
								<span class="menu-text"> Companies </span>
							</a>
							<ul class="submenu">
								<li class="companies_menu_create">
									<a href="/admin/companies/create">
										<i class="icon-double-angle-right"></i>
										Add New
									</a>
								</li>

								<li class="companies_menu_all">
									<a href="/admin/companies">
										<i class="icon-double-angle-right"></i>
										Show All
									</a>
								</li>
							</ul>
						</li>
						<li class="tags_menu">
							<a href="#" class="dropdown-toggle">
								<i class="icon-tags"></i>
								<span class="menu-text"> Tags </span>
							</a>
							<ul class="submenu">
								<li class="tags_menu_create">
									<a href="/admin/tags/create">
										<i class="icon-double-angle-right"></i>
										Add New
									</a>
								</li>

								<li class="tags_menu_all">
									<a href="/admin/tags">
										<i class="icon-double-angle-right"></i>
										Show All
									</a>
								</li>
							</ul>
						</li>
						<li class="menu_menu">
							<a href="#" class="dropdown-toggle">
								<i class="icon-list"></i>
								<span class="menu-text"> Menu </span>
							</a>
							<ul class="submenu">
								<li class="menu_menu_create">
									<a href="/admin/menu/create">
										<i class="icon-double-angle-right"></i>
										Add New
									</a>
								</li>

								<li class="menu_menu_all">
									<a href="/admin/menu">
										<i class="icon-double-angle-right"></i>
										Show All
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.nav-list -->