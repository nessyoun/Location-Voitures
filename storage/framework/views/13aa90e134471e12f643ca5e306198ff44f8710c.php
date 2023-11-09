<?php $__env->startSection('container'); ?>
<div class="container w-75 my-5 text-white">
    <form method="POST" action="/ajouterVoiture" enctype="multipart/form-data">
    <div class="form-group">
        <label for="date_de_mise_en_service">Date de mise en service</label>
        <input type="date" class="form-control" id="date_de_mise_en_service" name="date_de_mise_en_service">
    </div>
    <div class="form-group">
        <label for="prix">Prix (Double)</label>
        <input type="number" step="0.01" class="form-control" id="prix" name="prix">
    </div>
    <div class="form-group">
        <label for="model">Modèle</label>
        <select class="form-control" id="model" name="model">
        <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($model->id); ?>"><?php echo e($model->marqueOrigin->marque); ?> <?php echo e($model->model_voiture); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group">
        <label for="images">Images (plusieurs fichiers .png)</label>
        <input type="file" class="form-control-file" id="images" name="images[]" multiple accept=".png">
    </div>
    <div class="form-group">
        <label for="main_image">Image principale (fichier .png)</label>
        <input type="file" class="form-control-file" id="main_image" name="mainimage">
    </div>
    <div class="form-group">
        <label for="agence">Agence</label>
        <select class="form-control" id="agence" name="agence">
        <?php $__currentLoopData = $agences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agence): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($agence->id); ?>"><?php echo e($agence->nom); ?></option>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
    <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-floppy-disk"></i> Enregistrer</button>
    </form>
</div>
<script>
    var disabled = document.getElementById('ajouter');
    disabled.classList.add('disabled');
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.voitures', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>