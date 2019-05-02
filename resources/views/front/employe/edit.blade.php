@extends('layouts.master')
@section('content')
	<div class="right_col" role="main">
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
@if(session('error'))
  <div class="alert alert-error">
      {{session('error')}}
  </div>
@endif
  @if(!$errors->isEmpty())
     <div class="alert alert-danger">
     @foreach($errors->all() as $error)
       {{$error}}<br/>
     @endforeach
     </div>
   @endif
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Modifier des employés</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Rechercher par...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Modifier des employés</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <a href="{{route('employe.index')}}"><h2><button class="btn-info btn-large"><i class="fa fa-arrow-left"> Retour</i></button></h2></a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="create-employe" method="post" action="{{route('employe.update',$employe->id)}}" data-parsley-validate class="form-horizontal form-label-left" ENCTYPE="multipart/form-data">
                      {{csrf_field()}}
                      <input type="hidden" name="_method" value="PUT">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nom <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nom" name="nom" value="{{$employe->nom}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Prenom <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="prenom" name="prenom" value="{{$employe->prenom}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Type Pièce</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="typePiece" class="form-control col-md-7 col-xs-12" type="text" name="typePiece" value="{{$employe->typePiece}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Numero pièce <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="cni" name="cni" value="{{$employe->cni}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Contact <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="contact" name="contact" value="{{$employe->contact}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date de naissance <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="date_naissance" name="date_naissance" value="{{$employe->date_naissance}}" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Domicile<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="domicile" name="domicile" value="{{$employe->domicile}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="heure_debut">Heure Debut <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="time" id="heure_debut" name="heure_debut" required="required" class="form-control col-md-7 col-xs-12" value="{{$employe->heure_debut}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="heure_fin">Heure Fin <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="time" id="heure_fin" name="heure_fin" required="required" class="form-control col-md-7 col-xs-12" value="{{$employe->heure_fin}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Photo<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                          @if (asset('storage/profile/'.$employe->id.'.jpg'))
                              <img style="width: 50px;" src="{{asset('storage/profile/'.$employe->id.'.jpg')}}">
                          @else
                                  <p>No image found</p>
                          @endif
                          <input type="file" id="photo" name="photo" value="{{$employe->photo}}" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Empreinte<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                          @if (asset('storage/emprunte/'.$employe->id.'.jpg'))
                              <img style="width: 50px;" src="{{asset('storage/emprunte/'.$employe->id.'.jpg')}}">
                          @else
                                  <p>No emprunte found</p>
                          @endif
                          <input type="file" id="empreinte" name="empreinte" value="{{$employe->empreinte}}" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="site_id">Site <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select type="text" id="site_id" name="site_id" required="required" class="form-control col-md-7 col-xs-12">
                            @foreach($sites as $site)
                              @if($site->id==$site->site_id)
                                <option value="{{$site->id}}" selected="selected">{{$site->nom}}</option>
                              @else
                                <option value="{{$site->id}}">{{$site->nom}}</option>
                              @endif
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                     
                          <button type="submit" class="btn btn-success">Ajouter</button>
                          <button class="btn btn-primary" type="reset">Annuler</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>         
	
@endsection