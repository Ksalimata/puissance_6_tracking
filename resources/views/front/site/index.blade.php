@extends('layouts.master')
@section('content')
<div class="right_col" role="main">
<div class="">
  
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Liste des sites</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <a href="{{route('site.create')}}"><h2><button class="btn-success btn-large"><i class="fa fa-plus"> Ajouter</i></button></h2></a>
                      <form action="{{route('deleteAllSite')}}" id="frm_supression_multiple" method="POST">
                        {{csrf_field()}}
                      <h2>
                        <input type="hidden" name="ids" id="value_ids">
                        <a url="#" style="cursor: pointer;"  onclick="confirm_delete()" class="btn-danger btn-large"><i class="fa fa-trash"> </i>&nbsp; Supprimer</a>
                      </h2>
                      </form>
                    </ul>
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
                          <th>
                              <th><input type="checkbox" onchange="checkAll('datatable-buttons',this)"></th>
                          </th>
                          <th>Action</th>
                          <th>Nom</th>
                          <th>Longitude</th>
                          <th>Latitude</th>
                          <th>Diamètre</th>
                          <th>Client</th>
                          
                        </tr>
                      </thead>
                     <tbody>
                      @if(isset($sites_clients))
                      @foreach($sites_clients as $site)
                        <tr>
                          <td>
                              <th><input type="checkbox" name="mycheckbox" value="{{$site->id}}"></th>
                          </td>
                           <td>
                            <a href="{{route('site.edit',$site->id)}}"><i class="fa fa-edit"></i></a>
                            <form id="frm_supprimer_site_{{$site->id}}" action="{{route('site.destroy',$site->id)}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <a href="#" onclick="confirmer({{$site->id}})"><i class="fa fa-trash"></i></a>
                            </form>
                          </td>
                          <td>{{$site->nom}}</td>
                          <td>{{$site->longitude}}</td>
                          <td>{{$site->latitude}}</td>
                          <td>{{$site->diametre}}</td>
                          <td>{{$site->nom_client}}</td>
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
<script type="text/javascript">
  function confirmer(id)
  {
    var r = confirm("Confirmez vous la suppression ?");

    if (r == true)
    {
      $('#frm_supprimer_site_'+id).submit();
    }
  }
  
</script>

@endsection
