@extends('admin.layouts.main')
@section('content')

          <h1 class="h3 mb-2 text-gray-800">Blogs</h1>
          <div class="card shadow mb-4">
            @if (session('msg'))
            <span class=" mt-2 alert alert-danger"> {{ session('msg') }} </span>
             @endif
              <div class="card-header py-3">
                <a href="{{ url('admin/blogs/add') }}" class="btn btn-primary" style="float:right"> Add Blog </a>
              <h6 class="m-0 font-weight-bold text-primary">All Blogs</h6>
            </div>

            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Thumbnail</th>
                      <th>Title</th>
                      <th>Excerpt</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; ?>
                  @foreach ($blogs as $blog)
                  <?php $i++; ?>
                  <tr>
                      <td>{{ $i }}</td>
                      <td><img src="{{ url('storage/'.$blog->image) }}" height="50" width="50" alt=""></td>
                      <td>{{ $blog->title }}</td>
                      <td>{{ $blog->excerpt }}</td>
                      <td>
                        <a href="{{ url('admin/blogs/delete/'.$blog->id) }}" class="btn btn-danger">Delete</a>
                      </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          @endsection