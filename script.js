
    var urlAtual = document.URL;

    var requisicao = window.location.search;
    requisicao = urlAtual.substr('40');
    console.log(requisicao)


    if( requisicao == 1)  {
        let mensagemAviso = document.createElement('p');
        let escopo = document.getElementById('formulario');
        mensagemAviso.className = 'text-danger'
        let texto = document.createTextNode('Por favor, verifique se todos os campos estão preenchidos corretamente!');
        escopo.appendChild(mensagemAviso);
        mensagemAviso.appendChild(texto);  
    }else if (requisicao == 2 ) {
        let mensagemSucesso = document.createElement('p');
        let escopo = document.getElementById('formulario');
        mensagemSucesso.className = 'text-success'
        let texto = document.createTextNode('Sua mensagem foi enviada com sucesso!');
        escopo.appendChild(mensagemSucesso);
        mensagemSucesso.appendChild(texto);        
    } else if (requisicao == 3) {
        let mensagemErro = document.createElement('p');
        let escopo = document.getElementById('formulario');
        mensagemErro.className = 'text-danger'
        let texto = document.createTextNode('Sua mensagem não conseguiu ser enviada, por favor tente mais tarde!');
        escopo.appendChild(mensagemErro);
        mensagemErro.appendChild(texto);   
    }