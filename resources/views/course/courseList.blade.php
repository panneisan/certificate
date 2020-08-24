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
                                    <button class="btn btn-outline-secondary btn-sm btn-maximize" title="Maximize">
                                        <i class="fas fa-expand-alt fa-fw"></i>
                                    </button>
                                </div>

                            </div>
                            <hr>
                            @include('layouts.toast')
                            <table class="table text-center table-hover table-bordered table-responsive-xl mb-0" id="data_table">
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
                                    <tr class="">
                                        <td>{{$l->id}}</td>
                                        <td>{{$l->title}}</td>
                                        <td><img src="{{asset($l->photo)}}" alt="" class="img-thumbnails rounded rounded-circle" style="width: 50px;height: 50px"></td>
                                        <td>{!! $l->outline !!}</td>

                                        <td class="d-flex no-warp justify-content-around">
                                            <a href="{{route('course.edit',$l->id)}}" class="btn btn-outline-warning mr-2 no-warp"><i class="feather-edit"></i></a>
                                            <form action="{{route('course.destroy',$l->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger no-warp" onclick="confirm('Do You Really want to delete?')"><i class="feather-delete"></i></button>
                                            </form>
                                        </td>
                                        <td>{{ $l->created_at->diffforhumans()  }}</td>

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

        $(".table").dataTable({
            responsive:true,
            sort:false,
        });
    </script>
@stop



