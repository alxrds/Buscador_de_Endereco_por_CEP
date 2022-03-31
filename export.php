<?php

include 'conn.php';

function limpaString($str) { 

    $str = preg_replace('/[áàãâä]/ui', 'A', $str);
    $str = preg_replace('/[éèêë]/ui', 'E', $str);
    $str = preg_replace('/[íìîï]/ui', 'I', $str);
    $str = preg_replace('/[óòõôö]/ui', 'O', $str);
    $str = preg_replace('/[úùûü]/ui', 'U', $str);
    $str = preg_replace('/[ç]/ui', 'C', $str);
    return $str;
    
}

$dadosXls  = "";
$dadosXls .= "<table border='1'>";
$dadosXls .=    "<tr>";
$dadosXls .=        "<th>ID</th>";
$dadosXls .=        "<th>CEP</th>";
$dadosXls .=        "<th>LOGRADOURO</th>";
$dadosXls .=        "<th>BAIRRO</th>";
$dadosXls .=        "<th>LOCALIDADE</th>";
$dadosXls .=        "<th>UF</th>";
$dadosXls .=    "</tr>";

$stmt = $conn->prepare('SELECT * FROM `tbl_cep`');
$stmt->execute();

while($row = $stmt->fetch()){

    $dadosXls .=        "<tr>";
    $dadosXls .=            "<td>".limpaString(strtoupper($row['id']))."</td>";
    $dadosXls .=            "<td>".limpaString(strtoupper($row['cep']))."</td>";
    $dadosXls .=            "<td>".limpaString(strtoupper($row['logradouro']))."</td>";
    $dadosXls .=            "<td>".limpaString(strtoupper($row['bairro']))."</td>";
    $dadosXls .=            "<td>".limpaString(strtoupper($row['localidade']))."</td>";
    $dadosXls .=            "<td>".limpaString(strtoupper($row['uf']))."</td>";
    $dadosXls .=        "</tr>";
}

$dadosXls .= "</table>";

$arquivo = "export-".date('Y-m-d').".xls";
header('Content-Type: text/html; charset=iso-8859-1');
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Description: File Transfer");
session_cache_limiter("must-revalidate");
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment;filename="'.$arquivo.'"');

echo $dadosXls;

exit;