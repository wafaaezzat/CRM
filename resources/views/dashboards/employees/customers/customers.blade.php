@extends('dashboards.employees.layouts.employee-dash-layout')
@section('title','My Customers')

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
        <div class="col-md-3 mb-3 p-3">
            <a href="{{ route('employee.createCustomer') }}"  style="text-decoration: none;color: #1a174d;font-size: 25px" class="btn bg-secondary">Add New Customer</a>
        </div>
        <table class="table table-bordered data-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Role</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
                <th>Add Action</th>
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
                    <td>
                        @foreach($customer->actions as $action)
                            <a href="{{route('action.result',$action->pivot->id)}}" class="btn bg-secondary">
                            {{$action->name}}
                            <a>
                        @endforeach

                    </td>
                    <td>
                        <a href="{{ route('add.action',$customer->id)}}" class="btn btn-secondary"><i class="fa-solid fa-plus"></i></a>
                    </td>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
