<?php
session_start();
include('includes/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los datos del formulario
  $nombre = $_POST['nombre'];
  $correo = $_POST['correo'];
  $numero_control = $_POST['numero_control'];
  $asunto = $_POST['asunto'];
  $mensaje = $_POST['mensaje'];

  // Enviar el correo
  $to = 'l19300846@villahermosa.tecnm.mx';
  $subject = 'Mensaje de contacto';
  $message = "Nombre: $nombre\nCorreo: $correo\nNúmero de Control: $numero_control\nAsunto: $asunto\nMensaje: $mensaje";
  $headers = "From: $correo";

  if (mail($to, $subject, $message, $headers)) {
    $success_message = "¡Gracias por tu mensaje! Nos pondremos en contacto contigo pronto.";
  } else {
    $error_message = "Hubo un error al enviar el mensaje. Por favor, inténtalo de nuevo.";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Contactanos</title>

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>

  <!-- Navigation -->
  <?php include('includes/header.php'); ?>
  <!-- Page Content -->
  <div class="container">

    <?php
    $pagetype = 'contactus';
    $query = mysqli_query($con, "select PageTitle,Description from tblpages where PageName='$pagetype'");
    while ($row = mysqli_fetch_array($query)) {

    ?>
      <h1 class="mt-4 mb-3">
        Detalles de Contacto
      </h1>


      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="inicio.php">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Contáctanos</li>
      </ol>

      <!-- Intro Content -->
      <div class="row">
        <div class="col-lg-6">



          <?php if (isset($success_message)) { ?>
            <div class="alert alert-success" role="alert">
              <?php echo $success_message; ?>
            </div>
          <?php } ?>

          <?php if (isset($error_message)) { ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $error_message; ?>
            </div>
          <?php } ?>

          <form method="POST" action="">
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
              <label for="correo">Correo electrónico</label>
              <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="form-group">
              <label for="numero_control">Número de Control</label>
              <input type="text" class="form-control" id="numero_control" name="numero_control" required>
            </div>
            <div class="form-group">
              <label for="asunto">Asunto</label>
              <input type="text" class="form-control" id="asunto" name="asunto" required>
            </div>
            <div class="form-group">
              <label for="mensaje">Mensaje</label>
              <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
        </div>

        <div class="col-lg-6">
          <h2>Ubicación</h2>
          <div class="embed-responsive embed-responsive-16by9">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3794.046379243642!2d-92.90776017304691!3d18.023051100000025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85edd879239171bd%3A0xae9e157e4228aad3!2sTecNM%20-%20Campus%20Villahermosa!5e0!3m2!1ses-419!2smx!4v1684730528453!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

          </div>
          <p>Si quieres expresar alguna recomendación o estás interesado en aportar a una noticia que consideres importante, rellena nuestro formulario y nos pondremos en contacto contigo lo antes posible.</p>
          <ul>
            <li>Email: <a href="mailto:contacto@tecnm.mx">contacto@tecnm.mx</a></li>
            <li>Teléfono: 9933530259</li>
          </ul>
        </div>

      </div>
      <!-- /.row -->
    <?php } ?>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include('includes/footer.php'); ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Código JavaScript para inicializar los dropdowns -->
  <script>
    // Inicializar todos los dropdowns
    var dropdowns = document.querySelectorAll('.dropdown-toggle');
    dropdowns.forEach(function(dropdown) {
      dropdown.addEventListener('click', function() {
        var dropdownMenu = this.nextElementSibling;
        if (dropdownMenu.style.display === 'block') {
          dropdownMenu.style.display = '';
        } else {
          dropdownMenu.style.display = 'block';
        }
      });
    });
  </script>

</body>

</html>