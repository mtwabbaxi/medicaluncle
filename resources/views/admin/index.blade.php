@extends('admin.layouts.main')
@section('content')

<div class="row">

  <div class="col-xl-12 col-md-12 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div
              class="text-center display-6 font-weight-bold text-primary text-uppercase mb-1"
            >
              Total Earnings
            </div>
            <div
              class="h5 mb-0 text-center display-4 font-weight-bold text-gray-800"
            >
          Rs. {{ $total_earning }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">

  <div class="col-xl-3 col-md-3 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div
              class="text-center display-6 font-weight-bold text-primary text-uppercase mb-1"
            >
            <a href="{{ url('admin/sellers') }}"> Total Sellers</a>
              
            </div>
            <div
              class="h5 mb-0 text-center display-4 font-weight-bold text-gray-800"
            >
           {{ App\User::where('role','seller')->count() }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-3 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div
              class="text-center display-5 font-weight-bold text-primary text-uppercase mb-1"
            >
            <a href="{{ url('admin/buyers') }}"> Total Buyers</a>
              
            </div>
            <div
              class="h5 mb-0 text-center display-4 font-weight-bold text-gray-800"
            >
            {{ App\User::where('role','customer')->count() }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-award fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-3 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div
              class="text-center display-5 font-weight-bold text-warning text-uppercase mb-1"
            >
            <a href="{{ url('admin/products') }}">  Total Products</a>
             
            </div>
            <div
              class="h5 mb-0 text-center display-4 font-weight-bold text-gray-800"
            >
            {{ App\Product::count() }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-book-open fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-3 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div
              class="text-center display-5 font-weight-bold text-warning text-uppercase mb-1"
            >
            <a href="{{ url('admin/products/category') }}">   Total Product Categories</a>
             
            </div>
            <div
              class="h5 mb-0 text-center display-4 font-weight-bold text-gray-800"
            >
            {{ App\Category::count() }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-book-open fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-3 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div
              class="text-center display-5 font-weight-bold text-primary text-uppercase mb-1"
            >
              Total Orders
            </div>
            <div
              class="h5 mb-0 text-center display-4 font-weight-bold text-gray-800"
            >
            {{ App\Order::count() }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-chalkboard fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-3 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div
              class="text-center display-5 font-weight-bold text-primary text-uppercase mb-1"
            >
             <a href="{{ url('admin/orders/pending') }}"> Pending Orders</a>
            </div>
            <div
              class="h5 mb-0 text-center display-4 font-weight-bold text-gray-800"
            >
            {{ App\Order::where('status','OrderPlaced')->count() }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-chalkboard fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-3 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div
              class="text-center display-5 font-weight-bold text-primary text-uppercase mb-1"
            >
            <a href="{{ url('admin/orders/complete') }}">  Completed Orders</a>
             
            </div>
            <div
              class="h5 mb-0 text-center display-4 font-weight-bold text-gray-800"
            >
            {{ App\Order::where('status','Completed')->count() }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-chalkboard fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-3 mb-4">
    <div class="card border-left-secondary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div
              class="text-center display-5 font-weight-bold text-secondary text-uppercase mb-1"
            >
            <a href="{{ url('admin/catalogs') }}">     Total Catalogs</a>
            
            </div>
            <div
              class="h5 mb-0 text-center display-4 font-weight-bold text-gray-800"
            >
            {{ App\Catalog::count() }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-chalkboard fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="panel panel-default">
                      <h2 class="panel-heading"><b>Monthly Sales</b></h2> <br>
                      <div class="panel-body">
                          {!! $sales->html() !!}
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div> 


<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="panel panel-default">
                      <h2 class="panel-heading"><b>Product Sales</b></h2><br>
                      <div class="panel-body">
                          {!! $psales->html() !!}
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>



{!! Charts::scripts() !!}
{!! $sales->script() !!}
{!! $psales->script() !!}



@endsection
        
            
          

      

   
    


  
  
