@extends('layouts.main')
@section('content')

<div class="container ">
<div class="row">
              <div class="col-lg-8 col-md-8 col-sm-4 offset-1">
                <div class="card shadow mt-4 mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary"> Student's Detail </h6>
                    </div>
        
                    <div class="card-body">
                        <table class="table table-striped">
                           
                            <tr>
                                <td>Registration #</td>
                                <td>{{  $student->registration_no  }}</td>
                            </tr>
                            <tr>
                                <td>Full Name</td>
                                <td>{{ $student->full_name  }}</td>
                            </tr>
                            <tr>
                                <td>Date of Birth</td>
                                <td>{{ $student->dob_day  }}</td>
                            </tr>
                            <tr>
                                <td>Nationality</td>
                                <td> {{ $student->nationality   }}</td>
                            </tr>
                            <tr>
                                <td>Program</td>
                                <td> {{ $student->program_id   }}</td>
                            </tr>
                            <tr>
                                <td>Major</td>
                                <td> {{ $student->enrolment_major  }}</td>
                            </tr>
                            <tr>
                                <td>Duration</td>
                                <td> {{ $student->registration_duration   }}</td>
                            </tr>
                            <tr>
                                <td>Location</td>
                                <td> {{ $student->registration_location  }}</td>
                            </tr>
                            <tr>
                                <td>Enrollment Date</td>
                                <td> {{ $student->enrolment_date  }}</td>
                            </tr>
                            <tr>
                                <td>Completion Date</td>
                                <td> {{ $student->completion_date  }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td> {{ $student->status == 1 ? 'Paid' : 'Unpaid'   }}</td>
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

      
