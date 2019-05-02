@extends('layouts.master')
@section('content')
@if(Auth::user()->role_id==3 || Auth::user()->role_id==1)
<div class="right_col" role="main">
  <div class="">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Liste des pointages du mois par employés</h2>
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
        <div class="x_content">
          <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Date naissance</th>
                <th>Type pièce</th>
                <th>Numero pièce</th>
                <th>Contact</th>
                <th>Domicile</th>
                <th >Photo</th>
                <th>Site</th>
                <th>Nombre de pointages dans le mois</th>
              </tr>
            </thead>
           <tbody>
            @if(isset($employes_sites))
            @foreach($employes_sites as $employe)
              <tr>
                <td>{{$employe->nom}}</td>
                <td>{{$employe->prenom}}</td>
                <td>{{date('d-m-Y', strtotime($employe->date_naissance))}}</td>
                <td>{{$employe->typePiece}}</td>
                <td>{{$employe->cni}}</td>
                <td>{{$employe->contact}}</td>
                <td>{{$employe->domicile}}</td>
                <td>{{$employe->photo}}</td>
                <td>{{$employe->nom_site}}</td>                      
                <td>{{$employe->nbre_pointage}}</td> 
                
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@elseif(Auth::user()->role_id==2)
  bonjour
@endif
@endsection
