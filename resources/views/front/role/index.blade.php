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
                <h2>Liste des rôles </h2>
                <ul class="nav navbar-right panel_toolbox">
                  <a href="{{route('role.create')}}"><h2><button class="btn-success btn-large"><i class="fa fa-plus"> Ajouter</i></button></h2></a>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                 <tbody>
                  @foreach($roles as $role)
                    <tr>
                      <td>{{$role->nom}}</td>
                      <td>{{$role->description}}</td>
                      <td>
                        <a href="{{route('role.edit',$role->id)}}"><i class="fa fa-edit"></i></a>
                        <form id="frm_supprimer_role_{{$role->id}}" action="  {{route('role.destroy',$role->id)}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <a href="#" onclick="confirmer({{$role->id}})"><i class="fa fa-trash"></i></a>
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
      $('#frm_supprimer_role_'+id).submit();
    }
  }
  
</script>
@endsection

