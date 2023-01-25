<?php
use Dompdf\Dompdf;

$dompdf = new Dompdf();

$html = "<table border='1'>";
$html .= "<thead>";
$html .= "<tr>";
$html .= "<td>Id:</td>";
$html .= "<td>Nome:</td>";
$html .= "<td>Email:</td>";
$html .= "<td>Tipo de Usuário:</td>";
$html .= "<td></td>";
$html .= "</tr>";
$html .= "</thead>";

foreach ($users as $user) {
    $html .= "<tbody>";
    $html .= '<tr><td>' . $user->id . "</td>";
    $html .= '<td>' . $user->name . "</td>";
    $html .= '<td>' . $user->email . "</td>";
    $html .= '<td>' . $user->type . "</td></tr>";
    $html .= "</tbody>";
}

$html .= '</table>';

$dompdf->loadHtml(
    '
    <h1>Lista de Usuários do sistema</h1>
     '. $html .'
');

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream("usersPdf");