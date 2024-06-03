const container = document.getElementById('container');
const registrarBtn = document.getElementById('registrar');
const logarBtn = document.getElementById('logar');
/*Adicionar característica active ao container pelo botão Entrar*/
logarBtn.addEventListener('click', ()=>{
    container.classList.add("active");
});
/*Remover característica active do container pelo botão Cadastre-se*/
registrarBtn.addEventListener('click', ()=>{
    container.classList.remove("active");
});