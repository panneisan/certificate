@extends('layouts.lite')
@section("title") Login @endsection
@section('head')
    <style>
        .login-content{
            background: white url('{{ asset('theme/images/welcome.jpg') }}');
            background-size: contain;
            background-position: left;
            background-repeat: no-repeat;
        }
        @media screen and (max-width: 420px){
            .login-content{
                background: white;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-8 m-auto">
                <div class="card login-content shadow animate__animated animate__zoomInDown">
                    <div class="card-content">
                        <div class="row ">
                            <div class="col-12 col-md-6">
                                <img src="" class="w-100" alt="">
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="p-4">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class="avatar shadow-sm border border-light mr-2" alt="">
                                        <p class="text-uppercase font-weight-bold text-primary mb-0">Admin Login</p>
                                    </div>
                                    <hr>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <h5>Login With Facebook</h5>


                                        <div class="form-group mb-0">
                                            <a href="{{url('auth/facebook')}}" class="btn btn-primary btn-rounded">
                                               <i class="feather-facebook"></i>
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
