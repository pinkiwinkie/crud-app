@extends('layout\template')

@section('title', 'Students | School')

@section('content')

<main>
  <div class="container py-4">
    <h2>Students list</h2>
    <a href="{{ url('students/create')}}" class="btn btn-primary btn-sm">Add student</a>

    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Enrollment</th>
          <th>Name</th>
          <th>Birthday</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Level</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($students as $student)
        <tr>
          <td>{{ $student->id }}</td>
          <td>{{ $student->enrollment }}</td>
          <td>{{ $student->name }}</td>
          <td>{{ $student->birthday }}</td>
          <td>{{ $student->phone }}</td>
          <td>{{ $student->email }}</td>
          <td>{{ $student->level->name }}</td>
          <td><a href="{{ url('students/'.$student->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a></td>
          <td></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</main>
