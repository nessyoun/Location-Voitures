<?php $__env->startSection('content'); ?>
    <br>
    <div class="row w-100">
        <form action="/rechercher" method="GET" class="w-100">
            <div class="form-groupe d-flex justify-content-center my-5 w-100">
                <input type="text" name="voit" id="voit" palceholder="Rechercher par prix, model, marque ..."
                    class="form-control w-75" />
                <input type="submit" value="Chercher" class="btn btn-danger">
            </div>
        </form>
    </div>
    <div class="conatiner mx-5">
        <div class="row">
        <?php $__currentLoopData = $voitures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3 my-3 mx-4">
                <div class="card" style="width: 18rem; height:100%">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($vo->modelVoiture->marqueOrigin->marque); ?>

                            <?php echo e($vo->modelVoiture->model_voiture); ?></h5>
                        <img src="<?php echo e($vo->main_image); ?>" class="img-responsive" style="width:220px" />
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo e($vo->prix); ?> DH</h6>
                        <p class="card-text"><?php echo e($vo->date_mise_en_service); ?></p>
                        <a href="/showDetails/<?php echo e($vo->id); ?>" class="card-link text-center">Consulter</a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </div>
    </div>
<script>
    <?php if(!empty($milleur)): ?>
        var active = document.getElementById('miller');
        active.classList.add('activer');
    <?php elseif(!empty($newCar)): ?>
        var active = document.getElementById('newCar');
        active.classList.add('activer');
    <?php else: ?>
        var active = document.getElementById('homeclient');
        active.classList.add('activer');
    <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.location', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>