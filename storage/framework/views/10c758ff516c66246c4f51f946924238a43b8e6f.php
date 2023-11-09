<?php $__env->startSection('content'); ?>


<!-- Button trigger modal -->
<button type="button" style="margin-top:15%;" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
  Ajouter utilisateur
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un utilisateur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form" action="/newUser" method="POST">
      <div class="modal-body">
           
                <label for="name">Nom complet:</label>
                <input type="text" name="name" id="name" class="form-control">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control">
                <label for="role">Role:</label>
                <select name="role" id="role" class="form-control">
                    <option value="1">Admin</option>
                    <option value="3">Commercial</option>
                </select>
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                <input type="hidden" name="password" value="123456"/>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Sauvgarder</button>
      </div>
      </form>
    </div>
  </div>
</div>





<table class="table table-striped table-dark" style="margin-top:3%;width:100%">
<thead class="thead-light">
        <tr>
                <th scope="col" style="width:30%">
                    Nom complet:
               </th>
                <th scope="col" style="width:30%">
                    Email:
                </th>
                <th scope="col" style="width:30%">
                    Role:
                </th>
                <th scope="col" style="width:10%">
                    Actions:
                </th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(auth()->user()->id != $user->id): ?>
            <tr scope="row">
                <th><?php echo e($user->name); ?></th>
                <th ><?php echo e($user->email); ?></th>
                <th ><?php echo e($user->roles->name); ?></th>
                <th class="col-md-4">
                    <a href="/showUser/<?php echo e($user->id); ?>"><i class="fa-solid fa-eye text-warning" style="margin-right:3%;"></i></a>
                    <a style="color:rgb(199,0,0);margin-right:3%;" href="/deleteUser/<?php echo e($user->id); ?>" onclick="fon(this)" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-trash"></i></a>
                    <a href="/restorePassword/<?php echo e($user->id); ?>"><i class="fa-solid fa-rotate-right text-info"></i></a>
                </th>
            </tr>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
</table>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Est-ce que vous êtes surs?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Annuler</button>
        <a href="" id="valider"  class="btn btn-danger"><i class="fa-solid fa-trash"></i> Valider</a>
      </div>
    </div>
  </div>
</div>


<?php if(session()->has('success')): ?>
<div class="alert alert-success" onclick="hide(this)" role="alert">
        <?php echo e(session()->get('success')); ?>

</div>
<?php endif; ?>



<script>
     var active = document.getElementById('users');
        active.classList.add('activer');
</script>
<script>
    function fon(rp){
        var btn = rp.href;
        var valider = document.getElementById('valider');
        valider.setAttribute('href',btn);
    }
    function hide(smp){
        smp.setAttribute('hidden',true);
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.location', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>