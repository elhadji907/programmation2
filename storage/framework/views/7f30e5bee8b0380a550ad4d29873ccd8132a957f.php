<?php $__env->startSection('title', 'ONFP - Liste des demandeurs individuelles'); ?>
<?php $__env->startSection('content'); ?>
        <div class="container-fluid">
            <?php if(session()->has('success')): ?>
                <div class="alert alert-success" role="alert"><?php echo e(session('success')); ?></div>
            <?php endif; ?> 
          <div class="row justify-content-center">
            <div class="col-md-12">
                <?php if(session('message')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('message')); ?>

                </div>
                <?php endif; ?>
              
              <div class="card"> 
                  <div class="card-header">
                      <i class="fas fa-table"></i>
                      Liste des demandeurs individuelles
                  </div>              
                <div class="card-body">
                      <div class="table-responsive">
                          <div align="right">
                            <a href="<?php echo e(route('individuelles.create')); ?>"><div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</i></div></a>
                          </div>
                          <br />
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="table-individuelles">
                          <thead class="table-dark">
                            <tr>
                              <th>Numéro</th>
                              <th>Cin</th>
                              <th>Civilité</th>
                              <th>Prenom</th>
                              <th>Nom</th>
                              <th>Date nais.</th>
                              <th>Lieu nais.</th>
                              <th>Téléphone</th>
                              <th>Module</th>
                              <th>Localité</th>
                              <th>Statut</th>
                              <th style="width:08%;">Action</th>
                            </tr>
                          </thead>
                          <tfoot class="table-dark">
                              <tr>
                              <th>Numéro</th>
                              <th>Cin</th>
                              <th>Civilité</th>
                              <th>Prenom</th>
                              <th>Nom</th>
                              <th>Date nais.</th>
                              <th>Lieu nais.</th>
                              <th>Téléphone</th>
                              <th>Module</th>
                              <th>Localité</th>
                              <th>Statut</th>
                              <th>Action</th>
                              </tr>
                            </tfoot>
                          <tbody>
                            <?php $i = 1 ?>
                  <?php $__currentLoopData = $individuelles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $individuelle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr> 
                    
                    <td><?php echo $individuelle->demandeur->numero; ?></td>
                    <td><?php echo $individuelle->cin; ?></td>
                    <td><?php echo $individuelle->demandeur->user->civilite; ?></td>
                    <td><?php echo $individuelle->demandeur->user->firstname; ?></td>
                    <td><?php echo $individuelle->demandeur->user->name; ?></td>
                    <td><?php echo $individuelle->demandeur->user->date_naissance->format('d/m/Y'); ?></td>
                    <td><?php echo $individuelle->demandeur->user->lieu_naissance; ?></td>
                    <td><?php echo str_limit($individuelle->demandeur->user->telephone, 9, ''); ?></td>
                    <td>
                      <?php $__currentLoopData = $individuelle->demandeur->modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php echo $module->name; ?>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td><?php echo $individuelle->demandeur->lieux->name; ?></td>
                    <td style="text-align: center;">
                      <?php if($individuelle->demandeur->status == "Retenue"): ?>
                      <i class="fa fa-check text-success" title="Retenue" aria-hidden="true"></i>
                      <?php elseif($individuelle->demandeur->status == "Annulée"): ?>
                      <i class="fa fa-times text-danger" title="Annulée" aria-hidden="true"></i>
                      <?php else: ?>                      
                      <?php echo $individuelle->demandeur->status; ?>                          
                      <?php endif; ?>
                    </td>
                    <td style="text-align: center;" class="d-flex align-items-baseline align-content-center">
                        <a href="<?php echo url('individuelles/' .$individuelle->id. '/edit'); ?>" class= 'btn btn-success btn-sm' title="modifier">
                          <i class="far fa-edit">&nbsp;</i>
                        </a>
                        &nbsp;
                        <a href="<?php echo url('individuelles/' .$individuelle->id); ?>" class= 'btn btn-primary btn-sm' title="voir">
                          <i class="far fa-eye">&nbsp;</i>
                        </a>
                        &nbsp;
                        <?php echo Form::open(['method'=>'DELETE', 'url'=>'individuelles/' .$individuelle->id, 'id'=>'deleteForm', 'onsubmit' => 'return ConfirmDelete()']); ?>

                        <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title'=>"supprimer"] ); ?>

                        <?php echo Form::close(); ?>

                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                      </table>                        
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php $__env->stopSection(); ?>

  <?php $__env->startPush('scripts'); ?>
  <script type="text/javascript">
    $(document).ready( function () {
      $('#table-individuelles').DataTable({
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print',
        ],
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "Tout"] ],
        "order": [
              [ 0, 'asc' ]
              ],
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
              }
      });
  } );
  </script> 
  <?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/individuelles/index.blade.php ENDPATH**/ ?>