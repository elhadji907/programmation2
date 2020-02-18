<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

{{--   <!-- Core plugin JavaScript--> --}}
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

{{--  Custom scripts for all pages  --}}
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

{{--   <!-- Page level plugins --> --}}
  <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

 {{--  <!-- Page level custom scripts --> --}}
  <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

  <script src="{{ asset('dist/js/select2.min.js') }}"></script>
    
  <script type="text/javascript">
  
        $("#objet").select2({
              placeholder: "sélectionner un objet",
              allowClear: true
          });
  </script>
  <script type="text/javascript">
  
        $("#structure").select2({
              placeholder: "sélectionner une structure",
              allowClear: true
          });
  </script>

  <script type="text/javascript">
  
    $("#civilite").select2({
          placeholder: "sélectionner un sexe",
          allowClear: true
      });
</script>  
  <script type="text/javascript">
  
  $("#secteur").select2({
        placeholder: "selectione un secteur",
        allowClear: true
    });
</script>
  <script type="text/javascript">
  
  $("#domaine").select2({
        placeholder: "sélectionner un domaine",
        allowClear: true
    });
</script>

  <script type="text/javascript">
  
    $("#direction").select2({
          placeholder: "sélectionner une direction ou un service",
          allowClear: true
      });
</script>
  <script type="text/javascript">
  
    $("#fonction").select2({
          placeholder: "sélectionner la fonction",
          allowClear: true
      });
</script>
  <script type="text/javascript">
  
    $("#categorie").select2({
          placeholder: "sélectionner la catégorie",
          allowClear: true
      });
</script>
  <script type="text/javascript">
  
    $("#niveau").select2({
          placeholder: "sélectionner un niveau d'étude",
          allowClear: true
      });
</script>


  
  <!-- Page level plugins -->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
  
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('js/feather.min.js') }}"></script>
    <script>
        feather.replace()
    </script>    
@stack('scripts')
@yield('javascripts')