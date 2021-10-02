@extends('layouts.main')
@section('content')

<div class="container ">
<div class="row">
              <div class="col-lg-8 col-md-8 col-sm-4 offset-1">
                <div class="card shadow mt-4 mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary"> Course Provider's Detail </h6>
                    </div>
        
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <td> <b>Affiliate Code</b> </td>
                                <td>{{ $cp->code }}</td>
                            </tr>
                            <tr>
                                <td><b>Fullname</b></td>
                                <td>{{ $cp->full_name }}</td>
                            </tr>
                            <tr>
                                <?php $email = ""; ?>
                                @if (App\User::find($cp->user_id) != null)
                                <?php  $email = App\User::find($cp->user_id)->email;  ?>
                                @endif

                                <td><b>Email</b></td>
                                <td> {{ $email }}</td>
                            </tr>
                            <tr>
                                <td><b>Address</b></td>
                                <td>{{ $cp->address }}</td>
                            </tr>
                            <tr>
                                <td><b>Phone</b></td>
                                <td>{{ $cp->phone }}</td>
                            </tr>
                            <tr>
                                <td><b>Fax</b></td>
                                <td>{{ $cp->fax }}</td>
                            </tr>
                            <tr>
                                <td><b>Mobile</b></td>
                                <td>{{ $cp->mobile }}</td>
                            </tr>
                            <tr>
                                <td><b>City</b></td>
                                <td>{{ $cp->city }}</td>
                            </tr>
                            <tr>
                                <td><b>State</b></td>
                                <td>{{ $cp->state }}</td>
                            </tr>
                            <tr>
                                <td><b>Country</b></td>
                                <td>{{ $cp->country }}</td>
                            </tr>
                            <tr>
                                <td><b>Zip code</b></td>
                                <td>{{ $cp->zipcode }}</td>
                            </tr>
                            
                           
                          
                        </table>
                        <div class="form-group">
                            <a href="{{ url('course-provider') }}" class="btn btn-secondary">Go Back</a>
                        </div>
                    </div>
                  </div>
            </div> 
            
            
</div>
          @endsection

      
