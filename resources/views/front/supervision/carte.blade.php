@extends('layouts.master_supervision')
@section('content')
<div ng-controller="TableController" style="width: 100%;height: 100%">
    <div id="map" style="float: left;" class="panel panel-default panel-success" ></div> 
    <div style="background-color: white; width:25%;margin-left: 75%; padding-top:4%;height: 100%">
        <table style="width: 100%" class="table table-hover table-bordered">
          <thead>
            <tr>
              <th>Sites</th>
            </tr>
          </thead>
         <tbody>
          @foreach($sites as $site)
            <tr>
              <td ng-click="myFunc({{$site->latitude}},{{$site->longitude}})" style="cursor:pointer">{{$site->nom}}</td>
            </tr>   
            @endforeach
          </tbody>
        </table>
        <!-- <div style="width: 100%; height: 100%;margin: 0;padding: 25% " id="tableau_sites">OK</div> -->
    </div>
</div>
@endsection
        
        
        
