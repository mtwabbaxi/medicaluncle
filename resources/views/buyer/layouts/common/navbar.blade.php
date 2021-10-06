<div class="topnavcustommbl" style="padding-bottom: 0px; !important">
    <ul class="topnavul">
        <li><a href="{{ url('buyer/dashboard') }}">Dashboard</a></li>
        <li><a href="{{ url('buyer/products') }}">Products </a></li>
        <li><a href="{{ url('buyer/catalogs') }}">Catalogs</a></li>
        <li><a href="{{ url('buyer/vendors-lists') }}">Vendor Lists</a></li>
        <li>
            <a href="{{ url('buyer/pending-orders') }}">
                Pending Orders
                <span class="badge badge-warning"> 
                   <?php $count = App\Order::where('buyer_id',Auth::id())->where('status','OrderPlaced')->count() ; ?> 
                   @if ($count > 0)
                       new
                   @endif
                </span>
            </a>
        </li>
        <li>
            <a href="{{ url('buyer/completed-orders') }}">
                Completed Orders
                <span class="badge badge-warning"> 
                    {{  App\Order::where('buyer_id',Auth::id())->where('status','Completed')->distinct('order_no')->count() }} 
                </span> 
            </a>
        </li>
        <li><a href="{{ url('buyer/dashboard') }}">RFQ</a></li>
        <li><a href="{{ url('buyer/dashboard') }}">Vendor Requests</a></li>
        <li><a href="{{ url('buyer/dashboard') }}">History</a></li>
    </ul>
</div>