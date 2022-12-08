@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Customers')

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

    <div class="container">
        <table class="table table-bordered data-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Role</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Employee</th>
                <th>Assign to Employee</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name}}</td>
                    <td>{{ $customer->role->name}}</td>
                    <td>{{ $customer->email}}</td>
                    <td>{{ $customer->phone}}</td>
                    <td>{{ $customer->address}}</td>
                    @if(isset($customer->parent))
                    <td>{{ $customer->parent->name}}</td>
                    @else
                        <td>
                            <p style="color: red;font-weight: bold">Not assigned yet</p>
                        </td>
                    @endif
                    <td>
                        <a href="{{ route('assign.customer',$customer->id)}}" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
            @endforeach
            </tbody>
        </table>
{{--        {{ $customers->links("pagination::bootstrap-5") }}--}}
    </div>
@endsection
