@extends('layouts.main')
@section('content')

<div class="container mt-4">
   
    <div class="card shadow mt-4 mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Program</h6>
        </div>
        <div class="card-body">
            
           <div class="row">
               <div class="col-md-6 offset-3">
                <form action="{{ url('programs/'.$program->id.'/edit') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for=""> Project name </label>
                        <input type="text" name="program_name" value={{$program->program_name}} required class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for=""> Major </label>
                        <input type="text" name="major" value={{$program->major}} required class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for=""> Credit Hours  </label>
                        <input type="text" name="credit_hours" value={{$program->credit_hours}} required class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for=""> Duration  </label>
                        <input type="text" name="duration" value={{$program->duration}} required class="form-control" id="">
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

      
