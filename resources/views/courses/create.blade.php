@extends('layouts.app')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
       {{ session('success') }}
    </div>
@endif

<div class="container">
<br>
   </div>
<form action="{{ route('courses.store') }}" method="post">
  @csrf
  <h1>Ajouter Un Cours</h1>
  <br>
  <label>Nom de Cours</label>
  <input type="text" class="form-control" autocomplete="off"  value="{{ old('name') }}"  name="name" >
@error('name')
<div class="alert alert-danger">{{$message}}</div>
@enderror
    <label>Description </label>
    <input placeholder="optional" class="form-control" type="text" name="description" id="description">


<br>
  <button  class="btn btn-primary" type="submit">Ajouter</button>
  <br>
  <div>
    <br>
    <svg style="color:rgb(6, 79, 121)" xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>             
      </svg>
    <a href="{{ route('students.index') }}">Retour aux Cours</a>
    </div>
</div>


























@endsection