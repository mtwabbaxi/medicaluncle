@extends('layouts.main')
@section('content')

<div class="container mt-4">
    <h1 class="h3 mb-4 text-gray-800" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Course Provider</h1>
    @if (session('msg'))
        <span class=" mt-2 alert alert-success"> {{ session('msg') }} </span>
    @endif
    <div class="card shadow mt-4 mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Course Provider</h6>
        </div>
        <div class="card-body">
            
           <div class="row">
               <div class="col-md-12">
                <form action="{{ url('course-provider/'.$cp->id.'/edit') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for=""> Affiliate Code </label>
                        <input type="text" name="code" value={{ $cp->code }} required class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for=""> Full name </label>
                        <input type="text" name="full_name" value={{ $cp->full_name }} required class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for=""> Email </label>
                        <?php $email = ""; ?>
                        @if (App\User::find($cp->user_id) != null)
                          <?php  $email = App\User::find($cp->user_id)->email;  ?>
                        @endif
                        <input type="email" name="email" value={{ $email  }} required class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for=""> Password <span class="text-danger">(Leave empty if you want to keep old password)</span> </label>
                        <input type="email" name="password"  class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for=""> Institute name </label>
                        <input type="text" name="institute_name" value={{ $cp->institute_name }} required class="form-control" id="">
                    </div>
                   
                    <div class="form-group">
                        <label for=""> Address </label>
                        <textarea name="address" id="" cols="30" rows="5"  class="form-control" required>{{ $cp->address }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for=""> Phone </label>
                        <input type="text" name="phone" value={{ $cp->phone }}  class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for=""> Fax </label>
                        <input type="text" name="fax" value={{ $cp->fax }}  class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for=""> Mobile </label>
                        <input type="text" name="mobile" value={{ $cp->mobile }}  class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for=""> City </label>
                        <input type="text" name="city" value={{ $cp->city }}  class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for=""> State </label>
                        <input type="text" name="state" value={{ $cp->state }}  class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for=""> Country </label>
                        <input type="text" name="country" value={{ $cp->country }} required class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for=""> Zipcode  </label>
                        <input type="text" name="zipcode" value={{ $cp->zipcode }} required class="form-control" id="">
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

      
