var menuItem = document.querySelectorAll('.item-menu')

function selectlink(){
    menuItem.forEach((item)=>
        item.classList.remove('ativo')
    )
    this.classList.add('ativo')
}

menuItem.forEach((item)=>
    item.addEventListener('click', selectlink)
)

var btnExp = document.querySelector('#btn-exp')
var menuSide = document.querySelector('.menu-lateral')

btnExp.addEventListener('click', function(){
    menuSide.classList.toggle('expandir')
})

function consultaEndereco() {
    let cep = document.querySelector ('#cep').value;

    if (cep.length !== 8) {
        alert('CEP Inválido')
        return;
    }
    let url = `https://viacep.com.br/ws/${cep}/json/`;

    fetch(url).then(function(response){
        response.json().then(function(data){
            console.log (data)
            mostrarEndereco(data);
        })
    })

}

function mostrarEndereco(dados) {
    let resultado = document.querySelector('#resultado');

    resultado.innerHTML = `
    <table class="endereco-table">
        <tr>
            <td>Endereço:</td>
            <td>${dados.logradouro}</td>
            <td>Complemento:</td>
            <td>${dados.complemento}</td>
        </tr>
        <tr>
            <td>Bairro:</td>
            <td>${dados.bairro}</td>
            <td>Cidade:</td>
            <td>${dados.localidade} - ${dados.uf}</td>
        </tr>
    </table>`;

    // Enviar os dados para o servidor
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'adicionar_endereco.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
        }
    };
    xhr.send(`logradouro=${dados.logradouro}&complemento=${dados.complemento}&bairro=${dados.bairro}&localidade=${dados.localidade}&uf=${dados.uf}`);
}
