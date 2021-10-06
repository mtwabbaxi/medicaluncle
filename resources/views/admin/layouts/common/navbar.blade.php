<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
 <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
   <i class="fa fa-bars"></i>
 </button>

 <span class="mr-2 d-none d-lg-inline ml-auto display-5 btn btn-block btn-secondary"> {{ App\User::find(Auth::id())->name }} 
  <svg viewBox="0 0 24 24" aria-label="Verified account" style="max-width: 20px;max-height: 20px;color: white;fill:white">
  <g>
    <path d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z"></path>
    </g>
  </svg>
</span>
 <a class="mr-2 d-none d-lg-inline ml-auto btn bg-gradient-primary text-white " style="text-decoration: none" href="#" data-toggle="modal" data-target="#logoutModal">
    Logout
</a>
<a class="mr-2 d-none d-lg-inline btn bg-gradient-primary text-white " style="text-decoration: none" href="{{ url('admin/profile') }}">
 Profile
</a>

</nav>






<!-- Logout Modal-->
<div
class="modal fade"
id="logoutModal"
tabindex="-1"
role="dialog"
aria-labelledby="exampleModalLabel"
aria-hidden="true"
>
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
      <button
        class="close"
        type="button"
        data-dismiss="modal"
        aria-label="Close"
      >
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">
      Select "Logout" below if you are ready to end your current session.
    </div>
    <div class="modal-footer">
      <button
        class="btn btn-secondary"
        type="button"
        data-dismiss="modal"
      >
        Cancel
      </button>
      <form action="{{ url('logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary" >Logout</button>
      </form>
    </div>
  </div>
</div>
</div>