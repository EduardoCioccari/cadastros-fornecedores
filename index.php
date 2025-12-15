<?php
require_once "layout/header.php";
require_once "config/db_conexao.php";

$sql = "SELECT * FROM fornecedor";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$listaFornecedores = $stmt->fetchAll();
?>
<main>
    <?php if (isset($_GET['msg']) && $_GET['msg'] == 'excluido'): ?>
        <div class="alert alert-warning col-3 m-auto mb-2" role="alert">
            <p>Fornecedor excluído com sucesso.</p>
        </div>
    <?php endif; ?>
    <div class="container col-9">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($listaFornecedores as $fornecedor) { ?>
                    <tr>
                        <th scope="row"><?php echo $fornecedor["id_fornecedor"] ?></th>
                        <td><?php echo $fornecedor["nome_fornecedor"] ?></td>
                        <td><?php echo $fornecedor["cnpj_fornecedor"] ?></td>
                        <td><?php echo $fornecedor["email_fornecedor"] ?></td>
                        <td><?php echo $fornecedor["telefone_fornecedor"] ?></td>
                        <td>
                            <a href="views/editar.php?id=<?php echo $fornecedor['id_fornecedor'] ?>"><i class="bi bi-pencil-square"></i></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalExcluir" data-id="<?php echo $fornecedor['id_fornecedor'] ?>"><i class="bi-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<!-- Modal para confirmar exclusão do fornecedor -->
<div class="modal fade" id="modalExcluir" aria-labelledby="modalExcluirLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalExcluirLabel">Confirmar Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir este fornecedor?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a id="btnConfirmarExclusao" href="#" class="btn btn-danger">Sim, Excluir</a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="js/modal_exclusao.js"></script>
</body>

</html>