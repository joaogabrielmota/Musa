/*Collapse do Nome ao passar o mouse por cima*/
document.addEventListener('DOMContentLoaded', function() {
  // Seleciona o botão de collapse
  var botaoCollapse = document.getElementById('collapse-nome');
  // Seleciona o conteúdo a ser colapsado/expandido
  var conteudoCollapse = document.getElementById('conteudo-nome');

  // Quando o mouse entra no botão de collapse
  botaoCollapse.addEventListener('mouseover', function() {
    // Adiciona a classe "show" para ativar o collapse
    conteudoCollapse.classList.add('show');
    // Ajusta o atributo "aria-expanded" do botão para "true"
    this.setAttribute('aria-expanded', 'true');
  });

  // Quando o mouse sai do botão de collapse
  botaoCollapse.addEventListener('mouseout', function() {
    // Remove a classe "show" para desativar o collapse
    conteudoCollapse.classList.remove('show');
    // Ajusta o atributo "aria-expanded" do botão para "false"
    this.setAttribute('aria-expanded', 'false');
  });
});

/*Collapse do Nome ao passar o mouse por cima*/
document.addEventListener('DOMContentLoaded', function() {
  // Seleciona o botão de collapse
  var botaoCollapse = document.getElementById('collapse-descricao');
  // Seleciona o conteúdo a ser colapsado/expandido
  var conteudoCollapse = document.getElementById('conteudo-descricao');

  // Quando o mouse entra no botão de collapse
  botaoCollapse.addEventListener('mouseover', function() {
    // Adiciona a classe "show" para ativar o collapse
    conteudoCollapse.classList.add('show');
    // Ajusta o atributo "aria-expanded" do botão para "true"
    this.setAttribute('aria-expanded', 'true');
  });

  // Quando o mouse sai do botão de collapse
  botaoCollapse.addEventListener('mouseout', function() {
    // Remove a classe "show" para desativar o collapse
    conteudoCollapse.classList.remove('show');
    // Ajusta o atributo "aria-expanded" do botão para "false"
    this.setAttribute('aria-expanded', 'false');
  });
});

/*Collapse do Nome ao passar o mouse por cima*/
document.addEventListener('DOMContentLoaded', function() {
  // Seleciona o botão de collapse
  var botaoCollapse = document.getElementById('collapse-links');
  // Seleciona o conteúdo a ser colapsado/expandido
  var conteudoCollapse = document.getElementById('conteudo-links');

  // Quando o mouse entra no botão de collapse
  botaoCollapse.addEventListener('mouseover', function() {
    // Adiciona a classe "show" para ativar o collapse
    conteudoCollapse.classList.add('show');
    // Ajusta o atributo "aria-expanded" do botão para "true"
    this.setAttribute('aria-expanded', 'true');
  });

  // Quando o mouse sai do botão de collapse
  botaoCollapse.addEventListener('mouseout', function() {
    // Remove a classe "show" para desativar o collapse
    conteudoCollapse.classList.remove('show');
    // Ajusta o atributo "aria-expanded" do botão para "false"
    this.setAttribute('aria-expanded', 'false');
  });
});

/*Collapse do Nome ao passar o mouse por cima*/
document.addEventListener('DOMContentLoaded', function() {
  // Seleciona o botão de collapse
  var botaoCollapse = document.getElementById('collapse-tags');
  // Seleciona o conteúdo a ser colapsado/expandido
  var conteudoCollapse = document.getElementById('conteudo-tags');

  // Quando o mouse entra no botão de collapse
  botaoCollapse.addEventListener('mouseover', function() {
    // Adiciona a classe "show" para ativar o collapse
    conteudoCollapse.classList.add('show');
    // Ajusta o atributo "aria-expanded" do botão para "true"
    this.setAttribute('aria-expanded', 'true');
  });

  // Quando o mouse sai do botão de collapse
  botaoCollapse.addEventListener('mouseout', function() {
    // Remove a classe "show" para desativar o collapse
    conteudoCollapse.classList.remove('show');
    // Ajusta o atributo "aria-expanded" do botão para "false"
    this.setAttribute('aria-expanded', 'false');
  });
});