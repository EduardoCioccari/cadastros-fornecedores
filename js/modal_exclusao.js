console.log("O arquivo JS foi carregado com sucesso!")
var modalExcluir = document.getElementById("modalExcluir")

modalExcluir.addEventListener("show.bs.modal", function (event) {
  // Pegando ID do fornecedor.
  var botao = event.relatedTarget
  var id = botao.getAttribute("data-id")

  // Pegando id do botão.
  var btnConfirmarExclusao = document.getElementById("btnConfirmarExclusao")

  btnConfirmarExclusao.setAttribute("href", "scripts/delete.php?id=" + id)
})
