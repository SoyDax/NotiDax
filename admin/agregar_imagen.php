<?php
include('includes/config.php');

if(isset($_POST['agregar_imagen'])) {
    if(isset($_FILES['nueva_imagen']) && $_FILES['nueva_imagen']['error'] === 0) {
        $imagen_nombre = $_FILES['nueva_imagen']['name'];
        $imagen_tipo = $_FILES['nueva_imagen']['type'];
        $imagen_tamano = $_FILES['nueva_imagen']['size'];
        $imagen_temporal = $_FILES['nueva_imagen']['tmp_name'];
        
        $permitidos = array('image/jpeg', 'image/jpg', 'image/png');
        if(in_array($imagen_tipo, $permitidos)) {
            $ruta_destino = "../images/" . $imagen_nombre;
            move_uploaded_file($imagen_temporal, $ruta_destino);
            
            // INSERTAR la información de la imagen en la base de datos
            $query = "INSERT INTO carrusel_images (image_path) VALUES ('$imagen_nombre')";
            
            if(mysqli_query($con, $query)) {
                // La imagen se ha guardado correctamente, redireccionar a la página principal o mostrar un mensaje de éxito
                header("Location: carrusel.php");
                exit();
            } else {
                // Ocurrió un error al ejecutar la consulta SQL, mostrar un mensaje de error
                echo "Error al guardar la imagen en la base de datos.";
            }
        } else {
            echo "Error: El archivo seleccionado no es una imagen válida.";
        }
    } else {
        echo "Error: Debes seleccionar una imagen.";
    }
} else {
    header("Location: carrusel.php");
    exit();
}
?>
