@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
</head>
<body>
  <form action="{{ route('courses.update', $course->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Nom:</label>
        <br>
        <input type="text"  autocomplete="off" class="form-control  " id="name" name="name" value="{{ old('name', $course->name) }}" required>

        <label for="end_date">Description:</label><br>
        <input type="text"  autocomplete="off" class="form-control "   id="description" name="description" value="{{ old('description', $course->description)  }} " >
        @error('name')
            <div class="invalid-feedback">le cours est déjà exists</div>
        @enderror
    </div>
  <br>
    <button type="submit" class="btn btn-primary">Sauvegarder
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
      <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>

    </svg>
  </button>
    <br><br>
    <div>
      <svg style="color:rgb(6, 79, 121)" xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">                 <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>             
        </svg>
      <a href="{{ route('students.index') }}">Retour aux étudiants</a>
      </div>
  </form>
  
@endsection
</body>
</html>
