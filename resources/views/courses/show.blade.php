@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: 25px"> Course Information :</div>
                <br>
                <button  class="btn btn-warning" id="impression" name="impression" onclick="window.print()" >
                    Imprimer cette page
                    <svg xmlns="http://www.w3.org/2000/svg" style="color:black"  width="20" height="20" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                        <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                      </svg>
                    </button>
                
                <div class="panel-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><strong>ID:</strong></td>
                                <td>{{  $course->id }}</td>
                            </tr>
                            <tr>
                                <td><strong>Nom de Cours:</strong></td>
                                <td>{{  $course->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Description :</strong></td>
                                <td>{{ $course->description }}</td>
                            </tr>
                            <tr>
                                <td><strong>Nombre d'étudiants inscrits à ce Cours:</strong></td>
                            <br>
                                <td>   
                                     <p>{{ $students_count }} </p>
                                </td>
                            </tr>
                      
                           
                            <tr>
                                <td><strong>Date Création :</strong></td>
                                <td>{{ $course->created_at->format('d-m-Y') }}</td>
                            </tr>
                          
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
      
    
            <a  href="{{ route('courses.edit', $course->id) }}">Modifier le cours</a>
            <br><br>
           <div>
            <svg style="color:rgb(6, 79, 121)" xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
              </svg>
            
              <a  href="{{ route('courses.index') }}">Retour aux cours</a>
            
            </div>
    </div>
</div>

<style media="print">
    #impression {
        display: none;
    }

    #footer,
    nav,
    a,
    ul,
    li,
    svg,
    link {
        display: none;
    }

    @page {
        size: auto;
        margin: 0;
    }
</style>

@endsection
