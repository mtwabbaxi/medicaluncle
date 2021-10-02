@extends('layouts.main')
@section('content')

<div class="container mt-4">
    <h1 class="h3 mb-4 text-gray-800" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Course Provider</h1>
    @if (session('msg'))
        <span class=" mt-2 alert alert-success"> {{ session('msg') }} </span>
    @endif
    <div class="card shadow mt-4 mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Course Provider</h6>
        </div>
        <div class="card-body">
            
           <div class="row">
               <div class="col-md-12">
                <form action="{{ url('course-provider/add') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for=""> Affiliate Code </label>
                        <input type="text" name="code" required class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for=""> Full name </label>
                        <input type="text" name="full_name" required class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for=""> Email </label>
                        <input type="email" name="email" required class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for=""> Password </label>
                        <input type="password" name="password" required class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for=""> Institute name </label>
                        <input type="text" name="institute_name" required class="form-control" id="">
                    </div>
                   
                    <div class="form-group">
                        <label for=""> Address </label>
                        <input type="text" name="address" required class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for=""> Phone </label>
                        <input type="text" name="phone" required class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for=""> Fax </label>
                        <input type="text" name="fax" required class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for=""> Mobile </label>
                        <input type="text" name="mobile" required class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for=""> City </label>
                        <input type="text" name="city" required class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for=""> State </label>
                        <input type="text" name="state" required class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for=""> Country </label>
                        <input type="text" name="country" required class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for=""> Zipcode  </label>
                        <input type="text" name="zipcode" required class="form-control" id="">
                    </div>
                   
                    <div>
                        <button type="submit" class="btn btn-info btn-block">Submit</button>
                    </div>
                </form>
               </div>
           </div>
        </div>
    </div>
</div>

@endsection

      
