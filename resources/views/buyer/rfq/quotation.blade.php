@extends('buyer.layouts.main')
@section('content')
<div style="margin-bottom: 40px">
    <center><h1 class="h3 mb-2 text-gray-800 display-5" style="font-weight: bold;">
        {{ $seller->name }} 's Quotation 
    </h1> </center>
    <hr>
</div>

<center>
    <div class="container mb-4">
        <div class="row">
                <div class="col-md-3">Seller Name:</div>
                <div class="col-md-3">Email</div>
                <div class="col-md-3">Request No</div>
                <div class="col-md-3">City</div>
                
                
        </div>
        <div class="row">
                <div class="col-md-3"><b>{{ $seller->name }}</b></div>
                <div class="col-md-3"><b>{{ $seller->email }}</b></div>
                <div class="col-md-3"><b>{{ $rfq->rfq_no }}</b></div>
                <div class="col-md-3"><b>{{ $rfq->city }}</b></div>
        </div>


    </div>
</center>

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Quoted Products</h6>
</div>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Sr.#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach ($products as $product)
                <?php $prod = App\Product::find($product->product_id);  ?>
                <?php $i++; ?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td><img src="{{ url('storage/'.$prod->image) }}" width="50" height="50" alt=""></td>
                        <td>{{ $prod->name }}</td>
                        <td>{{ App\Category::find($prod->category_id)->name }}</td>
                        <td>{{ $product->product_price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($bid->status == 0)
    <div class="col-xl-12 col-md-12 col-sm-12" style="margin-top: 40px ">
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label for="">Comment/Message (Optional)</label>
                <textarea name="comment" id="" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="">Delivery</label>
                <input type="date" class="form-control" name="delivery" required id="">
            </div>
            <div class="form-group">
               <button class="btn btn-success btn-block"  onclick="return confirm('Are you sure you want to submit?');" > Submit Response</button>
            </div>
        </form>
    </div>
    @endif
</div>

@endsection