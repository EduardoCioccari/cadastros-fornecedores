function mascaraCNPJ(campo) {
  var v = campo.value

  // Remove tudo o que não é número
  v = v.replace(/\D/g, "")

  // Quantidade de números
  if (v.length > 14) {
    v = v.substring(0, 14)
  }

  // Coloca a pontuação
  v = v.replace(/^(\d{2})(\d)/, "$1.$2")
  v = v.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3")
  v = v.replace(/\.(\d{3})(\d)/, ".$1/$2")
  v = v.replace(/(\d{4})(\d)/, "$1-$2")

  campo.value = v
}
