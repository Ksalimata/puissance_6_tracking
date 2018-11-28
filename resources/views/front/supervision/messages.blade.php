@extends('layouts.master_supervision')
@section('content')
<div class="right_col" role="main">
  <div class="" >
    <div style="padding-top:5%">
        <div class="x_title">
          <h2 style="color:black">Liste des messages du jour</h2>
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
                <th>Heure</th>
                <th>Message</th>
                <th>Site</th>
                <th>Date message</th>
                <th>Employe</th>
              </tr>
            </thead>
           <tbody>
            @foreach($listeMessages as $message)
              <tr>
                <td>{{$message->heure}}</td>
                <td>{{$message->contenu}}</td>
                <td>{{$message->nom_site}}</td>
                <td>{{date('d-m-Y', strtotime($message->date_message))}}</td>
                <td>{{$message->nom}} {{$message->prenom}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
  </div>
</div> 
@endsection