@extends('dashboards.admins.layouts.admin-dash-layout')

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
        <div class="col-lg-3 col-md-3 ">
            <!-- small box -->
            <div class="small-box bg-secondary p-4 m-2">
                <div class="inner">
                    <a href="{{ route('add.user') }}"  style="text-decoration: none;color: #1a174d;font-size: 25px">Add New User</a>
                </div>
                <div class="icon">
                    <i class="nav-icon fa-sharp fa-solid fa-user"></i>
                </div>
            </div>
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
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->address }}</td>
                    <td>
                        <a href="{{ route('edit.user',$user->id)}}" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    <td>
                        <form action="{{ route('delete.user', $user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="fa-sharp fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links("pagination::bootstrap-5") }}
    </div>
@endsection
