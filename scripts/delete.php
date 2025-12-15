<?php

require_once "../config/db_conexao.php";

$id = $_GET["id"];

$sql = "DELETE FROM fornecedor WHERE id_fornecedor = :id_fornecedor";

$stmt = $conexao->prepare($sql);
$stmt->bindValue(":id_fornecedor", $id);

$stmt->execute();

header("location: ../index.php?msg=excluido");
exit();
