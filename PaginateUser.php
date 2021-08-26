<?php

/*
  4. Utilizando a tabela "usuarios" já criada e a conexão via PDO, faça um script php que
  ao ser executado liste os 5 primeiros registros da tabela.

 * Implemente uma paginação
  neste script, onde caso seja passado um parâmetro "p=2" na url, o script deverá
  retornar a "segunda página" da consulta, ou seja, os próximos 5 registros. Caso
  receba "p=3", retorne a "terceira página", ou seja, os próximos 5 registros e assim
  sucessivamente.
 */

error_reporting(E_ALL ^ E_NOTICE);

$regs_per_page = 5; // número de registros por página

$pagina = $_GET['p'];
if (!$pagina) {
    $number_page = 1;
} else {
    $number_page = $pagina;
}

$inicio = $number_page - 1;
$offset = $inicio * $regs_per_page; // 5 * 0 = 0

$user = getUsers($regs_per_page,$offset); // offset é o inicio de onde o registro id vai começar
echo $user;


function getUsers($limit,$offset) {
    try {
        $conn = new PDO('mysql:host=localhost;dbname=marknettest', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM usuarios LIMIT $limit OFFSET  $offset";
        $statement_sql = $conn->prepare($sql);
        $statement_sql->execute();
        while ($row = $statement_sql->fetch()) {
            $nome = $row['nome'];
            $id = $row['id'];
            echo "ID :" . $id . ' Nome  :  ' . $nome . '<br>';
        }
    } catch (PDOException $e) {
        echo 'Erro na conexao com banco ::: ' . $e->getMessage();
    }
}

// *****************************   paginação com links   p=2


$total_registros = getAll();  // total de registros de usuarios
$total_paginas = $total_registros / $regs_per_page; // verifica o número total de páginas
// links da paginação
$anterior = $number_page - 1;
$proximo = $number_page + 1;
if ($number_page > 1) {
    echo " <a href='?p=$anterior'> Anterior </a> ";
}
echo "|";
if ($number_page < $total_paginas) {
    echo " <a href='?p=$proximo'> Próximo </a>";
}

function getAll() {
    try {
        $conn = new PDO('mysql:host=localhost;dbname=marknettest', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement_sql = $conn->query("SELECT * FROM usuarios");
        return $statement_sql->rowCount();
    } catch (PDOException $e) {
        echo 'Erro na conexao com banco ::: ' . $e->getMessage();
    }
}
