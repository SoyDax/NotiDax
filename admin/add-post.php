<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

// For adding post  
if(isset($_POST['submit']))
{
    $usuarioname=$_POST['username'];
    $usuarioimg=$_POST['useravatar'];
$posttitle=$_POST['posttitle'];
$catid=$_POST['category'];
$subcatid=$_POST['subcategory'];
$postdetails=$_POST['postdescription'];
$arr = explode(" ",$posttitle);
$url=implode("-",$arr);
$imgfile=$_FILES["postimage"]["name"];
// get the image extension
$extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Formato invalido. Acepta jpg / jpeg/ png /gif de formato');</script>";
}
else
{
//rename the image file
$imgnewfile=md5($imgfile).$extension;
// Code for move image into directory
move_uploaded_file($_FILES["postimage"]["tmp_name"],"postimages/".$imgnewfile);

$status=1;
$query=mysqli_query($con,"insert into tblposts(PostTitle,CategoryId,SubCategoryId,PostDetails,PostUrl,Is_Active,PostImage,nombreUser, userImagen) values('$posttitle','$catid','$subcatid','$postdetails','$url','$status','$imgnewfile','$usuarioname','$usuarioimg')");
if($query)
{
$msg="Noticia agregada con exito";
}
else{
$error="Sucedio un error . Porfavor intente de nuevo.";    
} 

}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NOTICIAS</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- ALERTAS -->
    <link rel="stylesheet" type="text/css" href="alert/dist/sweetalert2.min.css">

    <link href="../fancybox-master/dist/jquery.fancybox.min.css" rel="stylesheet" />

    <script>
function getSubCat(val) {
  $.ajax({
  type: "POST",
  url: "get_subcategory.php",
  data:'catid='+val,
  success: function(data){
    $("#subcategory").html(data);
  }
  });
  }
  </script>

</head>

<body id="page-top">

   
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">NotiDax</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashbord.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MENU
            </div>

               <!-- Nav Item - NOTICIAS -->
             <li class="nav-item">
                <a class="nav-link" href="manage-posts.php">
                    <i class="fa-solid fa-file"></i>
                    <span>NOTICIAS</span></a>
            </li>

            <?php if ($_SESSION['rol'] == 1) { ?>
            <!-- Nav Item - COMENTARIOS -->
            <li class="nav-item">
                <a class="nav-link" href="comentarios.php">
                    <i class="fa-sharp fa-solid fa-comments"></i>
                    <span>COMENTARIOS</span></a>
            </li>

            <!-- Nav Item - USUARIOS -->
              <li class="nav-item">
                <a class="nav-link" href="usuarios.php">
                    <i class="fa-sharp fa-solid fa-user"></i>
                    <span>USUARIOS</span></a>
            </li>          
            <?php } ?>
            <li class="nav-item">
                    <a class="nav-link" href="../index.php">
                        <i class="fa-sharp fa-solid fa-house"></i>
                        <span>FRONT</span></a>
                </li>
          
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa- sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['usuario'];
                                ?></span>
                                <img class="img-profile rounded-circle" src="userimagenes/<?php echo $_SESSION['avatar']; ?>" width="30px">
                                <!-- <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg"> -->
                            </a>
                            <!-- Dropdown - INFORMACION DE USUARIO -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Hola Admin
                                </a>
                                <a class="dropdown-item" href="change-password.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cambiar contraseña
                                </a>
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" >

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">AÑADIR NOTICIAS</h1>
                    <p class="mb-4">Aqui puede añadir las noticias 
                          </p>


<div class="col-sm-6">  
<!---Success Message--->  
<?php if($msg){ ?>
<div class="alert alert-success" role="alert">
<strong>Hecho!</strong> <?php echo htmlentities($msg);?>
</div>
<?php } ?>

<!---Error Message--->
<?php if($error){ ?>
<div class="alert alert-danger" role="alert">
<strong>Oh no!</strong> <?php echo htmlentities($error);?></div>
<?php } ?>
</div>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-2">
                        <div class="card-header py-3">
                            <thead>
                            <tr>
                                <th>
                                        <a href="manage-posts.php" class="btn btn-success btn-icon-split" >
                                            <span class="icon text-white-50">
                                            <i class="fa-solid fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Regresar a Noticias</span>
                                        </a>
                                        <?php if ($_SESSION['rol'] == 1) { ?>
                                        <a href="manage-categories.php" class="btn btn-primary btn-icon-split" >
                                            <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Categorias</span>
                                        </a>

                                        <a href="manage-subcategories.php" class="btn btn-secondary btn-icon-split" >
                                            <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Sub Categorias</span>
                                        </a>
                                        <?php } ?>

                            </div>
                                        
                                </th>
                        </tr>
                           </thead>

                           
                            <div class="col-md-10 col-md-offset-1">
                                <div class="p-6">
                                    <div class="">
