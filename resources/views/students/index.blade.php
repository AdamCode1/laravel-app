

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <h1>Etudiants</h1>

                    @if(request()->is('students'))
                    <div>Le total des Étudiants est :<strong>{{ $students->total() }}</strong></div>
                    @endif
                </div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <a class="btn btn-success" href="{{ route('students.create') }}">Ajouter Étudiants</a>
                        </div>

                        <div class="col">
                                <div class="input-group">
                                    <input type="text" placeholder="Recherche ..." name="name" id="name" class="form-control" autocomplete="off">
                                    
                                </div>
                            </form>
                        </div>
                    </div>

                    @if (isset($students) && count($students) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                              @if(!$students->isEmpty())
                                <th>Nom Complet</th>
                                <th>Email</th>
                                <th>Cours</th>
                                <th>Sexe</th>
                                <th>Actions</th>
                              
                                @endif
                            </tr>
                        </thead>
                        <tbody id="students_list">
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->course->name  }}</td>
                                    <td>{{ $student->gender }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('students.show', $student->id) }}">Détails</a>
                                        <a class="btn btn-primary" href="{{ route('students.edit', $student->id) }}">Modifier</a>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="post" style="display:inline-block;">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce cours ?')">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @elseif (isset($students) && count($students) == 0 )
                    <h6 style="text-align: center;margin-top:30px;">Aucun  Étudiant</h6>
                @endif
                
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
      $('#name').on('keyup',function () {
          var query = $(this).val();
          $.ajax({
              url:'{{ route('students.search') }}',
              type:'GET',
              data:{'name':query},
              success:function (data) {
                  $('#students_list').html(data);
              }
          })
      });
      $(document).on('click', 'li', function(){
          var value = $(this).text();
          $('#name').val(value);
          $('#students_list').html("");
      });
  });
</script> 
<br>
{{$students->links()}}  
@endsection
