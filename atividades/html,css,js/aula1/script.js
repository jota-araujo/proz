function mudarMensagem() {
    const mensagem = document.getElementById("mensagem");
    mensagem.innerHTML = " Parabéns, você acaba de ganhar 5% de desconto em todos os produtos. <br> Aproveite!";
    document.getElementById("titulo").textContent = "Parabéns!";
    document.getElementById("botão").textContent = "Já foi clicado!";
}
