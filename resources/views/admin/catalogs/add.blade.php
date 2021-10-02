@extends('admin.layouts.main')
@section('content')
<div class="container mt-4">
    <h1 class="h3 mb-4 text-gray-800" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Catalogs</h1>
    @if (session('msg'))
        <span class=" mt-2 alert alert-success"> {{ session('msg') }} </span>
    @endif
    <div class="card shadow mt-4 mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Catalog</h6>
        </div>
        <div class="card-body">
            
           <div class="row">
            <div class="col-md-12">
                <form action="{{ url('seller/catalogs/add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name<span class="required">*</span></label> 
                        <div class="col-md-12">           
                        <input type="text" name="name" class="form-control" required placeholder="Type Name" required/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Category</label>
                        <div class="col-md-12">
                            <select name="category_id" class="form-control">
                                <option selected> Select Category </option> 
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->name }} </option> 
                                @endforeach                              
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Excerpt<span class="required">*</span></label>
                        <div class="col-sm-12">
                            <textarea  rows="3" id="excerpt" name="excerpt" class="form-control" required placeholder="About Catalog" required></textarea>
                            <span style="float:right" id="charsLeft">100 chars left</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Image<span class="required">*</span></label>
                        <div class="col-sm-12">
                            <input type="file" name="image" class="form-control"   required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">PDF<span class="required">*</span></label>
                        <div class="col-sm-12">
                            <input type="file" name="pdf" class="form-control"  required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12 col-sm-offset-3">
                            <button type="submit" class="btn btn-success  btn-block" name="submit"> Submit </button>
                            <button type="reset" class="btn btn-danger  btn-block" name="reset">Reset</button>
                        </div>
                    </div>

                </form>
               </div>
           </div>
        </div>
    </div>
</div>
@endsection