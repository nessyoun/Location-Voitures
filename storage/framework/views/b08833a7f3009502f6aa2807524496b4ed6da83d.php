<?php $__env->startSection('content'); ?>
    <div class="container w-100" style="margin-top:10%">
        <div class="row bg-light">
            <div class="col">
                Voitures 
            </div>
            <div class="col">
                Etats de reservation:
            </div>
            <div class="col">
                Date de création :
            </div>
            <div class="col">
                Date de debut :
            </div>
            <div class="col">
                Date fin :
            </div>
            <div class="col">
                Prix :
            </div>
            <div class="col">
                Actions :
            </div>
        </div>
        <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row w-100">
                <div class="col border text-white">
                    <?php echo e($res->Voiture->modelVoiture->marqueOrigin->marque); ?> <?php echo e($res->Voiture->modelVoiture->model_voiture); ?>

                </div>
                <div class="col border text-white">
                    <?php echo e($res->etat->etat); ?>

                </div>
                <div class="col border text-white">
                    <?php echo e($res->date_de_creation); ?>

                </div>
                <?php if($res->date_debut && $res->date_fin): ?>
                    <div class="col border text-white">
                        <?php echo e($res->date_debut); ?>

                    </div>
                    <div class="col border text-white">
                        <?php echo e($res->date_fin); ?>

                    </div>
                <?php else: ?>
                    <div class="col border text-white">
                        ---
                    </div>
                    <div class="col border text-white">
                        ---
                    </div>
                <?php endif; ?>
                <div class="col border text-white">
                    <?php echo e($res->Voiture->prix); ?>

                </div>
                <div class="col border text-white">
                    <a href="/annulerReservation/<?php echo e($res->id); ?>" class="btn btn-danger">Annuler</a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
<script>
     var active = document.getElementById('res');
        active.classList.add('activer');
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.location', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>