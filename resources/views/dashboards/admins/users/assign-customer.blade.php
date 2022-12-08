@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Edit User')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Assign Customer') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('assign.customerParent',$customer->id) }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="text-center">
                                    <select class="form-select form-select-lg @error('employee_id') is-invalid @enderror " name="employee_id" id="employee_id">
                                        <option disabled selected>Employees</option>
                                        @foreach($employees as $employee)
                                            <option value="{{$employee->id}}">
                                                {{$employee->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div>
                                        @error('employee_id')
                                        <span class="text-danger error-text">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-5">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
