<?php
require_once "header.php";

$id = $_GET["id"];

// UPDATE nos dados do fornecedor caso seja clicado no botão de edição.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idHidden = $_POST["id_fornecedor"];
    $nome = $_POST["nome_fornecedor"];
    $cnpj = $_POST["cnpj_fornecedor"];
    $email = $_POST["email_fornecedor"];
    $telefone = $_POST["telefone_fornecedor"];

    $sql = "UPDATE fornecedor 
    SET nome_fornecedor = :nome_fornecedor, cnpj_fornecedor = :cnpj_fornecedor, email_fornecedor = :email_fornecedor, telefone_fornecedor = :telefone_fornecedor
    WHERE id_fornecedor = :id_fornecedor";

    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(":id_fornecedor", $idHidden);
    $stmt->bindValue(":nome_fornecedor", $nome);
    $stmt->bindValue(":cnpj_fornecedor", $cnpj);
    $stmt->bindValue(":email_fornecedor", $email);
    $stmt->bindValue(":telefone_fornecedor", $telefone);

    $stmt->execute();

    if ($stmt->execute() == true) {
        echo "Cadastro editado com sucesso.";
    } else {
        echo "Erro na edição.";
    }
}

// SELECT nos dados do fornecedor.
$sql = "SELECT * FROM fornecedor WHERE id_fornecedor = :id";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(":id", $id);
$stmt->execute();
$fornecedor = $stmt->fetch();

?>

<main>
    <form action="" method="post" autocomplete="off">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Nome:</span>
                        <input type="text" class="form-control" name="nome_fornecedor" value="<?php echo $fornecedor['nome_fornecedor'] ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">CNPJ:</span>
                        <input type="text" class="form-control" name="cnpj_fornecedor" value="<?php echo $fornecedor["cnpj_fornecedor"] ?>" minlength="14" maxlength="18" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">E-mail:</span>
                        <input type="email" class="form-control" name="email_fornecedor" value="<?php echo $fornecedor["email_fornecedor"] ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Telefone:</span>
                        <input type="tel" class="form-control" name="telefone_fornecedor" value="<?php echo $fornecedor["telefone_fornecedor"] ?>" maxlength="16" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <button type="submit" class="btn btn-danger btn-lg mt-3">Finalizar edição</button>
                    <input type="hidden" name="id_fornecedor" value="<?php echo $fornecedor["id_fornecedor"] ?>">
                </div>
            </div>
        </div>
    </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>