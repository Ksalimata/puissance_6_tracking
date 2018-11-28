@extends('layouts.master')
@section('content')
<div class="right_col" role="main">
<div class="">
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
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12" >
            <div class="x_panel">
              <div class="x_title">
                <h2>Liste des clients </h2>
                <ul class="nav navbar-right panel_toolbox">
                  <a href="{{route('client.create')}}"><h2><button class="btn-success btn-large"><i class="fa fa-plus"> Ajouter</i></button></h2></a>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Téléphone</th>
                      <th>Adresse</th>
                      <th>Email</th>
                      <th>Type client</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                 <tbody>
                  @foreach($clients as $client)
                    <tr>
                      <td>{{$client->nom}}</td>
                      <td>{{$client->telephone}}</td>
                      <td>{{$client->adresse}}</td>
                      <td>{{$client->email}}</td>
                      <td>{{$client->type_client}}</td>
                      <td>
                        <a href="{{route('client.edit',$client->id)}}"><i class="fa fa-edit"></i></a>
                        <form id="frm_supprimer_client_{{$client->id}}" action="  {{route('client.destroy',$client->id)}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <a href="#" onclick="confirmer({{$client->id}})"><i class="fa fa-trash"></i></a>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>  
      </div>
</div>
<script type="text/javascript">
  function confirmer(id)
  {
    var r = confirm("Confirmez vous la suppression ?");

    if (r == true)
    {
      $('#frm_supprimer_client_'+id).submit();
    }
  }
  
</script>
@endsection

