@extends('layouts.app')
@section('content')
<h1>Modifier un Etudiant</h1>
<form action="{{ route('students.update', $student->id) }}" method="post">
  @csrf
  @method('put')
  <label>Nom Complet</label>
  @error('error')
  <div class="invalid-feedback">{{ $message }}</div>
  @enderror
  <input autocomplete="off" class="form-control" type="text" name="name" value="{{ $student->name }}" required>
  <label for="phone">Téléphone</label>
  <input autocomplete="off" maxlength="13"  class="form-control"  type="tel" @error('phone') is-invalid @enderror     name="phone"value="{{ ($student->phone) }}" required>
  @error('phone')

  <div class="invalid-feedback">cete numéro de Téléphone déjà exists</div>
  @enderror

  <div class="form-group">
    <label for="email">{{ __('Email') }}</label>
    <input id="email" type="email" class="form-control" @error('email') is-invalid @enderror name="email" value="{{ ($student->email) }}" required autocomplete="email">

    @error('email')

  <div class="invalid-feedback"> Cet email déjà exists</div> @enderror

</div>

<div class="form-group">
    <label for="gender">{{ __('Sexe') }}</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="gender"  value="Homme" {{ $gender == 'Homme' ? 'checked' : '' }}>
        <label class="form-check-label" for="Homme">
            {{ __('Homme') }}
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="gender"  value="Femme" {{ $gender == 'Femme' ? 'checked' : '' }}>
        <label class="form-check-label" for="Femme">
            {{ __('Femme') }}

        </label>
    </div>

    @error('gender')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

  <div class="form-group">
    <label for="course">Course:</label>
    <select name="course_id" class="form-select">

      @foreach($courses as $course)


      <option value="{{ $course->id }}" @if($student->course_id == $course->id) selected @endif>
        {{ $course->name }}
      </option>

      @endforeach
    </select>
  </div>
  <br>
  <button class="btn btn-primary" type="submit">Sauvegarder les modifications
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save"
      viewBox="0 0 16 16">
      <path
        d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z" />

    </svg>



  </button><br>
  <br>
  <div>
    <svg style="color:rgb(6, 79, 121)" xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor"
      class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
      <path fill-rule="evenodd"
        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
    </svg>
    <a href="{{ route('students.index') }}">
      Retour aux étudiants</a>
  </div>
</form>
@endsection