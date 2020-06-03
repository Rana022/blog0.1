<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					
					@if (Request::is('admin/*'))
							<ul class="nav nav-tabs nav-stacked main-menu">
								<li class="">
									<a href="{{route('home')}}"><i class="fa fa-home" aria-hidden="true"></i>
									<span class="hidden-tablet">Home</span></a>
								</li>
								<li class="">
								<a href="{{route('admin.dashboard')}}"><i class="icon-bar-chart"></i>
								<span class="hidden-tablet"> Dashboard</span></a>
							</li>

							<li class="{{Request::is('admin/post/*') ? 'active' : ''}}">
						<a href="{{route('admin.post.index')}}">
							<i class="fa fa-address-book" aria-hidden="true"></i>
								<span class="hidden-tablet"> Post</span></a>
							</li>
							<li class="{{Request::is('admin/post/pending') ? 'active' : ''}}">
								<a href="{{route('admin.post.pending')}}">
									<i class="fa fa-bell-slash" aria-hidden="true"></i>
										<span class="hidden-tablet"> Pending Post</span></a>
									</li>

						<li class="{{Request::is('admin/category/*') ? 'active' : ''}}">
						<a href="{{route('admin.category.index')}}">
							<i class="fa fa-window-restore" aria-hidden="true"></i>
								<span class="hidden-tablet"> Category</span></a>
							</li>

							<li class="{{Request::is('admin/tag/*') ? 'active' : ''}}">
						<a href="{{route('admin.tag.index')}}">
							<i class="fa fa-tags" aria-hidden="true"></i>
								<span class="hidden-tablet"> Tag</span></a>
							</li>

							<li class="{{Request::is('admin/users/*') ? 'active' : ''}}">
								<a href="{{route('admin.users')}}">
									<i class="fa fa-users" aria-hidden="true"></i>
										<span class="hidden-tablet"> Users</span></a>
									</li>

							<li class="{{Request::is('admin/profile/*') ? 'active' : ''}}">
						<a href="{{route('admin.profile')}}">
							<i class="fa fa-user" aria-hidden="true"></i>
								<span class="hidden-tablet"> Profile</span></a>
							</li>

							<li class="{{Request::is('admin/basic/*') ? 'active' : ''}}">
								<a href="{{route('admin.basic.index')}}">
									<i class="fa fa-question-circle" aria-hidden="true"></i>
										<span class="hidden-tablet"> Basic</span></a>
									</li>

						<li>
							<a href="{{ route('logout') }}" onclick="event.preventDefault();
						    document.getElementById('logout-form').submit();"
													 >
							<i class="icon-lock"></i>
							<span class="hidden-tablet"> Logout</span></a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                            </form>
						</li>
					</ul>
						@endif

						@if (Request::is('author/*'))
							<ul class="nav nav-tabs nav-stacked main-menu">
								<li class="">
									<a href="{{route('home')}}"><i class="fa fa-home" aria-hidden="true"></i>
									<span class="hidden-tablet">Home</span></a>
								</li>
								<li class="">
								<a href="{{route('author.dashboard')}}"><i class="icon-bar-chart"></i>
								<span class="hidden-tablet"> Dashboard</span></a>
							</li>

							<li class="{{Request::is('author/post/*') ? 'active' : ''}}">
						<a href="{{route('author.post.index')}}"><i class="fa fa-address-book" aria-hidden="true"></i>
								<span class="hidden-tablet"> Post</span></a>
							</li>

							<li class="{{Request::is('author/profile/*') ? 'active' : ''}}">
						<a href="{{route('author.profile')}}">
							<i class="fa fa-user" aria-hidden="true"></i>
								<span class="hidden-tablet"> Profile</span></a>
							</li>

						<li>
							<a href="{{ route('logout') }}" onclick="event.preventDefault();
						    document.getElementById('logout-form').submit();"
													 >
							<i class="icon-lock"></i>
							<span class="hidden-tablet"> Logout</span></a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                            </form>
						</li>
					</ul>
						@endif
						
				</div>
			</div>