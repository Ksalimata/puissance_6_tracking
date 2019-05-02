
<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.4/leaflet.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{!!asset('css/style.css')!!}">
        <link href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />

        <!-- Datatables -->
	    <link href="{{asset('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
	    <link href="{{asset('assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet" />
	    <link href="{{asset('assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet" />
	    <link href="{{asset('assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet" />
	    <link href="{{asset('assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet" />
	    <!-- Custom Theme Style -->
    <link href="{{asset('assets/build/css/custom.min.css')}}" rel="stylesheet" />
    </head>
    <body ng-app="app">

    	@include('partials.menu_supervision')
    	@yield('content')


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.4/leaflet.js"></script>    
        <script src = "{!!asset('js/angular.min.js')!!}"></script>
        <script src = "{!!asset('js/table-directive.js')!!}"></script>      

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
	    <script src="{{asset('assets/build/js/custom.min.js')}}"></script>
    </body>
</html>