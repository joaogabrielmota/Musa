<?php

  session_start();


  if(!isset($_SESSION['id_user'])){

    header('Location:CadastroLogin.php');
    exit();
  }

  require_once('conexao.php')

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Padrao.css">
    <link rel="stylesheet" href="css/Posts.css">
    <link rel="stylesheet" href="css/getpost.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <title>Musa</title>
</head>
<body>
  <nav class="row navbar navbar-expand-lg nav-underline">
    <div class="container-fluid ">
        <span class="navbar-brand mb-0 h1 d-lg-none" id="logo">Musa</span>
        <div class="dropdown d-lg-none">
          <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="ph ph-magnifying-glass lupa"></i>
          </button>
          <ul class="dropdown-menu">
            <form class="form-control" role="search">
              <input type="search"> 
             <button class="btn-nav" type="submit" href="#"><i class="ph ph-magnifying-glass"></i></button>
           </form>
          </ul>
        </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse  justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Sobre nós</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Posts</a>
          </li>
          <span class="navbar-brand mb-0 h1 d-none d-lg-block"  id="logo">Musa</span>
        </ul>
        <i class="ph ph-moon colori isl d-none d-lg-block"></i>
        <div>
        <div class="trilho mx-auto" id="trilho">
          <div class="indicador"></div>
        </div>
      </div>
        <i class="ph ph-sun-dim colori isl d-none d-lg-block"></i>
        <form class="form-control d-none d-lg-block" role="search">
           <input type="search"> 
          <button class="btn-nav" type="submit" href="#"><i class="ph ph-magnifying-glass"></i></button>
        </form>

        <button class="btn-login" type="submit" href="#">Login</button>
      </div>
    </div>
  </nav>


         

      <div class="container">
        <div class="postagem">
          <div class="criarPost">
            <a class="btn" data-bs-toggle="collapse" href="#post" role="button" aria-expanded="false" aria-controls="collapseExample">
              Criar
            </a><!--Botão Criar Post-->

            <div class="container">
        <div class="collapse" id="post">
            <div class="post">
                <div class="card card-body">
                    <form id="postForm" action="processar_post.php" method="POST" enctype="multipart/form-data">
                        <input type="text" class="form-control mb-3" name="titulo" id="titulo" placeholder="Título" required><!--Título-->
                        <div class="textarea-container">
                            <textarea class="form-control" name="descricao" id="descricao" rows="5" maxlength="200" placeholder="Escreva aqui..." required></textarea><!--Descrição com valor máximo de 200 caracteres-->
                            <div class="spanCaracter">
                                <span class="caracters">Máximo de 200 caracteres</span>
                            </div>
                            <div class="textarea-footer"><!--Footer da Descrição-->
                                <label class="file-input-wrapper" for="formFile">
                                    <i class="ph ph-paperclip icon"></i> <!--Icone do upload de arquivo--> 
                                    <input class="form-control" type="file" name="arquivo" id="formFile"><!--Input do upload de arquivo-->
                                </label><!--Label do upload de arquivo-->
                                <button type="submit" class="btn publicar">Publicar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





   
                        <!--Botão para baixar arquivos-->
                        <!--<label class="file-input-wrapper" for="formFile">
                          <i class="ph ph-paperclip icon"></i>
                          <input class="form-control" type="file" id="formFile">
                        </label>-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/Post.js"></script>
</body>
</html>