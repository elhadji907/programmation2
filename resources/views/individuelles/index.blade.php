@extends('layout.default')
@section('title', 'ONFP - Liste des demandeurs individuelles')
@section('content')
    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Liste des demandeurs individuelles
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div align="right">
                                <a href="{{ route('individuelles.create') }}">
                                    <div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</i></div>
                                </a>
                            </div>
                            <br />
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0"
                                id="table-individuelles">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Numéro</th>
                                        <th>Cin</th>
                                        {{-- <th>Civilité</th> --}}
                                        <th>Prenom et Nom</th>
                                        {{-- <th>Date nais.</th>
                                        <th>Lieu nais.</th> --}}
                                        <th>Téléphone</th>
                                        <th style="width:30%;">Module</th>
                                        <th>Type demande</th>
                                        {{-- <th>Localité</th> --}}
                                        <th>Statut</th>
                                        <th style="width:08%;">Action</th>
                                    </tr>
                                </thead>
                                <tfoot class="table-dark">
                                    <tr>
                                        <th>Numéro</th>
                                        <th>Cin</th>
                                        {{-- <th>Civilité</th> --}}
                                        <th>Prenom et Nom</th>
                                        {{-- <th>Date nais.</th>
                                        <th>Lieu nais.</th> --}}
                                        <th>Téléphone</th>
                                        <th>Module</th>
                                        <th>Type demande</th>
                                        {{-- <th>Localité</th> --}}
                                        <th>Statut</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($individuelles as $individuelle)
                                    @can('view', $individuelle)
                                        <tr>
                                            {{-- <td>{!! $i++ !!}</td> --}}
                                            <td>{!! $individuelle->demandeur->numero !!}</td>
                                            <td>{!! $individuelle->cin !!}</td>
                                            {{-- <td>{!! $individuelle->demandeur->user->civilite !!}</td> --}}
                                            <td>{!! $individuelle->demandeur->user->firstname !!} {{ ' ' }}{!! $individuelle->demandeur->user->name !!} </td>
                                            {{-- <td>{!! $individuelle->demandeur->user->name !!}</td>
                                            <td>{!! $individuelle->demandeur->user->date_naissance->format('d/m/Y') !!}</td>
                                            <td>{!! $individuelle->demandeur->user->lieu_naissance !!}</td> --}}
                                            <td>{!! $individuelle->demandeur->user->telephone !!}</td>
                                            <td>
                                                @foreach ($individuelle->demandeur->modules as $module)
                                                    <p>{!! $module->name !!}</p>
                                                @endforeach
                                            </td>
                                            <td>{!! $individuelle->demandeur->types_demande->name !!}</td>
                                            {{-- <td>{!! $individuelle->demandeur->departement->nom !!}</td> --}}
                                            <td style="text-align: center;">
                                                {!! $individuelle->demandeur->statut !!}
                                            </td>
                                            <td class="d-flex align-items-baseline text-center-row">
                                                @can('update', $individuelle)
                                                    <a href="{!! url('individuelles/' . $individuelle->id . '/edit') !!}" class='btn btn-success btn-sm'
                                                        title="modifier">
                                                        <i class="far fa-edit">&nbsp;</i>
                                                    </a>
                                                    @endcan
                                                &nbsp;
                                                <a href="{!! url('individuelles/' . $individuelle->id) !!}" class='btn btn-primary btn-sm'
                                                    title="voir">
                                                    <i class="far fa-eye">&nbsp;</i>
                                                </a>
                                                &nbsp;
                                                @can('delete', $individuelle)
                                                {!! Form::open(['method' => 'DELETE', 'url' => 'individuelles/' . $individuelle->id, 'id' => 'deleteForm', 'onsubmit' => 'return ConfirmDelete()']) !!}
                                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'supprimer']) !!}
                                                @endcan
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                        @endcan
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

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table-individuelles').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print',
                ],
                "lengthMenu": [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "Tout"]
                ],
                "order": [
                    [0, 'asc']
                ],
                language: {
                    "sProcessing": "Traitement en cours...",
                    "sSearch": "Rechercher&nbsp;:",
                    "sLengthMenu": "Afficher _MENU_ &eacute;l&eacute;ments",
                    "sInfo": "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                    "sInfoEmpty": "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                    "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    "sInfoPostFix": "",
                    "sLoadingRecords": "Chargement en cours...",
                    "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
                    "oPaginate": {
                        "sFirst": "Premier",
                        "sPrevious": "Pr&eacute;c&eacute;dent",
                        "sNext": "Suivant",
                        "sLast": "Dernier"
                    },
                    "oAria": {
                        "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                        "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                    },
                    "select": {
                        "rows": {
                            _: "%d lignes séléctionnées",
                            0: "Aucune ligne séléctionnée",
                            1: "1 ligne séléctionnée"
                        }
                    }
                }
            });
        });
    </script>
@endpush
