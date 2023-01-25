<?php
use Dompdf\Dompdf;

$dompdf = new Dompdf();

$html = "<table border='1'>";
$html .= "<thead>";
$html .= "<tr>";
$html .= "<td>Id:</td>";
$html .= "<td>Dia:</td>";
$html .= "<td>Nome:</td>";
$html .= "<td>Url da imagem:</td>";
$html .= "<td>Local:</td>";
$html .= "<td></td>";
$html .= "</tr>";
$html .= "</thead>";

foreach ($shows as $show) {
    $html .= "<tbody>";
    $html .= '<tr><td>' . $show->id . "</td>";
    $html .= '<td>' . $show->day . "</td>";
    $html .= '<td>' . $show->name . "</td>";
    $html .= '<td>' . $show->image . "</td>";
    $html .= '<td>' . $show->local . "</td></tr>";
    $html .= "</tbody>";
}

$html .= '</table>';

$dompdf->loadHtml(
    '
    <h1>Lista de Shows do sistema</h1>
     '. $html .'
');

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream("showsPdf");