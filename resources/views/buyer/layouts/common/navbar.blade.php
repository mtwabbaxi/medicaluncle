<div class="topnavcustommbl" style="padding-bottom: 0px; !important">
    <ul class="topnavul">
        <li><a href="{{ url('buyer/dashboard') }}">Dashboard</a></li>
        <li><a href="{{ url('buyer/products') }}">Products </a></li>
        <li><a href="{{ url('buyer/catalogs') }}">Catalogs</a></li>
        <li><a href="{{ url('buyer/vendors-lists') }}">Vendor Lists</a></li>
        <li>
            <a href="{{ url('buyer/pending-orders') }}">
                Pending Orders
               
                   <?php $count = App\Order::where('buyer_id',Auth::id())->where('status','OrderPlaced')->select('order_no')->distinct()->count() ; ?> 
                   
                   <span class="badge badge-warning"> {{$count}}</span>
                  
                
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
        <li><a href="{{ url('buyer/rfq') }}">RFQ</a></li>
        <li><a href="{{ url('buyer/vendor-requests') }}">Vendor Requests</a></li>
        <li><a href="{{ url('buyer/notifications') }}">Notifications</a></li>
    </ul>
</div>