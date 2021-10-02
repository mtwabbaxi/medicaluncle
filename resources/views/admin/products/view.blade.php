@extends('layouts.main')
@section('content')

<div class="container ">
<div class="row">
              <div class="col-lg-8 col-md-8 col-sm-4 offset-1">
                <div class="card shadow mt-4 mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary"> Program's Detail </h6>
                    </div>
        
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <td> <b>Program Name</b> </td>
                                <td>{{ $program->program_name }}</td>
                            </tr>
                            <tr>
                                <td><b>Major</b></td>
                                <td>{{ $program->major }}</td>
                            </tr>
                            <tr>
                                <td><b>Credit Hours</b></td>
                                <td> {{ $program->credit_hours }}</td>
                            </tr>
                            <tr>
                                <td><b>Duration</b></td>
                                <td>{{ $program->duration }}</td>
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

      
