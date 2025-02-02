<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Prêt à partir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><?php echo e(("Êtes-vous sûr de bien vouloir se déconnecter de la session en cours ?")); ?></div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal"><span data-feather="x"></span>Annuler</button>
          <a class="btn btn-primary" href="<?php echo e(route('logout')); ?>"  onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <span data-feather="log-out"></span>
          Se déconnecter</a>
          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
              <?php echo csrf_field(); ?>
          </form>
        </div>
      </div>
    </div>
  </div><?php /**PATH /var/www/html/programmation/resources/views/layout/logout.blade.php ENDPATH**/ ?>