@extends('layout\template')

@section('title', 'Students | School')

@section('content')

<main>
  <div class="container py-4">
    <h2>Students list</h2>
    <a href="{{ url('students/create')}}" class="btn btn-primary btn-sm">Add student</a>
  </div>
</main>
