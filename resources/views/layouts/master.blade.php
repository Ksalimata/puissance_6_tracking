<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>{{config('app.name')}}</title>

    <!-- Bootstrap -->
    <link href="{{asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- NProgress -->
    <link href="{{asset('assets/vendors/nprogress/nprogress.css')}}" rel="stylesheet" />
    <!-- iCheck -->
    <link href="{{asset('assets/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet" />   
    <!-- bootstrap-progressbar -->
    <link href="{{asset('assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" />
    <!-- JQVMap -->
    <link href="{{asset('assets/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" />
<!-- bootstrap-wysiwyg -->
    <link href="{{asset('assets/vendors/google-code-prettify/bin/prettify.min.css')}}" rel="stylesheet" />
    <!-- Select2 -->
    <link href="{{asset('assets/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
    <!-- Switchery -->
    <link href="{{asset('assets/vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet" />
    <!-- starrr -->
    <link href="{{asset('assets/vendors/starrr/dist/starrr.css')}}" rel="stylesheet"/>

    <!-- Datatables -->
    <link href="{{asset('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet" />
    <!-- Custom Theme Style -->
    <link href="{{asset('assets/build/css/custom.min.css')}}" rel="stylesheet" />
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        @include('partials.menu')
        @include('partials.header-bar')
        
        @yield('content')
        @include('partials.footer')


        <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Modifier mot de passe</h4>
                </div>
                <div class="modal-body">
                    <center>
                         <form action="{{route('editPassword')}}" method="POST" id="form" >
                            {{ csrf_field() }}
                            <div>                           
                                <input placeholder="Nouveau mot de passe" type="password" id="password" name="password" required> 
                                                                
                            </div>
                                    <br/>
                                    <br/>
                            <div>  
                                <input placeholder="Confirmer le mot de passe" type="password" id="confirm_password" name="confirm_password" required>  
                                     <strong id="erreur_password" style="color: red; display: block;"> </strong                         
                            </div>

                               
                            <br/>
                            <div>
                                <button onclick="ConfirmPassword()"  type="button">Modifier</button>
                            </div>
                        </form>
                    </center>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
              </div>
              
            </div>
          </div>

      </div>
    </div>  

 <!-- jQuery -->
    <script src="{{asset('assets/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('assets/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('assets/vendors/nprogress/nprogress.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{asset('assets/vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- gauge.js -->
    <script src="{{asset('assets/vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('assets/vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{asset('assets/vendors/skycons/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{asset('assets/vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('assets/vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('assets/vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('assets/vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('assets/vendors/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{asset('assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{asset('assets/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{asset('assets/vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <!-- DateJS -->
    <script src="{{asset('assets/vendors/DateJS/build/date.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('assets/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{asset('assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('assets/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="{{asset('assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
    <script src="{{asset('assets/vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script>
    <script src="{{asset('assets/vendors/google-code-prettify/src/prettify.js')}}"></script>
    <!-- jQuery Tags Input -->
    <script src="{{asset('assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>
    <!-- Switchery -->
    <script src="{{asset('assets/vendors/switchery/dist/switchery.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('assets/vendors/select2/dist/js/select2.full.min.js')}}"></script>
    <!-- Parsley -->
    <script src="{{asset('assets/vendors/parsleyjs/dist/parsley.min.js')}}"></script>
    <!-- Autosize -->
    <script src="{{asset('assets/vendors/autosize/dist/autosize.min.js')}}"></script>
    <!-- jQuery autocomplete -->
    <script src="{{asset('assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js')}}"></script>
    <!-- starrr -->
    <script src="{{asset('assets/vendors/starrr/dist/starrr.js')}}"></script>

    <!-- Datatables -->
    <script src="{{asset('assets/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('assets/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('assets/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{asset('assets/build/js/custom.min.js')}}"></script>

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
     value_ids=document.getElementById("value_ids");
     value_ids.value=ids;
     
     $('#frm_supression_multiple').submit();
     
 }
 function confirm_delete()
 {
    var S = confirm("voulez-vous vraiment supprimer les éléments selectionner?");
    if (S == true) 
    {
      supprimer_toutes_les_lignes_selectionnees() ;
    }
  }
 </script>
 <script type="text/javascript">
    
     function ConfirmPassword()
     {
        var password = document.getElementById("password").value;
        var confirm_password = document.getElementById("confirm_password").value;
        var erreur_password = document.getElementById("erreur_password");
        var password = jQuery$('#password').val();

        if ((password=="")||(confirm_password=="")) 
        {
            
           // erreur_password.innerHTML="Aucun champs ne doit être vide, Veuillez saisir";
            alert("desoler");
            document.getElementById("form").reset();
        }
        else 
        {
            if(password == confirm_password)
                        
                {
                    $("#form").submit();

                }

                else 
                { 
                    
                   // erreur_password.innerHTML="Mot de passe non identique, Veuillez resaisir";

                   document.getElementById("form").reset();
                            
                }
        }
     }
 </script>
  </body>  