<header class="header">
	<div class="logo-container">
		<a href="{{ url('buyer/dashboard') }}" class="logo">
			<img src="{{ url('nassets/images/logo.png') }}" height="35" alt="Medical Uncle" />
		</a>

		<div class="headersubmitlink">
			<a href="{{ url('buyer/track-order') }}">Track your Order</a>
			<a href="{{ url('buyer/b2bproducts') }}">B2B Products</a>
		</div>
		

		<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
			<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
		</div>
	</div>

	<div class="header-right">
		<div class="headersubmitlink" >
			<a href="{{ url('buyer/cart') }}" style='color:white; cursor: pointer;'> 
				<i class="fa fa-shopping-cart"> 
					Cart 
				</i>
			
				
					<span class="badge badge-warning" style="font-size:15px;padding:15px">
						<?php $cart = App\Cart::where('user_id',Auth::id())->first(); ?>
						@if ($cart != null)
						{{ App\Cart_Product::where('cart_id',$cart->id)->count() }}
						@else
							0
						@endif
						
					</span>
				
			</a>
		</div>
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
					<li> <a role="menuitem" tabindex="-1" tabindex="-1" href="{{ url('buyer/profile') }}"><i class="fa fa-user"></i> My Profile</a> </li>
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