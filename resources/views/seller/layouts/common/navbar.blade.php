<div class="topnavcustommbl" style="padding-bottom: 0px; !important">
    <ul class="topnavul">
        <li><a href="{{ url('seller/dashboard') }}">Dashboard</a></li>
        <li><a href="{{ url('seller/products') }}">Products </a></li>
        <li><a href="{{ url('seller/catalogs') }}">Catalogs</a></li>
        <li><a href="{{ url('seller/pending-orders') }}">Pending Orders <span class="badge badge-warning"> {{  App\Order::where('seller_id',Auth::id())->where('status','OrderPlaced')->count() }} </span> </a></li>
        <li><a href="{{ url('seller/complete-orders') }}">Completed Orders <span class="badge badge-warning"> {{  App\Order::where('seller_id',Auth::id())->where('status','Completed')->count() }} </span> </a></li>
        <li><a href="{{ url('seller/buyer-requests') }}">Buyers Requests</a></li>
        <li><a href="{{ url('seller/history') }}">History</a></li>
    </ul>
</div>