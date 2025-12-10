<?php
require_once "header.php";

?>

<main>
    <form action="create.php" method="post" autocomplete="off">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Nome:</span>
                        <input type="text" class="form-control" name="nome_fornecedor" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">CNPJ:</span>
                        <input type="text" class="form-control" name="cnpj_fornecedor" minlength="14" maxlength="18" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">E-mail:</span>
                        <input type="email" class="form-control" name="email_fornecedor" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Telefone:</span>
                        <input type="tel" class="form-control" name="telefone_fornecedor" maxlength="16" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <button type="submit" class="btn btn-danger btn-lg mt-3">Cadastrar</button>
                </div>
            </div>
        </div>
    </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>