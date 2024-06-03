document.addEventListener('DOMContentLoaded', function() {
    fetch('fetch_posts.php')
      .then(response => response.json())
      .then(posts => {
        const meusPostsContainer = document.getElementById('meusPosts');
        const todosPostsContainer = document.getElementById('todosPosts');
        const userId = 1; // Substitua pelo ID do usuário logado
  
        posts.forEach(post => {
          const postElement = document.createElement('div');
          postElement.classList.add('card', 'mb-3');
          postElement.innerHTML = `
            <div class="card-body">
              <h5 class="card-title">${post.titulo_post}</h5>
              <h6 class="card-subtitle mb-2 text-muted">Por: ${post.nome_user}</h6>
              <p class="card-text">${post.descricao_post}</p>
              <p class="card-text"><small class="text-muted">${post.data_post}</small></p>
              ${post.caminho_arquivo ? `<a href="${post.caminho_arquivo}" class="card-link">Ver arquivo</a>` : ''}
            </div>
          `;
  
          if (post.id_user == userId) {
            meusPostsContainer.appendChild(postElement);
          } else {
            todosPostsContainer.appendChild(postElement);
          }
        });
      })
      .catch(error => console.error('Erro ao carregar os posts:', error));
  });
  
