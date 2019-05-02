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
                  <form action="{{route('deleteAll')}}" id="frm_supression_multiple" method="POST">
                    {{csrf_field()}}
                    <h2>
                      <input type="hidden" name="ids" id="value_ids">
                      <a url="#" style="cursor: pointer;"  onclick="confirm_delete()" class="btn-danger btn-large"><i class="fa fa-trash"> </i>&nbsp; Supprimer</a>
                    </h2>
                  </form>
                  
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered example" rules="all">
                  
                  <thead>
                    <tr class="headings">
                      <th>
                        <th><input type="checkbox" onchange="checkAll('datatable-buttons',this)"></th>
                      </th>
                      <th>Action</th>
                      <th>Nom</th>
                      <th>Téléphone</th>
                      <th>Adresse</th>
                      <th>Email</th>
                      <th>Type client</th>
                    </tr>
                  </thead>
                 <tbody>
                  @if(isset($clients))
                  @foreach($clients as $client)
                    <tr class="even pointer">
                      <td class="a-center ">
                       <th><input type="checkbox" name="mycheckbox" value="{{$client->id}}"></th>
                      </td>
                      <td>
                        <a href="{{route('client.edit',$client->id)}}"><i class="fa fa-edit"></i></a>
                        <form id="frm_supprimer_client_{{$client->id}}" action="  {{route('client.destroy',$client->id)}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <a href="#" onclick="confirmer({{$client->id}})"><i class="fa fa-trash"></i></a>
                        </form>
                      </td>
                      <td>{{$client->nom}}</td>
                      <td>{{$client->telephone}}</td>
                      <td>{{$client->adresse}}</td>
                      <td>{{$client->email}}</td>
                      <td>{{$client->type_client}}</td>
                      
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


