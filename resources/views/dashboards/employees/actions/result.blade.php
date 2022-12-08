@extends('dashboards.employees.layouts.employee-dash-layout')
@section('title','Action Result')

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
                <th>Result</th>

            </tr>
            </thead>
            <tbody>
            <td>{{$action->id}}</td>
            <td>{{\App\Models\Action::find($action->action_id)->name}}</td>
            @if($action->result)
                <td>{{$action->result}}</td>
            @else
                <td>
                    <form action="{{route('add.result',$action->id)}}" method="POST">
                        @csrf
                        <label for="result">Add action result</label>
                        <textarea class="form-control" id="result" name="result" rows="3"></textarea>
                        <button type="submit" class="btn btn-secondary">Submit</button>
                    </form>
                </td>
            @endif
            </tbody>
        </table>
    </div>
@endsection
