<?php
require_once "header.php";

$sql = "SELECT * FROM fornecedor";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$listaFornecedores = $stmt->fetchAll();
?>
<main>
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
                            <a href="editar.php?id=<?php echo $fornecedor['id_fornecedor'] ?>"><i class="bi bi-pencil-square"></i></a>
                            <a href="excluir.php?id=<?php echo $fornecedor['id_fornecedor'] ?>"><i class="bi-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>