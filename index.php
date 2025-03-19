<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stlye.css">
    <title>MQTT conection</title>
</head>

<body>
    

    <header>
        <h1 class="TituloDaPagina">Novo Item</h1>
    </header>

<form action="salvar.php" method="POST" onsubmit="return validarFormulario()" class="border p-4 rounded shadow-sm bg-light"></form>
    <div class="InputConteiner">
        <div class="ItensConteiner">

            <label class="LabelDirecionamento" for="Pecas">Insira o nome do produto.</label>
            <input type="text" id="Pecas" class="TextboxPecas" required>

            <label class="LabelDirecionamento" for="QuantidadePecas">Informe a quantidade máxima de peças
                permitidas.</label>
            <input type="text" id="QuantidadePecas" required>

            <button type="submit">Salvar</button>

            <p id="ResultadoDaAcao" class="ResultadoDaAcao">Aguardando...</p>

        </div>
    </div>

    <script>
        function validarFormulario() {
            let produto = document.getElementById('Pecas').value.trim();
            let quantidade = document.getElementById('QuantidadePecas').value.trim();
            let ActionResultShow = document.getElementById('ResultadoDaAcao').value.trim();
            
            if (produto === "") {
                //exibirModal("O campo do produto não pode estar vazio.");
                ActionResult.innerText ="O campo do produto não pode estar vazio."
                return false;
            }
            
            if (quantidade === "" || isNaN(quantidade)) {
                //exibirModal("O campo quantidade deve ser preenchido com um número válido.");
                 ActionResultShow.innerText = "O campo quantidade deve ser preenchido com um número válido."
                return false;
            }
            
            return true;
        }

            //function exibirModal(mensagem) {
            // Exibe o modal e insere a mensagem
            //document.getElementById('modalMessage').innerText = mensagem;
            // let modal = new bootstrap.Modal(document.getElementById('alertModal'));
            // modal.show();
            //}
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>