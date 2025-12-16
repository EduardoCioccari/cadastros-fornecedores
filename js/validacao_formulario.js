function validarFormulario() {
  var cnpjFornecedor = document.getElementById("cnpj_fornecedor").value
  var telefoneFornecedor = document.getElementById("telefone_fornecedor").value

  // Limpando
  var cnpjLimpo = cnpjFornecedor.replace(/\D/g, "")
  var telefoneLimpo = telefoneFornecedor.replace(/\D/g, "")

  // validando cnpj
  if (cnpjLimpo.length !== 14) {
    alert("Erro no preenchimento do CNPJ.")
    return false
  }

  // Validando telefone celular
  if (telefoneLimpo.length > 0 && telefoneLimpo.length !== 11) {
    alert("Erro no preenchimento do telefone celular.")
    return false
  }

  return true
}
