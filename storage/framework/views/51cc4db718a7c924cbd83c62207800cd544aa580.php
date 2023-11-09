<?php $__env->startSection('content'); ?>
    <div class="container table w-100" style="margin-top:15%" >
        <div class="row bg-light">
            <div class="col-md-2">
                Nom
            </div>
            <div class="col-md-2">
                Voiture
            </div>
            <div class="col-md-2">
                Date de creation:
            </div>
            <div class="col-md-2">
                Date fin
            </div>
            <div class="col-md-2">
                Actions
            </div>
        </div>
        <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row text-white">
                <div class="col-md-2 border">
                    <?php echo e($reservation->client->user->name); ?>

                </div>
                <div class="col-md-2 border">
                    <?php echo e($reservation->Voiture->modelVoiture->marqueOrigin->marque); ?>

                    <?php echo e($reservation->Voiture->modelVoiture->model_voiture); ?>

                </div>
                <div class="col-md-2 border">
                    <?php echo e($reservation->date_de_creation); ?>

                </div>
                <div class="col-md-2 border">
                    <?php echo e($reservation->date_fin); ?>

                </div>
                <div class="col border">
                    <a class="btn btn-primary mx-3 my-1" href="/approuver/<?php echo e($reservation->id); ?>" >Approuver</a>
                    <a class="btn btn-danger my-1" href="/annulerReservation/<?php echo e($reservation->id); ?>" >Supprimer</a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <script>
        var active = document.getElementById('calendrieradmin');
        active.classList.add('activer');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.location', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>