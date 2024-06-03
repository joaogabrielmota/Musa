<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos os Posts</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #071010; /* Cor de fundo alterada */
            margin: 0;
            padding: 0;
            color: #fff; /* Cor do texto alterada */
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #071010; /* Cor de fundo do container alterada */
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: rgb(0, 232, 0); /* Cor de fundo do h1 */
            color: #fff; /* Cor do texto do h1 */
            padding: 10px;
            margin-top: 0;
        }
        .post {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .post h2 {
            margin: 0 0 10px;
            color: #fff; /* Cor do texto do h2 */
        }
        .post p {
            margin: 5px 0;
        }
        .post small {
            color: #999;
        }
        .post a {
            color: #1e90ff;
            text-decoration: none;
        }
        .post a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Todos os Posts</h1>
        <div id="posts">
            <!-- Os posts serão inseridos aqui -->
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('fetch_posts.php')
                .then(response => response.json())
                .then(data => {
                    const postsContainer = document.getElementById('posts');
                    data.forEach(post => {
                        const postDiv = document.createElement('div');
                        postDiv.className = 'post';
                        
                        const title = document.createElement('h2');
                        title.textContent = post.titulo_post;
                        
                        const author = document.createElement('p');
                        author.innerHTML = `<strong>Por:</strong> ${post.nome_user}`;
                        
                        const description = document.createElement('p');
                        description.textContent = post.descricao_post;
                        
                        const date = document.createElement('p');
                        date.innerHTML = `<small>${post.data_post}</small>`;
                        
                        postDiv.appendChild(title);
                        postDiv.appendChild(author);
                        postDiv.appendChild(description);
                        postDiv.appendChild(date);
                        
                        if (post.caminho_arquivo) {
                            const fileLink = document.createElement('a');
                            fileLink.href = post.caminho_arquivo;
                            fileLink.target = '_blank';
                            fileLink.textContent = 'Ver arquivo';
                            postDiv.appendChild(fileLink);
                        }

                        postsContainer.appendChild(postDiv);
                    });
                });
        });
    </script>
</body>
</html>