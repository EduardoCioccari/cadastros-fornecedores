function mascaraCelular(campo) {
  var v = campo.value

  // Remove tudo o que não é dígito
  v = v.replace(/\D/g, "")

  // Trava o tamanho
  if (v.length > 11) {
    v = v.substring(0, 11)
  }

  // Coloca os parênteses e o espaço
  v = v.replace(/^(\d{2})(\d)/, "($1) $2")

  // Coloca o hífen
  v = v.replace(/(\d{5})(\d)/, "$1-$2")

  campo.value = v
}
