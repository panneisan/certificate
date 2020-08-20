@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Please Enter Your Phone Number</h3>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{route('phone.store')}}">
                            <div class="form-group">
                                <input type="text" name="phone" id="phone" class="form-control">
                            </div>
                            <button class="btn btn-primary">Add Number</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
