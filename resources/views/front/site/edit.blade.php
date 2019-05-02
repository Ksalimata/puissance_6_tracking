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
                <h3>Modifier des sites</h3>
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
                    <h2>Modifier des sites</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <a href="{{route('site.index')}}"><h2><button class="btn-info btn-large"><i class="fa fa-arrow-left"> Retour</i></button></h2></a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="create-site" method="post" action="{{route('site.update',$site->id)}}" data-parsley-validate class="form-horizontal form-label-left">
                      {{csrf_field()}}
                      <input type="hidden" name="_method" value="PUT">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nom <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nom" name="nom" value="{{$site->nom}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Longitude <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="longitude" name="longitude" value="{{$site->longitude}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Latitude <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="latitude" class="form-control col-md-7 col-xs-12" type="text" name="latitude" value="{{$site->latitude}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Diamètre <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="diametre" class="form-control col-md-7 col-xs-12" type="number" name="diametre" value="{{$site->diametre}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employe_id">Employé <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select type="text" id="client_id" name="client_id" required="required" class="form-control col-md-7 col-xs-12">
                            @foreach($clients as $client)
                              @if($client->id==$client->client_id)
                                <option value="{{$client->id}}" selected="selected">{{$client->nom}}</option>
                              @else
                                <option value="{{$client->id}}">{{$client->nom}}</option>
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