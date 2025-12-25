<?php
require_once "../layout/header.php";
require_once "../config/db_conexao.php";
require_once "../scripts/update.php";
$id = $_GET["id"];

// SELECT nos dados do fornecedor.
$sql = "SELECT * FROM fornecedor WHERE id_fornecedor = :id";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(":id", $id);
$stmt->execute();
$fornecedor = $stmt->fetch();

?>

<main>
    <!-- Retorno do sucesso ou erro na edição -->
    <?php if (isset($mensagemSucesso)): ?>
        <div class="alert alert-success col-3 m-auto mb-2" role="alert">
            <?php echo $mensagemSucesso; ?>
        </div>
    <?php endif; ?>

    <?php if (isset($mensagemErro)): ?>
        <div class="alert alert-danger col-3 m-auto mb-2" role="alert">
            <?php echo $mensagemErro; ?>
        </div>
    <?php endif; ?>
    <form action="" method="post" onsubmit="return validarFormulario()" autocomplete="off">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Nome:</span>
                        <input type="text" class="form-control" name="nome_fornecedor" value="<?php echo $fornecedor['nome_fornecedor'] ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">CNPJ:</span>
                        <input type="text" class="form-control" id="cnpj_fornecedor" name="cnpj_fornecedor" oninput="mascaraCNPJ(this)" minlength="18" value="<?php echo $fornecedor["cnpj_fornecedor"] ?>" minlength="14" maxlength="18" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">E-mail:</span>
                        <input type="email" class="form-control" id="email_fornecedor" name="email_fornecedor" value="<?php echo $fornecedor["email_fornecedor"] ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Telefone:</span>
                        <input type="tel" class="form-control" id="telefone_fornecedor" name="telefone_fornecedor" oninput="mascaraCelular(this)" value="<?php echo $fornecedor["telefone_fornecedor"] ?>" maxlength="16" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <button type="submit" class="btn btn-danger btn-lg mt-3">Finalizar edição</button>
                    <input type="hidden" name="id_fornecedor" value="<?php echo $fornecedor["id_fornecedor"] ?>">
                </div>
            </div>
        </div>
    </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="../js/mascara_cnpj.js"></script>
<script src="../js/mascara_celular.js"></script>
<script src="../js/validacao_formulario.js"></script>
<script src="../js/mascaras.js"></script>
</body>

</html>