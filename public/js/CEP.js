  const btnPesquisar = document.querySelector("#btnPesquisar");

  btnPesquisar.addEventListener("click", e =>{ 
    //Bloqueia o evento default
    e.preventDefault();
//pegando valores
const inputDoCep = document.querySelector("#cep");
const valorDoCep = inputDoCep.value;
//fazendo a requisicao
const url = `https://viacep.com.br/ws/${valorDoCep}/json/`;
//fetch retorna uma promise
fetch(url).then(response =>{
    return response.json();
}).then(dado =>{
    if(dado.erro)
    {
        alert("O cep digitado não existe!\nPor favor, tente novamente.");
        return ;
    }
    atribuirCampos(dado);
})
})
  function atribuirCampos(dado)
  {
    const rua = document.querySelector("#rua");
    const bairro = document.querySelector("#bairro");
    const cidade = document.querySelector("#cidade");
    const estado = document.querySelector("#estado");

    rua.value = dado.logradouro;
    bairro.value = dado.bairro;
    cidade.value = dado.localidade;
    estado.value = dado.uf;
}