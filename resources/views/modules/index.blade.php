@extends('layout.default')
@section('title', 'ONFP - Liste des modules')
@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">              
          @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
          @elseif (session('message'))
          <div class="alert alert-success">
              {{ session('message') }}
          </div>
          @endif
        <div class="card">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Liste des modules
            </div> 
          <div class="card-body">
            <div class="table-responsive">
              <div align="right">
                <a href="{!! url('modules/create') !!}"><div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</div></a> 
              </div>
                <br />
              <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                  <tr>
                    <th>ID</th>
                     <th>{!! __("module") !!}</th>
                     <th>{!! __("Effectif") !!}</th>
                    <th style="width:20%;">Action</th>
                  </tr>
                </thead>
                <tfoot class="table-dark">
                    <tr>
                      <th>ID</th>
                       <th>{!! __("module") !!}</th>
                       <th>{!! __("Effectif") !!}</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                <tbody>
                  <?php $i = 1 ?>
                  @foreach ($modules as $module)
                  <tr> 
                    <td>{!! $i++ !!}</td>
                    <td>{!! $module->name !!}</td>
                    <td>
                      @foreach ($module->demandeurs as $demandeur)
                      @if($loop->last)
                      {!! $loop->count !!}
                      @endif
                      @endforeach
                    </td>
                   {{--   <td>
                      @foreach ($module->demandeurs as $demandeur)
                      {!! $demandeur->localite->name !!}
                      @if ($demandeur->localite->name == "Dakar")
                      @if($loop->last)
                      {!! $loop->count !!} 
                      @endif
                      @endif
                      @endforeach
                    </td>  --}}
                    <td class="d-flex align-items-baseline align-content-center">
                        <a href="{!! url('modules/' .$module->id. '/edit') !!}" class= 'btn btn-success btn-sm' title="modifier">
                          <i class="far fa-edit">&nbsp;</i>
                        </a>
                        &nbsp;
                        <a href="{!! url('modules/' .$module->id) !!}" class= 'btn btn-primary btn-sm' title="voir">
                          <i class="far fa-eye">&nbsp;</i>
                        </a>
                        &nbsp;
                        {!! Form::open(['method'=>'DELETE', 'url'=>'modules/' .$module->id, 'id'=>'deleteForm', 'onsubmit' => 'return ConfirmDelete()']) !!}
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title'=>"supprimer"] ) !!}
                        {!! Form::close() !!}
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
@endsection














{{--  @extends('layout.default')
@section('title', 'ONFP - Liste des modules')
@section('content')
  <div class="container-fluid">
      @if (session()->has('success'))
          <div class="alert alert-success" role="alert">{{ session('success') }}</div>
      @endif 
    <div class="row">
      <div class="col-md-12">
          @if (session('message'))
          <div class="alert alert-success">
              {{ session('message') }}
          </div>
          @endif
        <div class="card"> 
            <div class="card-header">
                <i class="fas fa-table"></i>
                Liste des modules
            </div>              
          <div class="card-body">
                <div class="table-responsive">
                    <div align="right">
                      <a href="{{route('modules.create')}}"><div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</i></div></a>
                    </div>
                    <br />
                  <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="table-modules">
                    <thead class="table-dark">
                      <tr>
                        <th>ID</th>
                        <th>Module</th>
                        <th>Domaine</th>
                        <th>{!! __("Secteur d'activité") !!}</th>
                        <th style="width:10%;">Action</th>
                      </tr>
                    </thead>
                    <tfoot class="table-dark">
                        <tr>
                          <th>ID</th>
                          <th>Module</th>
                          <th>Domaine</th>
                          <th>{!! __("Secteur d'activité") !!}</th>
                          <th style="width:10%;">Action</th>
                        </tr>
                      </tfoot>
                    <tbod                           
                    </tbody>
                </table>                        
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_delete_module" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" action="" id="form-delete-module">
    @csrf
    @method('DELETE')
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Êtes-vous sûr de bien vouloir supprimer cet admin ?</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          cliquez sur close pour annuler
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger"><i class="fas fa-times">&nbsp;Delete</i></button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection

@push('scripts')
  <script type="text/javascript">
    $(document).ready(function () {
        $('#table-modules').DataTable( { 
          "processing": true,
          "serverSide": true,
          "ajax": "{{route('modules.list')}}",
          columns: [
                  { data: 'id', name: 'id' },
                  { data: 'name', name: 'name' },
                  { data: 'domaine.name', name: 'domaine.name' },
                  { data: 'domaine.secteur.name', name: 'domaine.secteur.name' },
                  { data: null ,orderable: false, searchable: false}
              ],
              "columnDefs": [
                      {
                      "data": null,
                      "render": function (data, type, row) {
                      url_e =  "{!! route('modules.edit',':id')!!}".replace(':id', data.id);
                      url_d =  "{!! route('modules.destroy',':id')!!}".replace(':id', data.id);
                      return '<a href='+url_e+'  class=" btn btn-primary btn-sm edit " title="Modifier"><i class="far fa-edit"></i></a>'+
                      '<div class="btn btn-danger delete btn_delete_module btn-sm ml-1" title="Supprimer" data-href='+url_d+'><i class="fas fa-trash-alt"></i></div>';
                      },
                      "targets": 4
                      },
              ],
              dom: 'lBfrtip',
              buttons: [
                  'copy', 'csv', 'excel', 'pdf', 'print',
              ],
              "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "Tout"] ],
              language: {
                "sProcessing":     "Traitement en cours...",
                "sSearch":         "Rechercher&nbsp;:",
                "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
                "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                "sInfoPostFix":    "",
                "sLoadingRecords": "Chargement en cours...",
                "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
                "oPaginate": {
                    "sFirst":      "Premier",
                    "sPrevious":   "Pr&eacute;c&eacute;dent",
                    "sNext":       "Suivant",
                    "sLast":       "Dernier"
                },
                "oAria": {
                    "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                },
                "select": {
                        "rows": {
                            _: "%d lignes séléctionnées",
                            0: "Aucune ligne séléctionnée",
                            1: "1 ligne séléctionnée"
                        } 
                }
              },            
        });          
      $('#table-modules').off('click', '.btn_delete_module').on('click', '.btn_delete_module',
      function() { 
        var href=$(this).data('href');
        $('#form-delete-module').attr('action', href);
        $('#modal_delete_module').modal();
      });
    });      
  </script> 
@endpush  --}}