@extends('dashboards.employees.layouts.employee-dash-layout')
@section('title','Add Actions')
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Action') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('store.action',$customer->id) }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="text-center">
                                    <select class="form-select form-select-lg @error('action_id') is-invalid @enderror " name="action_id" id="action_id">
                                        <option disabled selected>Actions</option>
                                        @foreach($actions as $action)
                                            <option value="{{$action->id}}">
                                                {{$action->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div>
                                        @error('action_id')
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
