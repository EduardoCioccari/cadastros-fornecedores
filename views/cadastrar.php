<?php
require_once "../layout/header.php";

?>

<main>
    <form action="../scripts/create.php" method="post" onsubmit="return validarFormulario()" autocomplete="off">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Nome:</span>
                        <input type="text" class="form-control" name="nome_fornecedor" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">CNPJ:</span>
                        <input type="text" class="form-control" id="cnpj_fornecedor" name="cnpj_fornecedor" oninput="mascaraCNPJ(this)" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                    </div>
                    <div id="container-emails">
                        <div class="input-group mb-3">
                            <span class="input-group-text">E-mail:</span>
                            <input type="email" class="form-control" name="email_fornecedor[]" required>
                            <button class="btn btn-outline-secondary" type="button" onclick="adicionarCampo('email')">+</button>
                        </div>
                    </div>
                    <div id="container-telefones">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Telefone:</span>
                            <input type="tel" class="form-control" id="telefone_fornecedor" name="telefone_fornecedor[]" oninput="mascaraCelular(this)" maxlength="15" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            <button class="btn btn-outline-secondary" type="button" onclick="adicionarCampo('tel')">+</button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger btn-lg mt-3">Cadastrar</button>
                </div>
            </div>
        </div>
    </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="../js/mascara_cnpj.js"></script>
<script src="../js/mascara_celular.js"></script>
<script src="../js/validacao_formulario.js"></script>
</body>

</html>