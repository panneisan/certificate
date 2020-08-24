@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="pb-3">
                <a class="text-uppercase" href="{{ route('home') }}"><i class="feather-home"></i></a>
                <span class="mx-2"><i class="fas fa-angle-right"></i></span>
                <a class="text-uppercase" href="{{ route('batch.index') }}">Batch List</a>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0 text-uppercase font-weight-bold">
                            <i class="feather-shopping-bag text-primary"></i>
                            Batch List
                        </h5>
                        <div class="">
                            <button class="btn btn-outline-secondary btn-sm btn-maximize" title="Maximize">
                                <i class="fas fa-expand-alt fa-fw"></i>
                            </button>
                        </div>
                    </div>
                    <hr>
                    <table class="table text-center table-hover  table-responsive-xl mb-0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Course Name</th>
                            <th>Fees</th>
                            <th>Duration</th>
                            <th>Time</th>
                            <th>Control</th>
                            <th>Created</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach($batch as $i)

                            <tr>
                                <td>{{ $i->id }}</td>

                                <td>
                                    <div class="d-flex align-items-center no-warp">
                                        <span>{{ $i->title }}</span>
                                    </div>
                                </td>
                                <td>
                                    {{ $i->course_id }}
                                </td>
                                <td>
                                    {{ $i->fees }} MMK
                                </td>
                                <td>
                                    {{ $i->start_date }} <i class="feather-chevron-right text-primary"></i>  {{ $i->end_date }}
                                </td>
                                <td>
                                     {{date('h:i A', strtotime($i->start_time))}} <i class="feather-chevron-right"></i>  {{date('h:i A', strtotime($i->end_time))}}
                                </td>
                                <td class="no-warp">
                                    <a href="{{ route('batch.edit',$i->id) }}" class="btn btn-sm btn-outline-success no-warp">
                                        <i class="feather-edit"></i> Edit
                                    </a>
                                        <form action="{{ route('batch.destroy',$i->id) }}" class="d-inline" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button href="" class="btn btn-sm btn-outline-danger no-warp">
                                                <i class="feather-trash-2"></i> Delete
                                            </button>
                                        </form>
                                </td>
                                <td class="no-warp">{{ $i->created_at->diffforhumans()  }}</td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    @include('layouts.toast')
@endsection
@section('foot')
    <script>
        $(".table").dataTable({
            responsive:true,
            sort:false,
        });

        $(".menu-btn").click(function () {
            $('.dropdown-toggle').dropdown();
        });

    </script>
@endsection

