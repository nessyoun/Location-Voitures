<?php $__env->startSection('content'); ?>
<form action="/UpdateUser" method="post" onsubmit="return validatePassword()" class="my-5 mx-5 text-white w-75">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" required class="form-control" value="<?php echo e(auth()->user()->name); ?>"><br><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required  class="form-control" value="<?php echo e(auth()->user()->email); ?>"><br><br>

        <label for="new-password">Nouveau mot de passe :</label>
        <input type="password" id="new-password" name="new-password" required class="form-control"><br><br>

        <label for="confirm-password">Confirmer le mot de passe :</label>
        <input type="password" id="confirm-password" name="confirm-password" required class="form-control">
        <span id="password-error" style="color: red;"></span><br><br>
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <input type="hidden" name="id" value="<?php echo e(auth()->user()->id); ?>">
        <input type="submit" value="Enregistrer" class="btn btn-outline-primary w-25">
        <input type="reset" value="Réinitialiser" class="btn btn-secondary w-25">
</form>
<script>
        function validatePassword() {
            var newPassword = document.getElementById("new-password").value;
            var confirmPassword = document.getElementById("confirm-password").value;
            var errorSpan = document.getElementById("password-error");

            if (newPassword !== confirmPassword) {
                errorSpan.innerHTML = "Les mots de passe ne correspondent pas.";
                return false;
            } else {
                errorSpan.innerHTML = "";
                return true;
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.location', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>