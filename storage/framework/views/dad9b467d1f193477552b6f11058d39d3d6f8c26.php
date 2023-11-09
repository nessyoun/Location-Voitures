
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/cover/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('css/cover.css')); ?>" rel="stylesheet">
    <style>
        .image-bd {
            background-image : url("<?php echo e(asset('storage/img/acceuil.jpg')); ?>");
            background-repeat: no-repeat;
            background-size: cover; 
        }
    </style>
  </head>

  <body class="text-center">
    <div class="conatiner-fluid image-bd w-100">
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand"><?php echo e(config('app.name', 'Laravel')); ?></h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="#">Home</a>
            <a class="nav-link" href="/login">Login</a>
            <a class="nav-link" href="/register">Register</a>
          </nav>
        </div>
      </header>

      <main role="main" class="inner cover">
        <h1 class="cover-heading"><?php echo e(config('app.name', 'Laravel')); ?></h1>
        <p class="lead">Le Mieulleur choix pour une location et le premier choix pour la fidilité</p>
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>Tous les droits sont réservés.</p>
        </div>
      </footer>
    </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  
</body>
</html>
