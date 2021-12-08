@extends('layouts.app')


@section('content')
<h1>Department</h1>

<form action="/department" method="POST">
    @csrf
    <label for="">Department Name</label>
    <input type="text" name="dept_name">
    <button class="btn btn-success">Save</button>
</form>

<table class="table mt-5">
    <thead>
        <tr>
            <th>ID</th>
            <th>Department Name</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($departments as $department)
        <tr>
           
            <td>{{$department->id}}</td>
            <td>{{$department->department_name}}</td>

            <!-- Delete FOrm -->
            <td>
                <form action="/department/{{$department->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
           
        </tr>
        @endforeach
    </tbody>
</table>
@endsection