<?php $__env->startSection('content'); ?>
    <div class="container">
        <br><br><br><br><br><br>
        <div class="row my-5">
            <div class="col-md-5 bg-danger mx-5 co-dash h-100">
                <h4 class="text-center my-1">Voitures en total:<h4>
                <div class="text-center"><?php echo e($vtr); ?></div>
            </div>
            <div class="col-md-5 bg-danger co-dash">
                <h4 class="text-center my-1">Clients inscrits:<h4>
                <div class="text-center"><?php echo e($clts); ?></div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-3 bg-danger mx-5 co-dash h-100">
                <h4 class="text-center my-1">Reservations en cours:<h4>
                <div class="text-center"><?php echo e($encours); ?></div>
            </div>
            <div class="col-md-3 bg-danger mx-5 co-dash">
                <h4 class="text-center my-1">Reservations en attentes:<h4>
                <div class="text-center"><?php echo e($enatt); ?></div>
            </div>
            <div class="col-md-3 bg-danger co-dash">
                <h4 class="text-center my-1">Réservations annulées:<h4>
                <div class="text-center"><?php echo e($annules); ?></div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-11 bg-info mx-5 co-dash h-100">
                <h4 class="text-center my-1">Profit du mois courant :<h4>
                <div class="text-center"><?php echo e($somme); ?> DH</div>
            </div>
        </div>
    </div>
    <script>
        var active = document.getElementById('homeadmin');
        active.classList.add('activer');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.location', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>