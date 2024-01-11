<footer class="py-4 bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h4 class="mb-4">Noticias recientes</h4>
        <?php
        if (!defined('DB_SERVER')) {
          include('includes/config.php');
        }

        // Obtener los 5 elementos de noticias más recientes
        $query = mysqli_query($con, "SELECT * FROM tblposts ORDER BY id DESC LIMIT 5");
        while ($row = mysqli_fetch_array($query)) {
          // Acceder a los datos de cada noticia
          $postTitle = $row['PostTitle'];
          $postId = $row['id'];
          // ...
          // Mostrar los títulos de las noticias como enlaces
          echo '<p><a href="news-details.php?nid=' . $postId . '" style="color: inherit; text-decoration: none;">' . substr($postTitle, 0, 50) . '...</a></p>';
        }
        ?>
      </div>
      <div class="col-md-4">
        <h4 class="mb-4">Categorías de noticias</h4>
        <?php
        // Obtener las 5 categorías de noticias
        $query = mysqli_query($con, "SELECT * FROM tblcategory ORDER BY id LIMIT 5");
        while ($row = mysqli_fetch_array($query)) {
          // Acceder a los datos de cada categoría
          $categoryName = $row['CategoryName'];
          $categoryId = $row['id'];
          // ...
          // Mostrar los nombres de las categorías como enlaces
          echo '<p><a href="category.php?catid=' . $categoryId . '" style="color: inherit; text-decoration: none;">' . $categoryName . '</a></p>';
        }
        ?>
      </div>
      <div class="col-md-4">
        <h4 class="mb-4">Derechos de autor</h4>
        <p class="m-0 text-white">&copy; ITVH NotiDax 2023</p>
      </div>
    </div>
  </div>
  <!-- /.container -->
</footer>