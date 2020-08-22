@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('course.index')}}">Add-course</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Course--List</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                           <h3>Show Details</h3>
                            <button class="btn mr-2" id="info"><i class="feather-info"></i></button>

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
                $("#infoModal").modal('show');
            });
        });
    </script>
@stop


<!-- Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
