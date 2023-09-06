@extends('layout\template') 

@section('title', 'Student edit | School')

@section('content')

<main>
  <div class="container py-4">
    <h2>Student edit</h2>
    @if($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form action="{{ url('students/'.$student->id)}}" method="post">
      @method("PUT")
      @csrf
      <div class="mb-3 row">
        <label for="enrollment" class="col-sm-2 col-form-label">Enrollment:</label>
        <div class="col-sm-5">
          <input type="text"
            class="form-control"
            name="enrollment"
            id="enrollment"
            value="{{$student->enrollment}}" required>
        </div>
      </div>

      <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Full name:</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="name" id="name" value="{{$student->name}}" required>
        </div>
      </div>

      <div class="mb-3 row">
        <label for="birthday" class="col-sm-2 col-form-label">Birthday:</label>
        <div class="col-sm-5">
          <input type="date" class="form-control" name="birthday" id="birthday" value="{{$student->birthday}}" required>
        </div>
      </div>

      <div class="mb-3 row">
        <label for="phone" class="col-sm-2 col-form-label">Phone number:</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="phone" id="phone" value="{{$student->phone}}" required>
        </div>
      </div>

      <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email:</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="email" id="email" value="{{$student->email}}">
        </div>
      </div>

      <div class="mb-3 row">
        <label for="level" class="col-sm-2 col-form-label">Level:</label>
        <div class="col-sm-5">
          <select name="level" id="level" class="form-select" required>
            <option value="">Select a level</option>
            @foreach($levels as $level)
            <option value="{{$level->id}}" @if($level->id == $student->level_id){{'selected'}} @endif>{{$level->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <a href="{{url('students')}}" class="btn btn-secondary">Come back</a>
      <button type="submit" class="btn btn-success">Save</button>
    </form>
  </div>
</main>