@extends('dashboards.employees.layouts.employee-dash-layout')
@section('title','Home')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-secondary alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            <strong>Success !</strong> {{ session('success') }}
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            <strong>Error !</strong> {{ session('error') }}
        </div>
    @endif
    <div class="p-2 m-2">
        <div class="row">
            <div class="col-md-4 p-1 ">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{$customers}}</h3>
                        <p>Customers</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon  fa-solid fa-user"></i>
                    </div>
                </div>
            </div>
        </div>
@endsection
