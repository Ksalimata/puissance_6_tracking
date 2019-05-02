@extends('layouts.master')
@section('content')
<div class="right_col" role="main">
<div class="">
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Liste des utilisateurs</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <a href="{{route('user.create')}}"><h2><button class="btn-success btn-large"><i class="fa fa-plus"> Ajouter</i></button></h2></a>
                      
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
                          <th>Nom d'utilisateur</th>
                          <th>Role</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                     <tbody>
                      @foreach($users_roles as $user)
                        <tr>
                          
                          <td>{{$user->name}}</td>
                          <td>{{$user->username}}</td>                      
                          <td>{{$user->nom_role}}</td> 
                          <td>
                            <a href="{{route('user.edit',$user->id)}}"><i class="fa fa-edit"></i></a>
                            <form id="frm_supprimer_user_{{$user->id}}" action="{{route('user.destroy',$user->id)}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <a href="#" onclick="confirmer({{$user->id}})"><i class="fa fa-trash"></i></a>
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
      $('#frm_supprimer_user_'+id).submit();
    }
  }
  
</script>
<script type="text/javascript">

 function checkAll (tableID, main)
 {
     mycheckbox = document.getElementsByName("mycheckbox");
     if(main.checked==true)
     {
       for( var i=0;i<mycheckbox.length;i++)
        mycheckbox[i].checked = true;
     }
     else
     {
        for( var i=0;i<mycheckbox.length;i++)
          mycheckbox[i].checked = false;
     }
 }

 function supprimer_toutes_les_lignes_selectionnees()
 {

    mycheckbox = document.getElementsByName("mycheckbox");

    ids = "";

    for(var i=0; i< mycheckbox.length;i++)
    {
      if(mycheckbox[i].checked==true)
      {
        if(i==0)
        {
          ids+=mycheckbox[i].value;
        }
        else
          ids+=" "+mycheckbox[i].value;
      }
    }
    
    alert(ids);
 }
 
 </script>
@endsection
