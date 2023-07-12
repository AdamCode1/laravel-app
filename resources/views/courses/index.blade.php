

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

                    <h1>Course</h1>

                    @if(request()->is('courses'))
                    <div>Le total des Cours est :<strong>{{ $courses->total() }}</strong></div>
                    @endif
                </div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <a class="btn btn-success" href="{{ route('courses.create') }}">Ajouter Course</a>
                        </div>

                        <div class="col">
                                <div class="input-group">
                                    <input type="text" placeholder="Recherche ..." name="name" id="name" class="form-control" autocomplete="off">
                                    
                                </div>
                            </form>
                        </div>
                    </div>

                    @if (isset($courses) && count($courses) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                              @if(!$courses->isEmpty())
                                <th>Nom</th>
                                <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody id="courses_list">
                            @foreach($courses as $course)
                                <tr>
                                    <td>{{ $course->name }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('courses.show', ['id' => $course->id]) }}">Details</a>
                                        <a class="btn btn-primary" href="{{ route('courses.edit', $course->id) }}">Modifier</a>
                                        <form action="{{ route('courses.destroy', $course->id) }}" method="post" style="display:inline-block;">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce cours ?')">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @elseif (isset($courses) && count($courses) == 0 && !request()->has('name'))
                    <h6 style="text-align: center;margin-top:30px;">Aucun cours</h6>
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
              url:'{{ route('courses.search') }}',
              type:'GET',
              data:{'name':query},
              success:function (data) {
                  $('#courses_list').html(data);
              }
          })
      });
      $(document).on('click', 'li', function(){
          var value = $(this).text();
          $('#name').val(value);
          $('#courses_list').html("");
      });
  });
</script> 
<br>
{{$courses->links()}}  
@endsection
