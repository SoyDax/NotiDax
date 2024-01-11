<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">

    <!-- <a class="navbar-brand" href="inicio.php"><img src="https://cdn-icons-png.flaticon.com/512/21/21601.png" height="53.7"></a> -->
    <a class="navbar-brand" href="inicio.php"><img src="admin/img/news.png" height="53.7"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto" style="font-family: 'Montserrat', sans-serif;">
        <li class="nav-item">
          <a class="nav-link" href="admin/dashbord.php">

            <?php

            if (isset($_SESSION['idUsuario'])) {
              echo $_SESSION['usuario'];
            }
            ?>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="inicio.php"><img src="admin/img/homeicon.png" width="20" height="20" class="d-inline-block align-text-top me-2"> Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about-us.php"><img src="admin/img/usericon.png" width="20" height="20" class="d-inline-block align-text-top me-2"> FAQs</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="contact-us.php"><img src="admin/img/contactoicon.png" width="20" height="20" class="d-inline-block align-text-top me-2"> CONTACTOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="calendario_escolar.php"><img src="admin/img/calendaricon.png" width="20" height="20" class="d-inline-block align-text-top me-2"> CALENDARIO ESCOLAR</a>
        </li>
         <!-- //ICONOS NEGROS -->
        <!-- <li class="nav-item">
          <a class="nav-link" href="inicio.php"><img src="https://cdn.icon-icons.com/icons2/1369/PNG/512/-home_90315.png" width="20" height="20" class="d-inline-block align-text-top me-2"> Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about-us.php"><img src="https://cdn.icon-icons.com/icons2/1369/PNG/512/-person_90382.png" width="20" height="20" class="d-inline-block align-text-top me-2"> FAQs</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="contact-us.php"><img src="https://cdn.icon-icons.com/icons2/1369/PNG/512/-contact-phone_90586.png" width="20" height="20" class="d-inline-block align-text-top me-2"> CONTACTOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="calendario_escolar.php"><img src="https://cdn.icon-icons.com/icons2/620/PNG/512/calendar-with-a-clock-time-tools_icon-icons.com_56831.png" width="20" height="20" class="d-inline-block align-text-top me-2"> CALENDARIO ESCOLAR</a>
        </li> -->

<!-- //ICONOS NEGROS -->
        <!-- <li class="nav-item">
            <form class="form-inline" name="search" action="search.php" method="post">
              <input class="form-control mr-sm-2" type="search" name="searchtitle" placeholder="Buscar por..." required>
              <button class="btn btn-secondary" type="submit">Buscar</button>
            </form>
          </li> -->
      </ul>
    </div>
  </div>
  </nav>
  </br>