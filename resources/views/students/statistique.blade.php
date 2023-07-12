@extends('layouts.app')
@section('content')
<div id="stats-container">

    <div class="container">
        <h1 style="font-size: 25px">Nombre mensuel d'étudiants :</h1>
        @if(!$students->isEmpty())
        <button class="btn btn-warning" id="impression" name="impression" onclick="window.print();">
            Imprimer cette page
            <svg xmlns="http://www.w3.org/2000/svg" style="color:black" width="20" height="20" fill="currentColor"
                class="bi bi-printer" viewBox="0 0 16 16">
                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                <path
                    d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
            </svg>
        </button>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    @if(!$students->isEmpty())
                    <th>Anné</th>
                    <th>Mois</th>
                    <th>Nombre</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>

                    <td>{{ $student->year }}</td>
                    <td >{{ date('F', mktime(0, 0, 0, $student->month, 1)) }}</td>
                    <td>{{ $student->count }} Étudinats</td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <style>
    </style>
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