@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Roles')

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
            <a href="{{ route('add.role') }}"  style="text-decoration: none;color: #1a174d;font-size: 25px" class="btn bg-secondary">Add Role</a>
        </div>
        <table class="table table-bordered data-table">
            <thead>
            <tr>
                @foreach($roles as $role)
                <th>
                    <div class="row mt-3">
                        <div>
                        {{$role->name}}
                        </div>
                        <div style="display: flex" class="offset-3">
                        <a href="{{ route('edit.role',$role->id)}}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('delete.role', $role->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                        </div>
                    </div>
                </th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach($roles as $role)
                    <td>
                        <ul>
                        @foreach($role->users as $user)
                            <li>{{ $user->name}}</li>
                        @endforeach
                        </ul>
                    </td>
                @endforeach
            </tr>
            </tbody>
        </table>
    </div>
@endsection


