<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
 <a
   class="sidebar-brand d-flex align-items-center justify-content-center"
href="{{ url('/home') }}"
 >
   <div class="sidebar-brand-text mx-3"> Medical Uncle </div>
 </a>
 <hr class="sidebar-divider my-0" />


 <li class="nav-item active">
   <a class="nav-link" href="{{ url('/home') }}">
     <i class="fas fa-fw fa-tachometer-alt"></i>
     <span>Dashboard</span></a
   >
 </li>

 <hr class="sidebar-divider" />
 <div class="sidebar-heading">
   Works
 </div>


<li class="nav-item">
   <a class="nav-link" href=" {{ url('admin/sellers') }} ">
     <i class="fas fa-fw fa-user-plus"></i>
     <span>Sellers</span>
    </a>
</li>

<li class="nav-item">
  <a class="nav-link" href="{{ url('admin/products') }}">
    <i class="fas fa-fw fa-list"></i>
    <span>Products</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="{{ url('admin/catalogs') }}">
    <i class="fas fa-fw fa-book-open"></i>
    <span>Catalogs</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="{{ url('admin/buyers') }}">
    <i class="fas fa-fw fa-user-plus"></i>
    <span>Buyers</span></a
  >
</li>

<li class="nav-item">
  <a class="nav-link" href="{{ url('admin/orders') }}">
    <i class="fas fa-fw fa-chalkboard"></i>
    <span>Orders</span></a
  >
</li>

<li class="nav-item">
  <a class="nav-link" href="{{ url('admin/blogs') }}">
    <i class="fas fa-fw fa-blog"></i>
    <span>Blogs</span></a
  >
</li>

<li class="nav-item">
  <a class="nav-link" href="{{ url('admin/contacts') }}">
    <i class="fas fa-fw fa-address-book"></i>
    <span>Contacts</span></a
  >
</li>

</ul>
