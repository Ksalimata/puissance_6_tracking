@extends('layouts.master')
@section('content')
<div class="right_col" role="main">
<div class="">
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Liste des pointages</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <a href="{{route('pointage.create')}}"><h2><button class="btn-success btn-large"><i class="fa fa-plus"> Ajouter</i></button></h2></a>
                      <form action="{{route('deleteAllPointage')}}" id="frm_supression_multiple" method="POST">
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
                          <th>Actions</th>
                          <th>Heure</th>
                          <th>Longitude</th>
                          <th>Latitude</th>
                          <th>Date pointage</th>
                          <th>Employe</th>
                          </tr>
                      </thead>
                     <tbody>
                      @if(isset($pointages_employes))
                      @foreach($pointages_employes as $pointage)
                        <tr>
                          <td>
                              <th><input type="checkbox" name="mycheckbox" value="{{$pointage->id}}"></th>
                          </td>
                          <td>
                            <a href="{{route('pointage.edit',$pointage->id)}}"><i class="fa fa-edit"></i></a>
                            <form id="frm_supprimer_pointage_{{$pointage->id}}" action="{{route('pointage.destroy',$pointage->id)}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <a href="#" onclick="confirmer({{$pointage->id}})"><i class="fa fa-trash"></i></a>
                            </form>
                          </td>
                          <td>{{$pointage->heure}}</td>
                          <td>{{$pointage->longitude}}</td>
                          <td>{{$pointage->latitude}}</td>
                          <td>{{date('d-m-Y', strtotime($pointage->date_pointage))}}</td>
                          <td>{{$pointage->nom}}{{$pointage->prenom}}</td>
                          
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
      $('#frm_supprimer_pointage_'+id).submit();
    }
  }
  
</script>

@endsection
