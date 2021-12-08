@extends('admin.layouts.main')
@section('content')

<div class="container mt-4">
    <h1 class="h3 mb-4 text-gray-800" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Medical Uncle</h1>
    @if (session('msg'))
        <span class=" mt-2 alert alert-success"> {{ session('msg') }} </span>
    @endif
    <div class="card shadow mt-4 mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Blog</h6>
        </div>
        <div class="card-body">
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            
           <div class="row">
               <div class="col-md-12">
                <form action="{{ url('admin/blogs/add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for=""> Enter Title </label>
                        <div class="input-group">
                            <input type="text" name="title" required class="form-control" id="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for=""> Thumbnail </label>
                        <div class="input-group">
                            <input type="file" name="image" required class="form-control" id="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for=""> Excerpt </label>
                      
                            <textarea name="excerpt" rows="2"  class="form-control" required id="excerpt" cols="30" rows="10"></textarea>
                            <span style="float:right" id="charsLeft">150 chars left</span>
                        
                    </div>

                    <div class="form-group">
                        <label for=""> Description </label>
                        <div class="input-group">
                            <textarea name="description" class="form-control"  required id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>

                   
                    <div>
                        <button type="submit" class="btn btn-info btn-block">Add</button>
                    </div>
                </form> 
               </div>
           </div>
        </div>
    </div>
</div>

<script>

	const textarea = document.getElementById("excerpt");
	console.log(textarea);
	textarea.addEventListener("input", event => {
		const target = event.currentTarget;
		const maxLength = 150;
		const currentLength = target.value.length;
		const charsLeftSpan = document.querySelector('#charsLeft');
		if (currentLength >= maxLength) {
			textarea.addEventListener('keydown', function(e) {
				const key = e.key; 
				if (key === "Backspace" || key === "Delete") {
					textarea.readOnly = false;
				} 
			});
			charsLeftSpan.innerText =  `Its overup ${currentLength - maxLength} up`;
			textarea.readOnly = true;
		
		} else {
			charsLeftSpan.innerText =  `${maxLength - currentLength} chars left`;
		}
	});




	</script>

@endsection

      
