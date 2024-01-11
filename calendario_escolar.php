<?php
// Ruta al archivo PDF
$pdfFilePath = 'pdf/Calendario_Academico_Ciclo_Escolar_2022-2023.pdf';

// Verificar si el archivo existe
if (file_exists($pdfFilePath)) {
    // Enviar las cabeceras del archivo PDF al navegador
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="Calendario_Academico_Ciclo_Escolar_2022-2023.pdf"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');

    // Leer y mostrar el contenido del archivo PDF
    readfile($pdfFilePath);
} else {
    // Mostrar un mensaje de error si el archivo no existe
    echo "El archivo PDF no se encuentra disponible.";
}
