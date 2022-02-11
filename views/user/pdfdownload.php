<?php


require_once '../../dompdf/autoload.inc.php';
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();
 $html = file_get_contents("http://localhost:8080/bms/views/user/pdfview.php");
// Load HTML content  
    $dompdf->loadHtml($html); 
     // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'potrait'); 
    // Render the HTML as PDF 
    $dompdf->render();
    // Output the generated PDF to Browser 
    // Output the generated PDF (1 = download and 0 = preview) 
    $dompdf->stream("mypdf", array("Attachment" => 0));