<form name="addpost" method="post" enctype="multipart/form-data">

<div class="form-group m-b-20">
<label for="exampleInputEmail1"> </label>
<h5 class="card-title text-secondary "><strong>Autor: </strong>
<img class="img-profile rounded-circle" src="userimagenes/<?php echo $_SESSION['avatar']; ?>" width="30px"></h5>
<input type="text" readonly="readonly" class="form-control" id="username" value="<?php echo $_SESSION['usuario'];?>" 
name="username" placeholder="Escribe el titulo" required>

<input type="hidden" readonly="readonly" class="form-control" id="useravatar" value="<?php echo $_SESSION['avatar'];?>" 
name="useravatar" placeholder="Escribe el titulo" required>
</div>


 <div class="form-group m-b-20">
<label for="exampleInputEmail1"> </label>
<h5 class="card-title text-info "><strong>Titulo de la noticia: </strong></h5>
<input type="text" class="form-control" id="posttitle" name="posttitle" placeholder="Escribe el titulo" required>
</div>



<div class="form-group m-b-20">

<h5 class="card-title">Categoria:</h5>
<select class="form-control" name="category" id="category" onChange="getSubCat(this.value);" required>
<option value="">Selecciona la Categoria </option>
<?php
// Feching active categories
$ret=mysqli_query($con,"select id,CategoryName from  tblcategory where Is_Active=1");
while($result=mysqli_fetch_array($ret))
{    
?>
<option value="<?php echo htmlentities($result['id']);?>"><?php echo htmlentities($result['CategoryName']);?></option>
<?php } ?>

</select> 
</div>
    
<div class="form-group m-b-20">

<h5 class="card-title">Sub Categoria:</h5>
<select class="form-control" name="subcategory" id="subcategory" required>

</select> 
</div>
         

<div class="row">
<div class="col-sm-12">
 <div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Descripcion de la Noticia:</b></h4>
<textarea class="editor1" id="editor1" name="postdescription" required></textarea>

</div>
</div>
</div>


<div class="row">
<div class="col-sm-12">
 <div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Subir portada de la noticia:</b></h4>
<input type="file" class="form-control" id="postimage" name="postimage"  required>
</div>
</div>
</div>

                <!-- DataTales Example -->
                <div class="card shadow mb-2">
                        <div class="card-header py-3">
                            <thead>
                            <tr>
                                <th>
                                <a href="#" class="btn btn-success btn-icon-split" >
                                <span class="icon text-white-50">
                                 <i class="fas fa-check"></i>
                                 </span>
                                 <button type="submit" name="submit" class="btn btn-success ">Guardar y publicar</button>
                                </a>


                                <a href="#" class="btn btn-danger btn-icon-split" >
                                <span class="icon text-white-50">
                                 <i class="fas fa-trash"></i>
                                 </span>
                                 <button type="button" class="btn btn-danger">Descartar</button>
                                </a>
                    

                                        
                        </th>
                        </tr>
                           </thead>
                           </div> 
                           </div>
 
                                        </form>
                                        
                                    </div>
                                </div> <!-- end p-20 -->

                                
                            </div> <!-- end col -->
                        
                            </div> <!-- end row -->  
                      

                    </div> 
                    </div> 

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Seguro quiere Salir? <?php echo $_SESSION['usuario'];
                                ?> </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona "Salir" para cerrar la sesion.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="logout.php">Salir</a>
                </div>
            </div>
        </div>
    </div>

   


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

     <!-- Funciones Ajax -->
    <script src="js/funciones.js" crossorigin="anonymous"></script>
    <script src="js/jquery-1.6.2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Iconos -->
    <script src="https://kit.fontawesome.com/1fb2d410de.js" crossorigin="anonymous"></script>

    <script src="../fancybox-master/dist/jquery.fancybox.min.js"></script>

    <!-- Editor de Textos -->
    <script src="ckeditor/ckeditor.js"></script>

    <script >
        CKEDITOR.replace('editor1', {
  extraAllowedContent: 'img[class,fancybox]'
});
   </script>

   <!-- Alertas -->
    <script src="alert/dist/sweetalert2.all.min"></script>
</body>

</html>
<?php } ?>