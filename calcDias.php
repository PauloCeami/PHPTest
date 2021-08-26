<?php

/*
 * 2. Faça um algoritmo em PHP que receba uma data através de um parâmetro da url, em
  formato brasileiro (dd/mm/YYYY), e calcule a quantidade de dias passados até a
  data atual. A data atual não deve estar fixa no código, deve-se pegar a data atual
  automaticamente no momento em que o script for executado.

 */


date_default_timezone_set('America/Sao_Paulo');

$data_url = formatData($_GET['date']);
$dataAtual = formatData(date('d/m/Y'));
$dif = strtotime($data_url) - strtotime($dataAtual);
$days = floor($dif / (60 * 60 * 24));
echo "Já se passaram ".-$days. " dias.";

function formatData($dataBR) {
    list($day, $month, $year) = explode('/', $dataBR);
    $dateAmeric = $year . "-" . $month . "-" . $day;
    return $dateAmeric;
}
