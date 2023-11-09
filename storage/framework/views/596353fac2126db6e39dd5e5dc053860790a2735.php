<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link nav-top" id="consulter" href="/voitures/consulter">Consulter</a>
            </li>
            <li class="nav-item">
                <a class="nav-top nav-link" id="ajouter" href="/voitures/ajouter">Ajouter nouveau</a>
            </li>
        </ul>
    </div>
    <?php echo $__env->yieldContent('container'); ?>
</div>
<script>
     var active = document.getElementById('voitureadmin');
        active.classList.add('activer');
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.location', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>