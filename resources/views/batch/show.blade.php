@extends('layouts.app')

@section('content')
        <div class="row justify-content-start">
            <div class="col-12">
                <div class="pb-3">
                    <a class="text-uppercase" href="{{ route('home') }}"><i class="feather-home"></i></a>
                    <span class="mx-2"><i class="fas fa-angle-right"></i></span>
                    <a class="text-uppercase" href="{{ route('batch.index') }}">Batch List</a>
                    <span class="mx-2"><i class="fas fa-angle-right"></i></span>
                    <span class="text-uppercase">Batch Detail</span>
                </div>
            </div>
            <div class="col-12 col-xl-5">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="mb-0 text-uppercase font-weight-bold">
                                <i class="feather-gift text-primary"></i>
                                Batch Detail
                            </h4>
                            <div class="">
                                <a href="{{ route('batch.index') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="feather-list fa-fw"></i>
                                </a>
                                <a href="{{ route('batch.create') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="feather-plus-circle fa-fw"></i>
                                </a>
                                <a href="{{ route('batch.create') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="feather-edit fa-fw"></i>
                                </a>
                            </div>
                        </div>
                        <hr>
                        @foreach($batch as $b)
                        <h5 class="font-weight-bold mb-0">
                            {{ $b->title }}
                        </h5>
                        <hr>
                        <small class="text-black-50 font-weight-bold">

                            <i class="feather-calendar text-primary"></i>
                            <b>From - </b>
                            {{ $b->start_date }}
                            <i class="feather-chevron-right text-primary"></i> <b>To - </b>
                            {{ $b->end_date }}
                        </small>
                        <hr>
                        <h4 class="font-weight-bold mb-0">
                            {{ $b->course_id }}
                        </h4>
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
@endsection
