@extends('buyer.layouts.main')
@section('content')

    <section class="content" style="margin: 25px; background: #ffffff;">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2>Quotation Request</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> {{ App\User::find(auth::id())->name }} </a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Request For Quotation</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row clearfix" >
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        @if (session('msg'))
                        <div class="alert alert-warning" role="alert">
                             <strong> {{ session('msg') }} </strong> 
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
                             </button>
                         </div>
                        @endif
                        <div class="card">
                            <div class="body" style="min-height: 1px">
                                <div class="row clearfix">
                                    <div class="col-sm-12">

                                        @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
    
                                        <form class="form-horizontal" action="{{ url('buyer/rfq') }}" method="POST">
                                            @csrf
                                           
                                            <fieldset>
                    
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="profileFirstName">Request</label>
                                                    <div class="col-md-8">
                                                       <textarea name="message" id=""  class="form-control" cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>
                    
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="profileAddress">City</label>
                                                    <div class="col-md-8">
                                                       <select name="city" id="">
                                                        <option value="" selected>Select City</option>
                                                        <option value="Islamabad/Rawalpindi">Islamabad/Rawalpindi</option>
                                                        <option value="Lahore">Lahore</option>
                                                        <option value="Karachi">Karachi</option>
                                                        <option value="Faisalabad">Faislabad</option>
                                                       </select>
                                                    </div>
                                                </div>
                    
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="profileAddress">Delievery</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="delievery" placeholder="1 week, 7 Day, 1 Month etc" id="profileAddress">
                                                    </div>
                                                </div>
                    
                                                
                                            </fieldset>
                                            <div class="row">
                                                <div class="col-md-8 offset-3">                    
                                                    <button type="submit" class="btn btn-block btn-primary">Submit</button>                
                                                </div>            
                                            </div>                    
                                        </form>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection