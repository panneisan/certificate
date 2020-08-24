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
                            <li class="breadcrumb-item active" aria-current="page">Course-Edit</li>
                        </ol>
                    </nav>
                </div>
                <div class="co-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3>Course-Edit</h3>
                            @if(session('status'))
                                <div class="alert alert-success">
                                    {{session('status') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{route("course.update",$info->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="form-group">
                                    <div class="form-inline d-flex justify-content-between align-items-end">
                                        <div class="position-relative">
                                            <button type="button" class="btn btn-light position-absolute edit-photo" style="bottom: 5px;right: 15px">
                                                <i class="fas fa-edit text-primary"></i>
                                            </button>
                                            <img src="{{ asset($info->photo) }}" style="height: 200px" class="mr-2 rounded current-img" alt="">
                                        </div>
                                        <input type="file" name="photo"  id="file-upload" accept="image/png,image/jpeg" onchange='openFile(event)' class="form-control d-none flex-grow-1 p-1 mr-2">
                                    </div>
                                </div>
                                    <br>
                                    <div class="form-group mt-2">
                                        <label for="title">Enter Course Title</label>
                                        <input type="text" class="form-control  p-1" name="title" id="title" value="{{$info->title}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="outline">Course Outlines</label>
                                        <textarea id="outline" name="outline" class="form-control">{!! $info->outline !!}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-outline-primary"><i class="fa fa-edit"></i>Update Info</button>
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

        $(".edit-photo").click(function () {
            $("#file-upload").click();
        });

        var openFile = function(event) {
            var input = event.target;

            var reader = new FileReader();
            reader.onload = function(){
                var dataURL = reader.result;
                var output = $(".current-img");
                output.attr("src",dataURL);
            };
            reader.readAsDataURL(input.files[0]);
        };
        $(document).ready(function() {
            $('#outline').summernote();
        });

    </script>


@stop



