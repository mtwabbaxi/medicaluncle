@extends('buyer.layouts.main')
@section('content')

    <section class="content" style="margin: 25px; background: #ffffff;">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2>My Profile</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> {{ App\User::find(auth::id())->name }} </a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">My Profile</a></li>
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
    
                                        <form class="form-horizontal" action="{{ url('buyer/profile') }}" method="POST">
                                            @csrf
                                            <h4 class="mb-xlg">Personal Information</h4>
                                            <fieldset>
                    
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="profileFirstName">Name</label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="name" value="{{ $buyer->name }}" class="form-control" id="profileFirstName" >
                                                    </div>
                                                </div>
                    
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="profileAddress">Email</label>
                                                    <div class="col-md-8">
                                                        <input type="email" class="form-control" value="{{ $buyer->email }}" name="email"  id="profileAddress">
                                                    </div>
                                                </div>
                    
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="profileAddress">Contact No</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" value="{{ $buyer->phonenumber }}" name="phonenumber" id="profileAddress">
                                                    </div>
                                                </div>
                    
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="profileAddress">Gender</label>
                                                    <div class="col-md-8">
                                                        <select name="gender" id="" style="width: 100%">
                                                            <option value="male" {{ $buyer->gender == 'male'? 'selected' : '' }} >Male</option>
                                                            <option value="female" {{ $buyer->gender == 'female'? 'selected' : '' }}>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </fieldset>
                    
                                         
                                            <hr class="dotted tall">
                    
                                            <h4 class="mb-xlg">Change Password</h4>
                    
                                            <fieldset class="mb-xl">
                    
                                                <div class="form-group">
                    
                                                    <label class="col-md-3 control-label" for="profileNewPassword">New Password</label>
                    
                                                    <div class="col-md-8">
                    
                                                        <input type="password" name="password" class="form-control" id="profileNewPassword">
                    
                                                    </div>
                    
                                                </div>
                    
                                                <div class="form-group">
                    
                                                    <label class="col-md-3 control-label" for="profileNewPasswordRepeat">Repeat New Password</label>
                    
                                                    <div class="col-md-8">
                    
                                                        <input type="password" name="cpassword" class="form-control" id="profileNewPasswordRepeat">
                    
                                                    </div>
                    
                                                </div>
                    
                                            </fieldset>
        
                                            <div class="row">
                                                <div class="col-md-6 offset-3">                    
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