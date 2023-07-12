@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Ajouter un étudiant </h1>
    @if ($errors->any())
    <div>
    </div>
    @endif
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nom Complet:</label>
            <input maxlength="35" pattern="[a-zA-Z\s]+" type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" >
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror

        </div>
        <div class="form-group">
            <label for="phone">Téléphone :</label>
            <input type="text" maxlength="13"   class="form-control"  @error('phone') is-invalid @enderror  id="phone" name="phone" value="{{ old('phone') }}" >
            @error('phone')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Email :</label>
            <input type="email"  placeholder="email"  @error('email') is-invalid @enderror class="form-control" id="email" name="email" value="{{ old('email') }}" >
            @error('email')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div >
            <div class="form-group">
            <label for="phone">Sexe :</label>
             <select name="gender"class="form-control" id="gender">
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>
         </select>
            @error('gender')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">

            <label for="course_id">Cours:</label>
            <select class="form-select" id="course_id" name="course_id">
                @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Ajouter</button>
        <br><br>
        <svg style="color:rgb(6, 79, 121)" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
            class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
        </svg>
        <a href="{{route('students.index')}}">Retour à Étudiants</a>
    </form>
</div>
@endsection