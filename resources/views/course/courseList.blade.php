@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('course.create')}}">Add-course</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Course--List</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3> <i class="feather-plus-circle"></i>
                                    Course List</h3>
                                <div class="">
                                    <a href="" class="btn btn-outline-primary maximize-btn"><i class="feather-maximize-2"></i></a>
                                    <a href="{{route('course.create')}}" class="btn btn-outline-primary">
                                        <i class="feather-plus-square"></i>
                                    </a>
                                </div>

                            </div>
                            <hr>
                            @if(session('status'))
                                <div class="alert alert-success">
                                    {{session('status') }}
                                </div>
                            @endif
                            <table class="table table-striped" id="data_table">
                                <thead>
                                <tr class="text-center">
                                    <th>id</th>
                                    <th>Title</th>
                                    <th>Photo</th>
                                    <th>Course Outline</th>
                                    <th>Controls</th>
                                    <th>Created_at</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list as $l)
                                    <tr class="text-center">
                                        <td>{{$l->id}}</td>
                                        <td>{{$l->title}}</td>
                                        <td><img src="{{asset($l->photo)}}" alt="" class="img-thumbnails rounded rounded-circle" style="width: 50px;height: 50px"></td>
                                        <td>{!! $l->outline !!}</td>

                                        <td class="d-flex">
                                            <a href="{{route('course.edit',$l->id)}}" class="btn mr-2"><i class="feather-edit"></i></a>
                                            <button class="btn mr-2" id="info"><i class="feather-info"></i></button>
                                            <form action="{{route('course.destroy',$l->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn" onclick="confirm('Do You Really want to delete?')"><i class="feather-delete"></i></button>
                                            </form>
                                        </td>
                                        <td>{{$l->created_at}}</td>


{{--                                        modal--}}
                                    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Course Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="">
                                                            <img src="{{$l->photo}}" alt="" class="card-img-top w-100">
                                                    </div>
                                                    <hr>
                                                    <div>
                                                        <h4>Course Title</h4>
                                                        <span>{{$l->title}}</span>
                                                    </div>
                                                    <br>

                                                    <div>
                                                        <h4>Course Outline</h4>
                                                        <span>{!! $l->outline !!}</span>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                                </tbody>
                            </table>

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
            $('#info').click(function () {
                $("#infoModal").modal();
            });
        });
        $(".maximize-btn").click(function(e){
            e.preventDefault();
            let current = $(this).closest(".card")
            current.toggleClass("full-screen-card");
            if(current.hasClass("full-screen-card")){
                $(this).html(`<i class="feather-maximize-2"></i>`);
            }else{
                $(this).html(`<i class="feather-maximize-2"></i>`);

            }
        });
    </script>
@stop



