@extends('layouts.app')

@section('content')
   <div class="row">
       <div class="container-fluid">
           <div class="row">
               <div class="col-12">
                   <nav aria-label="breadcrumb">
                       <ol class="breadcrumb bg-white">
                           <li class="breadcrumb-item"><a href="">Home</a></li>
                           <li class="breadcrumb-item"><a href="{{route('course.index')}}">Courses</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Add-course</li>
                       </ol>
                   </nav>
               </div>
               <div class="col-md-8">
                   <div class="card">

                       <div class="card-body">
                           <div class="d-flex justify-content-between align-items-center">
                               <h3><i class="feather-plus-circle"></i>Add Course</h3>
                               <a href="{{route('course.index')}}" class="btn btn-outline-primary">
                                   <i class="feather-list"></i>
                               </a>
                           </div>
                           <hr>
                           @if (session('status'))
                               <div class="alert alert-success" role="alert">
                                   {{ session('status') }}
                               </div>
                           @endif
                           <form action="{{ route('course.store') }}" method="post" enctype="multipart/form-data">
                               @csrf
                               <div class="form-row">
                                   <div class="col-7">
                                       <label for="title">Enter Course Title</label>
                                       <input type="text" class="form-control" name="title" id="title">
                                   </div>
                                   <div class="col-5">
                                       <label for="photo">Upload Photo</label>
                                       <input type="file" class="form-control py-1" name="photo" id="photo">
                                   </div>
                               </div>
                               <div class="form-group">
                                   <label for="outline">Course Outlines</label>
                                   <textarea id="outline" name="outline" class="form-control"></textarea>
                               </div>
                               <button class="btn btn-primary">
                                   <i class="feather-plus-square"></i>
                                   Add Course
                               </button>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection
@section('foot')
    <script>
        $(document).ready(function() {
            $('#outline').summernote();
        });
    </script>
@stop

