<header class="header">
	<div class="logo-container">
		<a href="{{ url('seller/dashboard') }}" class="logo">
			<img src="{{ url('nassets/images/logo.png') }}" height="35" alt="Medical Uncle" />
		</a>
		<div class="headersubmitlink">
			<a href="{{ url('seller/products/used') }}">Post Used Product</a>
			<a href="{{ url('seller/products/inventory') }}">Manage Inventory</a>
		</div>

		<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
			<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
		</div>
	</div>

	<div class="header-right">
		<div id="userbox" class="userbox">
			<a href="#" data-toggle="dropdown">
				<figure class="profile-picture">
						<img class="img-circle" src="{{ url('assets/images/userimg.png') }}" /> 
				</figure>

				<div class="profile-info" >
					<span class="name"> {{ App\User::find(auth::id())->name }} </span>
					<span class="role">{{ App\User::find(auth::id())->role }}</span>  
				</div>

				<i class="fa custom-caret"></i>
			</a>

			<div class="dropdown-menu">
				<ul class="list-unstyled">
					<li class="divider"></li>
					<li> <a role="menuitem" tabindex="-1" tabindex="-1" href="{{ url('seller/profile') }}"><i class="fa fa-user"></i> My Profile</a> </li>
					<li> 
						<a role="menuitem" tabindex="-1" tabindex="-1" href="{{ route('logout') }}"
							onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									  <i class="fa fa-power-off"></i> 
									  Logout
						</a> 

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</li>
				</ul>
			</div>
		</div>
	</div>
</header>


                                                   