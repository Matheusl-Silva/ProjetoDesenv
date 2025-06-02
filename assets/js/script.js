function validarSenhas() {
  var senha = document.getElementById("senha").value;
  var confirma = document.getElementById("senhaConfirma").value;

  if (senha !== confirma) {
    alert("As senhas não conferem!");
    return false;
  }
  return true;
}
document.addEventListener("DOMContentLoaded", function () {
  // Pega todos os botões de fechamento de alerta
  var closeButtons = document.querySelectorAll(".btn-close");

  // Adiciona o event listener para cada botão
  closeButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      // Pega o elemento pai (o alerta)
      var alert = this.closest(".alert");
      // Adiciona a classe 'd-none' para esconder o alerta
      if (alert) {
        alert.classList.add("d-none");
      }
    });
  });
});
