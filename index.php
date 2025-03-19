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

    <script>
    function validarFormulario(event) {
        event.preventDefault(); // Impede o envio padrão do formulário (recarregar a página)
        
        let produto = document.getElementById('Pecas').value.trim();
        let quantidade = document.getElementById('QuantidadePecas').value.trim();
        let ActionResultShow = document.getElementById('ResultadoDaAcao');
        
        // Validação dos campos
        if (produto === "") {
            ActionResultShow.innerText = "O campo do produto não pode estar vazio.";
            return false; 
        }
        
        if (quantidade === "" || isNaN(quantidade)) {
            ActionResultShow.innerText = "O campo quantidade deve ser preenchido com um número válido.";
            return false; 
        }

        // Mensagem enquanto está processando
        ActionResultShow.innerText = "Enviando dados...";

        // Criando o objeto XMLHttpRequest (AJAX)
        let xhr = new XMLHttpRequest();
        
        // Abrindo a requisição POST para o arquivo PHP que processará os dados
        xhr.open("POST", "salvar.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Definindo o que acontece quando a resposta é recebida
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Exibindo apenas a resposta do PHP (sucesso ou erro) como texto simples
                ActionResultShow.innerText = xhr.responseText;
            } else {
                ActionResultShow.innerText = "Ocorreu um erro ao enviar os dados. Tente novamente.";
            }
        };

        // Enviando os dados para o servidor
        xhr.send("Pecas=" + encodeURIComponent(produto) + "&QuantidadePecas=" + encodeURIComponent(quantidade));
        
        return false; // Impede o envio do formulário
    }
</script>


<form onsubmit="validarFormulario(event)" class="border p-4 rounded shadow-sm bg-light">
    <div class="InputConteiner">
        <div class="ItensConteiner">
            <label class="LabelDirecionamento" for="Pecas">Insira o nome do produto.</label>
            <input type="text" id="Pecas" name="Pecas" class="TextboxPecas" required>

            <label class="LabelDirecionamento" for="QuantidadePecas">Informe a quantidade máxima de peças permitidas.</label>
            <input type="text" id="QuantidadePecas" name="QuantidadePecas" required>

            <button type="submit">Salvar</button>

            <p id="ResultadoDaAcao" class="ResultadoDaAcao">Aguardando...</p>
        </div>
    </div>
</form>
