@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Create Role')

@section('content')
    <div class="active tab-pane" id="personal_info">
        <form class="form-horizontal" method="POST" action="{{ route('create.role') }}">
            @csrf
            <div class="form-group row">
                <label for="role_name" class="col-sm-2 col-form-label">Role Name</label>
                <div class="col-sm-4">
                    <input type="text"  id="role_name"  placeholder="Role Name" class="form-control @error('role_name') is-invalid @enderror" name="role_name">
                    @error('role_name')
                    <span class="text-danger error-text">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-secondary">Add Role</button>
                </div>
            </div>
        </form>
    </div>

@endsection


