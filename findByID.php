<?php

/*
3. Crie um banco de dados mysql com uma tabela "usuarios", contendo as colunas "id",
"nome", "login", "senha". Crie um arquivo php que se conecte a esse banco de dados
utilizando PDO. Em seguida faça uma consulta na tabela "usuarios" filtrando pela
coluna "id", que deverá ser igual ao valor recebido através de um parâmetro "id" na
url.
 */


$id = $_GET['id'];

try {
    $conn = new PDO('mysql:host=localhost;dbname=marknettest', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM usuarios WHERE id= :id";
    $statement_sql = $conn->prepare($sql);
    $statement_sql->bindValue(":id", $id);
    $statement_sql->execute();

    while ($row = $statement_sql->fetch(PDO::FETCH_OBJ)) {
        var_dump($row);
    }
} catch (PDOException $e) {
    echo 'Erro na conexao com banco ::: ' . $e->getMessage();
}


