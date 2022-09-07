const cep = document.querySelector("#cep")

const showData = (result)=>{
 for(const campo in result){
    if(document.querySelector("#"+campo)){
      document.querySelector("#"+campo).value = result[campo]
    }
 }
}
cep.addEventListener("blur",(e)=>{
  let search = cep.value.replace("-","")
  const options = {
    method: 'GET',
    mode: 'cors',
    cache: 'default'
  }
  fetch(`https://viacep.com.br/ws/${search}/json/`, options)
  .then(response =>{
    response.json()
    .then(data => showData(data))
  })
  .catch(e => console.log('Deu erro'+ e,message))

})

function mascara_telefone(){
  var telefone = document.getElementById('telefone')
  if(telefone.value.length == 2){
    telefone.value = telefone.value + " "
  }
  if(telefone.value.length == 8){
    telefone.value = telefone.value + "-"
  }
}
function mascara_cnpj(){
  var cnpj = document.getElementById('cnpj')
  if(cnpj.value.length == 2){
    cnpj.value = cnpj.value + "."
  }
  if(cnpj.value.length == 6){
    cnpj.value = cnpj.value + "."
  }
  if(cnpj.value.length == 10){
    cnpj.value = cnpj.value + "/"
  }
  if(cnpj.value.length == 15){
    cnpj.value = cnpj.value + "-"
  }
 
}

