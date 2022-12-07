@extends('dashboards.admins.layouts.admin-dash-layout')
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
                        <p>Registered User</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon  fa-solid fa-user"></i>
                    </div>
                </div>
            </div>
            <div class=" col-md-4 p-1">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">


                        <p>Your Total Hours Today</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon  fa-sharp fa-solid fa-clock"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-1 ">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">

                        <p>Active Users</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon  fa-solid fa-clipboard-user"></i>
                    </div>
                </div>
            </div>

        </div>
       <div class="row">
           <div class="card col-md-8 offset-2">
               <div class="card-body">
                   <div class="active tab-pane" id="signin_out">

                   </div>
           </div>
       </div>
@endsection
