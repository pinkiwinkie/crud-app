@extends('layout\template')

@section('title', 'Student register | School')

@section('content')

<main>
  <div class="container py-4">
    <h2>{{$msg}}</h2>
    <a href="{{url('students')}}" class="btn btn-secondary">Come back</a>
  </div>  
</main>  