@extends('seller.layouts.main')
@section('content')

<section class="content" style="margin: 25px; background: #ffffff;">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add Notification</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> {{ App\User::find(auth::id())->name }} </a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Add Notification</a></li>
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

									<form action="{{ url('seller/notifications/add') }}" method="post" enctype="multipart/form-data">
										@csrf
										
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Name<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="title" class="form-control" required placeholder="Type Title" required/>
                                            </div>
                                        </div>
                                       
                                        
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Description<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <textarea  rows="3" id="excerpt" name="description" class="form-control" required placeholder="About Notification" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Image<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="file" name="image" class="form-control"   required/>
                                            </div>
                                        </div>
                                        
                    
                                        <div class="form-group">
                                            <div class="col-sm-9 col-sm-offset-3">
                                                <button type="submit" class="btn btn-success" name="submit"> Submit </button>
                                                <button type="reset" class="btn btn-danger" name="reset">Reset</button>
                                            </div>
                                        </div>


									</form>
                                </div> 
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


	

@endsection