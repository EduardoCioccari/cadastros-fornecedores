<?php

function validarFormulario($cnpj, $telefone)
{
    // Limpar caracteres do cnpj.
    $cnpjLimpo = preg_replace("/\D/", "", $cnpj);

    // Limpar caracteres do telefone celular.
    $celularLimpo = preg_replace("/\D/", "", $telefone);

    // Validando tamanho cnpj.
    if (strlen($cnpjLimpo) !== 14) {
        echo "<script>alert('Erro no preenchimento do CNPJ.')</script>";

        return false;
    }

    // Validando se input telefone celular foi preenchido e o tamanho dele.
    if (strlen($celularLimpo) > 0 && strlen($celularLimpo) !== 11) {
        echo "<script>alert('Erro no preenchimento do telefone celular.')</script>";

        return false;
    }

    return true;
}
