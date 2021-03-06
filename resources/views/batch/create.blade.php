@extends('layouts.app')

@section('content')
        <div class="row justify-content-start">
            <div class="col-12">
                <div class="pb-3">
                    <a class="text-uppercase" href="{{ route('home') }}"><i class="feather-home"></i></a>
                    <span class="mx-2"><i class="fas fa-angle-right"></i></span>
                    <a class="text-uppercase" href="{{ route('batch.index') }}">Batch List</a>
                    <span class="mx-2"><i class="fas fa-angle-right"></i></span>
                    <span class="text-uppercase">Add Batch</span>
                </div>
            </div>
            <div class="col-12 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0 text-uppercase font-weight-bold">
                                <i class="feather-plus-circle text-primary"></i>
                                Add Batch
                            </h5>
                            <div class="">
                                <a href="{{ route('batch.index') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="feather-list fa-fw"></i>
                                </a>
                            </div>
                        </div>
                        <hr>
                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        <form action="{{ route('batch.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}" placeholder="Title">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="start_date">Stat Date</label>
                                    <input type="date" class="form-control" name="start_date" id="start" min="{{ date("Y-m-d") }}" value="{{ old('start_date') }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="end_date">End Date</label>
                                    <input type="date" class="form-control" name="end_date" id="end" value="{{ old('end_date') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="c_outline">Course Outline</label>
                                <select class="custom-select" name="course_id">
                                    <option>Select Course Outline</option>
                                    @foreach($courseList as $cl)
                                        <option value="{{$cl->id}}" {{old("course_id")==$cl->id ?"selected" :""}}>{{$cl->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="start_time">Start Time</label>
                                    <input type="time" class="form-control" name="start_time" id="start" value="{{ old('start_time') }}" required>
                                </div>

                                <div class="form-group col-6">
                                    <label for="end_time">End Time</label>
                                    <input type="time" class="form-control" name="end_time" id="end" value="{{ old('end_time') }}" required>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fees">Fees</label>
                                <input type="text" class="form-control" name="fees" id="fees" value="{{old('fees')}}" placeholder="fees">
                            </div>
                            <button type="submit" class="btn btn-primary">Add Batch</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="card mb-3">
                    <div class="card-body">
                        @foreach($batch as $b)
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0 text-uppercase font-weight-bold">
                                <i class="feather-gift text-primary"></i>
                                Last Record
                            </h5>
                            <div class="">
                                <a href="{{ route('batch.edit',$b->id) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="feather-edit fa-fw"></i>
                                </a>
                            </div>
                        </div>
                        <hr>
                            <h6 class="font-weight-bold mb-0">
                                {{ $b->title }}
                            </h6>
                            <hr>
                            <small class="text-black-50 font-weight-bold">

                                <i class="feather-calendar text-primary"></i>
                                <b>From - </b>
                                {{ $b->start_date }}
                                <i class="feather-chevron-right text-primary"></i> <b>To - </b>
                                {{ $b->end_date }}
                            </small>
                            <hr>
                            <h6 class="font-weight-bold mb-0">
                                {{ $b->course_id }}
                            </h6>
                            <hr>
                            <small class="text-black-50 font-weight-bold">
                                <i class="feather-calendar text-primary"></i> <b>From - </b>
                                {{date('h:i A', strtotime($b->start_time))}}
                                <i class="feather-chevron-right text-primary"></i> <b>To - </b>
                                {{date('h:i A', strtotime($b->end_time))}}
                            </small>
                            <hr>
                            <p class="mb-0 mt-3 text-secondary">
                                {{ $b->fees }} MMK
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        @include('layouts.toast')
@endsection
@section('foot')
    <script>
        $("#start").on("change",function () {
            $("#end").attr("min",$(this).val());
        });
    </script>
@endsection
