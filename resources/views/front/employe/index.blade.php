@extends('layouts.master')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Liste des employés</h2>
          <ul class="nav navbar-right panel_toolbox">
            <a href="{{route('employe.create')}}"><h2><button class="btn-success btn-large"><i class="fa fa-plus"> Ajouter</i></button></h2></a>
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
                <th>Nom</th>
                <th>Prenom</th>
                <th>Date naissance</th>
                <th>Type pièce</th>
                <th>Numero pièce</th>
                <th>Contact</th>
                <th>Domicile</th>
                <th >Photo</th>
                <th >Empreinte</th>
                <th>Site</th>
                <th>Action</th>
              </tr>
            </thead>
           <tbody>
            @foreach($employes_sites as $employe)
              <tr>
                <td>{{$employe->nom}}</td>
                <td>{{$employe->prenom}}</td>
                <td>{{date('d-m-Y', strtotime($employe->date_naissance))}}</td>
                <td>{{$employe->typePiece}}</td>
                <td>{{$employe->cni}}</td>
                <td>{{$employe->contact}}</td>
                <td>{{$employe->domicile}}</td>
                <td><img src="{{ asset('storage/profile/'.$employe->id.'.jpg') }}" style="width:50px; height: 50px;"/></td>
                <td><img src="{{ asset('storage/emprunte/'.$employe->id.'.jpg') }}" style="width:50px; height: 50px;"/></td>                      
                <td>{{$employe->nom_site}}</td> 
                <td>
                  <a href="{{route('employe.edit',$employe->id)}}"><i class="fa fa-edit"></i>
                  </a>
                  <form id="frm_supprimer_employe_{{$employe->id}}" action="{{route('employe.destroy',$employe->id)}}" method="POST">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <a href="#" onclick="confirmer({{$employe->id}})"><i class="fa fa-trash"></i></a>
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
<script type="text/javascript">
  function confirmer(id)
  {
    var r = confirm("Confirmez vous la suppression ?");

    if (r == true)
    {
      $('#frm_supprimer_employe_'+id).submit();
    }
  }
  
</script>
@endsection
