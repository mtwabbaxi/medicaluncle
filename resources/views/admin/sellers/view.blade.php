@extends('layouts.main')
@section('content')

<div class="container ">
<div class="row">
              <div class="col-lg-8 col-md-8 col-sm-4 offset-1">
                <div class="card shadow mt-4 mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary"> Certificate's Detail </h6>
                    </div>
        
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <td> <b>Certificate #</b> </td>
                                <td>{{ $certificate->certificate_no }}</td>
                            </tr>
                            <tr>
                                <td><b>Enrollment #</b></td>
                                <td>{{ $certificate->registration_no }}</td>
                            </tr>
                            <tr>
                                <td><b>Student Name</b></td>
                                <?php $user = App\Student::where('registration_no',$certificate->registration_no)->first(); ?>
                                @if ($user != null)
                                    <td> {{ $user->full_name }}</td>
                                @else
                                    <td> </td>
                                @endif
                                
                            </tr>
                            <tr>
                                <td><b>Graduation Date</b></td>
                                <td>{{ $certificate->graduation_date }}</td>
                            </tr>
                            <tr>
                                <td><b>Status</b></td>
                                <td>{{ $certificate->status }}</td>
                            </tr>
                           
                          
                        </table>
                        <div class="form-group">
                            <a href="{{ url('programs') }}" class="btn btn-secondary">Go Back</a>
                        </div>
                    </div>
                  </div>
            </div> 
            
            
</div>
          @endsection

      
