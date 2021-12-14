@extends('seller.layouts.main')
@section('content')

<div class="row" style="margin-top: 25px">
	<div class="col-lg-12 col-md-12 col-sm-6">
		<div class="row">

            <div class="col-md-4 col-lg-4 col-xl-4">
				<section class="panel panel-featured-left panel-featured-success">
					<div class="panel-body">
						<div class="widget-summary">
							<div class="widget-summary-col">
								<div class="summary">
									<center>
										<h4 class="title">Today Earnings </h4>
										<div class="info">
											<strong class="amount"> Rs. {{ $today_earning }}  </strong>
										</div>
									</center>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>

            <div class="col-md-4 col-lg-4 col-xl-4">
				<section class="panel panel-featured-left panel-featured-success">
					<div class="panel-body">
						<div class="widget-summary">
							<div class="widget-summary-col">
								<div class="summary">
									<center>
										<h4 class="title">{{ date('F') }} Earnings</h4>
										<div class="info">
											<strong class="amount"> Rs. {{ $monthly_earning }} </strong>
										</div>
									</center>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>


			<div class="col-md-4 col-lg-4 col-xl-4">
				<section class="panel panel-featured-left panel-featured-secondary mt-2">
					<div class="panel-body">
						<div class="widget-summary">
							<div class="widget-summary-col">
								<div class="summary">
									<center>
										<h4 class="title">Total Earnings</h4>
										<div class="info">
											<strong class="amount"> Rs. {{ $total_earning }} </strong>
										</div>
									</center>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>

<div class="row" >
    @foreach ($products as $product)
        <div class="col-md-4 col-lg-3 col-sm-6">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <a href="{{ url('seller/products/'.$product->id) }}">
                        <h5 class="card-title" style="min-height: 30px;font-weight:bold"> {{ $product->name }} </h5>
                    </a>
                    <h6 class="card-text" style="font-style: italic; font-size:10px;min-height: 30px;">{{ App\Category::find($product->category_id)->name }}</h6>
                    <p class="card-text" style="height: 40px;">{{ substr($product->excerpt, 0, 100) }} </p>
                    <a href="{{ url('seller/analytics/product/'.$product->id) }}" class="btn btn-success btn-block"> 
                        <i class="fa fa-eye" aria-hidden="true"></i>&nbsp; View Analytics</a>
                </div>
            </div>
        </div>
    @endforeach
</div> 

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Total Sales</div>
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
                        <div class="panel-heading">Total Sales</div>
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

