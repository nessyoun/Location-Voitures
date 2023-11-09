<?php $__env->startSection('content'); ?>
<a class="nav-link nav-top" id="consulter" href="/Demandes">Voir demandes</a>
    <div class="container bg-light h-50 w-75" style="margin-top:10%">
        <div id="calendar">
            <!-- Le calendrier sera affiché ici -->
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    <?php $__currentLoopData = $reservation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        {

                            title: "<?php echo e($res->Voiture->modelVoiture->model_voiture); ?> <?php echo e($res->client->user->name); ?> <?php echo e($res->etat->etat); ?>",
                            start: "<?php echo e($res->date_debut); ?>",
                            end: "<?php echo e($res->date_fin); ?>"
                        },
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ]
            });
            calendar.render();
        });
    </script>


    <script>
        var active = document.getElementById('calendrieradmin');
        active.classList.add('activer');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.location', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>