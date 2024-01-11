<?php
session_start();
include('includes/config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>FAQS</title>

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">
  
</head>

<body>

  <!-- Navigation -->
  <?php include('includes/header.php'); ?>
  <!-- Page Content -->
  <div class="container">

    <?php
    $pagetype = 'aboutus';
    $query = mysqli_query($con, "select PageTitle,Description from tblpages where PageName='$pagetype'");
    while ($row = mysqli_fetch_array($query)) {

      ?>
      <h1 class="mt-4 mb-3">
        <?php echo htmlentities($row['PageTitle']) ?>

      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="inicio.php">Inicio</a>
        </li>
        <li class="breadcrumb-item active">FAQS</li>
      </ol>

      <!-- Intro Content -->
      <div class="row">

        <div class="col-lg-12">
          <!-- Collapsable Card Example -->
          <!-- <div class="card shadow mb-4"> -->
                                <!-- Card Header - Accordion -->
                                <!-- <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary">Collapsable Card Example</h6>
                                </a> -->
                                <!-- Card Content - Collapse -->
                                <!-- <div class="collapse show" id="collapseCardExample">
                                    <div class="card-body">
                                        This is a collapsable card example using Bootstrap's built in collapse
                                        functionality. <strong>Click on the card header</strong> to see the card body
                                        collapse and expand!
                                    </div>
                                </div>
                            </div>
             -->
        
        <div id="accordion" class="row">
        <div class="col-md-6">
      <div class="card shadow mb-4">
        <a href="#collapseOne" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseOne">
          <h6 class="m-0 font-weight-bold text-primary">¿Qué tipo de información puedo encontrar en el sitio web de noticias de nuestra universidad?</h6>
        </a>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body">
            Nuestro sitio web de noticias proporciona información actualizada y precisa sobre eventos y actividades escolares, como conferencias, seminarios, talleres, competiciones y más. También encontrarás noticias relevantes sobre logros destacados de estudiantes y profesores.
          </div>
        </div>
      </div>
      </div>

      <div class="col-md-6">
      <div class="card shadow mb-4">
        <a href="#collapseTwo" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseTwo">
          <h6 class="m-0 font-weight-bold text-primary">¿Cómo puedo publicar mis noticias o logros en el sitio web?</h6>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
          <div class="card-body">
            Para publicar tus noticias y logros en nuestro sitio web, simplemente regístrate como usuario y accede a la sección de publicación de noticias. Allí podrás enviar tus artículos y logros, que serán revisados por nuestro equipo editorial antes de ser publicados.
          </div>
        </div>
      </div>
      </div>

      <div class="col-md-6">
      <div class="card shadow mb-4">
        <a href="#collapseThree" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseThree">
          <h6 class="m-0 font-weight-bold text-primary">¿Existe algún requisito o formato específico para enviar noticias o logros?</h6>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
          <div class="card-body">
            Sí, al enviar tus noticias o logros, te recomendamos seguir ciertas pautas para garantizar la calidad y coherencia de la información. Deberás proporcionar detalles relevantes, imágenes o videos relacionados (si los tienes) y asegurarte de que la información sea precisa y verificable.
          </div>
        </div>
      </div>
      </div>

      <div class="col-md-6">
      <div class="card shadow mb-4">
        <a href="#collapseFour" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseFour">
          <h6 class="m-0 font-weight-bold text-primary">¿Puedo participar en las discusiones y debates sobre los temas publicados en el sitio web?</h6>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
          <div class="card-body">
            ¡Por supuesto! Queremos fomentar la participación activa de los estudiantes y miembros de la comunidad en nuestro sitio web. En cada artículo publicado, encontrarás una sección de comentarios donde puedes compartir tus ideas, opiniones y participar en debates con otros usuarios.
          </div>
        </div>
      </div>
      </div>

      <div class="col-md-6">
      <div class="card shadow mb-4">
        <a href="#collapseFive" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseFive">
          <h6 class="m-0 font-weight-bold text-primary">¿Cómo puedo iniciar un nuevo tema de discusión en el sitio web?</h6>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
          <div class="card-body">
            Para iniciar un nuevo tema de discusión, puedes utilizar la sección "Noticias" en nuestro sitio web. Allí encontrarás diferentes categorías o temas de discusión relacionados con la escuela y la comunidad. Simplemente selecciona la categoría apropiada y crea un nuevo hilo de discusión para compartir tus ideas y opiniones.
          </div>
        </div>
      </div>
      </div>

      <div class="col-md-6">
      <div class="card shadow mb-4">
        <a href="#collapseSix" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseSix">
          <h6 class="m-0 font-weight-bold text-primary">¿Cómo garantizan la privacidad y los derechos de los estudiantes y el personal escolar en el sitio web?</h6>
        </a>
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
          <div class="card-body">
            Respetamos y valoramos la privacidad y los derechos de todos los usuarios del sitio web. Todos los artículos y publicaciones se revisan antes de ser publicados para asegurar que no se infrinjan derechos o se revele información personal sin consentimiento. Además, contamos con políticas y medidas de seguridad para proteger la privacidad de nuestros usuarios.
          </div>
        </div>
      </div>
      </div>

      <div class="col-md-6">
      <div class="card shadow mb-4">
        <a href="#collapseSeven" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseSeven">
          <h6 class="m-0 font-weight-bold text-primary">¿Qué debo hacer si tengo preguntas o inquietudes y necesito comunicarme con los administradores del sitio web?</h6>
        </a>
        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
          <div class="card-body">
            Si tienes alguna pregunta, inquietud o sugerencia, puedes ponerte en contacto con nuestros administradores a través de la sección de "Contacto" en nuestro sitio web. Allí encontrarás un formulario de contacto que puedes completar para enviarnos tus mensajes. Nos esforzamos por responder a todas las consultas en un plazo razonable.
          </div>
        </div>
      </div>
      </div>

    </div>
 
  
          <p>
            <!-- <?php echo $row['Description']; ?> -->
          </p>
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

    <!-- Referencias a los archivos de Bootstrap -->


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