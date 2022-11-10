<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


$table = "";
if (isset($enrollments)) {
    foreach ($enrollments as $item) {
        $table .= '
             <tr>
                <td style="width: 300px; height: 25px; text-align: center;">' . $item->studentName()->studentName->student_name . '</td>
                <td style="width: 300px; height: 25px; text-align: center;">' . date("d/m/Y", strtotime($item->studentName()->studentName->student_birth)) . '</td>
                <td style="width: 400px; height: 25px; text-align: center;"></td>
            </tr>
    ';
    }
}

$html = '
<html>
<head>
<title>Lista de chamada ' . $classes->classes_description . " - " . $classes->classes_year . '</title>
    <style>
        @page  {
            margin: 10px 0;
        }
        body{
            margin: 0;
            padding: 0;
            font-family: "Open Sans", sans-serif;
            font-size: 12px;
        }
        .content{
            padding: 0 20px;
        }
        .container{
            margin-bottom: 10px;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
        }
     
        
    </style>
</head>
<body>
<div class="content">
    <div class="section">
        <div class="container">
            <h3 style="text-align: center">Turma: ' . $classes->classes_description . " - " . $classes->classes_year . '</h3>
            <h3 style="text-align: right">Data: ' . date("d/m/Y") . '</h3>
        </div>
        <hr/>
        <div class="container">
        <table>
            <thead>
                <tr>
                    <th scope="col" style="width: 300px; height: 25px; text-align: center;">Nome</th>
                    <th scope="col" style="width: 300px; height: 25px; text-align: center;">Nascimento</th>
                    <th scope="col" style="width: 400px; height: 25px; text-align: center;">Chamada</th>
                </tr>
            </thead>
            <tbody>
                ' . $table . '
            </tbody>        
        </table>
        </div>        
    </div>
</div>
</body>
</html>';


use Dompdf\Dompdf;
use Dompdf\Options;

require __DIR__ . " /../../../vendor /autoload.php";

$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper("A4", "landscape");
$dompdf->render();
$dompdf->stream("pedido . pdf", ["Attachment" => false]);

