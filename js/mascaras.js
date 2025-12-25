// Preciso rodar esta função para que após o submit a formatação do CNPJ/Telefone seja aplicada novamente.
window.addEventListener("load", function () {
  // mascara o CNPJ de novo
  var inputCnpj = document.getElementById("cnpj_fornecedor")

  if (inputCnpj && inputCnpj.value.length === 14) {
    inputCnpj.value = inputCnpj.value.replace(
      /^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/,
      "$1.$2.$3/$4-$5"
    )
  }

  // mascara o telefone de novo
  var inputTel = document.getElementById("telefone_fornecedor")

  if (inputTel && inputTel.value.length === 11) {
    inputTel.value = inputTel.value.replace(
      /^(\d{2})(\d{5})(\d{4})/,
      "($1) $2-$3"
    )
  }
})
