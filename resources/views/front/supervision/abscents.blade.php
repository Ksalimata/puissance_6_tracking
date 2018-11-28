@extends('layouts.master_supervision')
@section('content')
<div class="right_col" role="main">
  <div class="" >
    <div style="padding-top:5%">
        <div class="x_title">
          <h2 style="color:black">Liste des abscents de l'heure précédente</h2>
          <div class="clearfix"></div>
          @if(session('success'))
            <div class="alert alert-success">
              {{session('success')}} 
            </div>  
          @endif
          @if(session('error'))
            <div class="alert alert-error">
              {{session('error')}}
            </div>
          @endif
        </div>
        <div class="x_content" >
          <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Numero pièce</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Contact</th>
                <th>Site</th>
              </tr>
            </thead>
           <tbody>
            @foreach($listeEmployeNonPointes as $employe)
              <tr>
                <td>{{$employe->cni}}</td>
                <td>{{$employe->nom}}</td>
                <td>{{$employe->prenom}}</td>
                <td>{{$employe->contact}}</td>                      
                <td>{{$employe->nom_site}}</td> 
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
  </div>
</div> 
@endsection