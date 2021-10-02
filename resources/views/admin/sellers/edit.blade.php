@extends('layouts.main')
@section('content')

<div class="container mt-4">
    <h1 class="h3 mb-4 text-gray-800" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Certificates</h1>
    @if (session('msg'))
        <span class=" mt-2 alert alert-success"> {{ session('msg') }} </span>
    @endif
    <div class="card shadow mt-4 mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Certificate</h6>
        </div>
        <div class="card-body">
            
           <div class="row">
               <div class="col-md-12">
                <form action="{{ url('certificates/'.$certificate->id.'/edit') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for=""> Certificate # </label>
                        <input type="text" name="certificate_no" value={{ $certificate->certificate_no }} required class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for=""> Enrollment # </label>
                        <input type="text" name="registration_no" value={{ $certificate->registration_no }} required class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for=""> Graduation Date  </label>
                        <input type="date" name="graduation_date" value={{ $certificate->graduation_date }} required class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for=""> Status  </label>
                        <select name="status"  class="form-control">
                            @if ($certificate->status == "1")
                                <option value="1" selected>Active</option>
                                <option value="0">InActive</option>
                            @else
                                <option value="1">Active</option>
                                <option value="0" selected>InActive</option>
                            @endif
                          
                        </select>
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

      
