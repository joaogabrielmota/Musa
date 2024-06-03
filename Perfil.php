<?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);


    session_start();

    if(!isset( $_SESSION['id_user']) || !isset($_SESSION['nome_user'])){

        header("Location:CadastroLogin.php");
        exit();
    }

    require_once('conexao.php');
    require_once('Usuario.php');

    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);

    $user->id_user = $_SESSION['id_user'];
    $userInfo = $user->getUserInfo();
    $userTags = $user->getUserTags();
    $userLinks = $user->getUserLinks();
    $profilePic = $user->getUserPhoto();

    if($userInfo == null){
        echo "Erro: Usuario não encontrado";
        exit();
    }

   

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"> 
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/Padrao.css">
    <link rel="stylesheet" href="css/Perfil.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <title>Musa</title>
</head>
<body>
   
<nav class="row navbar navbar-expand-lg nav-underline">
        <div class="container-fluid">
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
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto" style="padding: revert;">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" style="display: ruby; padding: .6em 1em;" href="#">Sobre nós</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Posts.php">Posts</a>
              </li>
              <span class="navbar-brand mb-0 h1 d-none d-lg-block" style="padding-left: 11%;" id="logo">Musa</span>
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
        <div class="row">
            <div class="perfil col-lg-3 col-12"><!--Perfil do usuário logado-->
                <img id="perfil-foto" src="<?php echo htmlspecialchars($profilePic); ?>" class="img-fluid">
                <div class="nome-perfil">
                    <h1><?php echo htmlspecialchars($userInfo['nome_user'])?></h1>
                    <h3>@<?php echo htmlspecialchars($userInfo['nomeartistico_user'])?></h3>
                </div>

             <div class="tags row justify-content-center"><!-- Tags do usuário logado -->
                    <?php
                        if (count($userTags) > 0) {
                            foreach ($userTags as $index => $tag) {
                                $col_class = 'col-lg-6 col-md-6 col-sm-12 mb-2 d-flex justify-content-center';
                                echo '<div class="' . $col_class . '">';
                                echo '    <label class="tag">' . htmlspecialchars($tag) . '</label>';
                                echo '</div>';
                            }
                        } else {
                            echo '<div class="col-12">';
                            echo '    <label class="tag">Nenhuma tag encontrada</label>';
                            echo '</div>';
                        }
                    ?>
            </div>


                

                <p id="descricao"><?php echo htmlspecialchars($userInfo['descricao_user'])?></p>
            
                <div class="infos-pessoais"><!--Informações do usuário logado-->
                  
     <?php
        // Exibir os links do usuário'
 
                $userLinks = $user->getUserLinks();
                if(!empty($userLinks)) {
            foreach($userLinks as $link) {
                echo "<a href='$link' target='_blank'>$link</a></li>";
                echo "<br>";
            }
        } else {
            echo "<p>O usuário não possui links associados.</p>";
        }
    ?>


                    <p id="contato"><?php echo htmlspecialchars($userInfo['email_user'])?></p>
                    <p id="telefone"><?php echo htmlspecialchars($userInfo['telefone_user'])?></p>
                    <p id=" uf"><?php echo htmlspecialchars($userInfo['uf_user'])?></p>
                </div>
            </div>

            <div class="postscurtidas col-lg-9 col-12">
                <h1 style="color: #00E800;">Posts</h1><!--Posts do usuário-->

                <div class="posts">
                    <div id="posts" class="carousel slide"><!--Carousel-->
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#posts" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#posts" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#posts" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="post-esquerdo">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <h3 class="card-title">New Melodies</h3>
                                                        </div> 
                                                        <div class="col-2">
                                                            <i class="editar ph ph-pencil-simple open-modal"></i>
                                                            <div id="editar-modal" class="modal">
                                                                <div class="modal-content">
                                                                    <span class="close">&times;</span>
                                                                    <form>
                                                                        <input type="text" class="form-control" id="floatingInput" placeholder="Título">
                                                                        <div class="container">
                                                                            <textarea class="form-control descricao" placeholder="Descrição" rows="5"></textarea>
                                                                            <div class="footer">
                                                                            
                                                                                <span>Limite de caracteres: <span id="limite">200</span></span>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <p class="card-text">Tinashe always pays attention to every last 
                                                        detail. Not only does the multi-platinum-certified R&B disruptor 
                                                        sing, write, and dance, but she also produces, mixes, engineers, 
                                                        creative directs, and edits. </p>
                                                    <div class="arquivos">
                                                        <br>
                                                        <a href="#" class="card-link">Card link</a>
                                                        <br>
                                                        <br>
                                                        <a href="#" class="card-link">Another link</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="post-direito">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <h3 class="card-title">New lyric idea</h3>
                                                        </div> 
                                                        <div class="col-2">
                                                            <a href="#" class="editar"><i class="ph ph-pencil-simple"></i></a>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <p class="card-text">Had this lyrics going thru my mind for quite some time, decided to wrote them down and see if someone likes and would like to colaborate!! I think these are kind of unique cause is based off some experiences from the past through my point of view!</p>
                                                    <div class="arquivos">
                                                        <br>
                                                        <a href="#" class="card-link">Card link</a>
                                                        <br>
                                                        <br>
                                                        <a href="#" class="card-link">Another link</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="post-esquerdo">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <h3 class="card-title">New Melodies</h3>
                                                        </div> 
                                                        <div class="col-2">
                                                            <a href="#" class="editar"><i class="ph ph-pencil-simple"></i></a>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <p class="card-text">Tinashe always pays attention to every last detail. Not only does the multi-platinum-certified R&B disruptor sing, write, and dance, but she also produces, mixes, engineers, creative directs, and edits. </p>
                                                    <div class="arquivos">
                                                        <br>
                                                        <a href="#" class="card-link">Card link</a>
                                                        <br>
                                                        <br>
                                                        <a href="#" class="card-link">Another link</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="post-esquerdo">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <h3 class="card-title">New Melodies</h3>
                                                        </div> 
                                                        <div class="col-2">
                                                            <a href="#" class="editar"><i class="ph ph-pencil-simple"></i></a>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <p class="card-text">Tinashe always pays attention to every last detail. Not only does the multi-platinum-certified R&B disruptor sing, write, and dance, but she also produces, mixes, engineers, creative directs, and edits. </p>
                                                    <div class="arquivos">
                                                        <br>
                                                        <a href="#" class="card-link">Card link</a>
                                                        <br>
                                                        <br>
                                                        <a href="#" class="card-link">Another link</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="post-direito">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <h3 class="card-title">New lyric idea</h3>
                                                        </div> 
                                                        <div class="col-2">
                                                            <a href="#" class="editar"><i class="ph ph-pencil-simple"></i></a>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <p class="card-text">Had this lyrics going thru my mind for quite some time, decided to wrote them down and see if someone likes and would like to colaborate!! I think these are kind of unique cause is based off some experiences from the past through my point of view!</p>
                                                    <div class="arquivos">
                                                        <br>
                                                        <a href="#" class="card-link">Card link</a>
                                                        <br>
                                                        <br>
                                                        <a href="#" class="card-link">Another link</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="post-direito">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <h3 class="card-title">New lyric idea</h3>
                                                        </div> 
                                                        <div class="col-2">
                                                            <a href="#" class="editar"><i class="ph ph-pencil-simple"></i></a>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <p class="card-text">Had this lyrics going thru my mind for quite some time, decided to wrote them down and see if someone likes and would like to colaborate!! I think these are kind of unique cause is based off some experiences from the past through my point of view!</p>
                                                    <div class="arquivos">
                                                        <br>
                                                        <a href="#" class="card-link">Card link</a>
                                                        <br>
                                                        <br>
                                                        <a href="#" class="card-link">Another link</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!---------------------------------------------------------------->
                
                <!--Curtidas-->
                <h1 style="color: rgb(233, 0, 118)">Curtidas</h1>
                <div class="curtidas">
                    <div id="curtidas" class="carousel slide">
                            <div class="carousel-indicators"><!--Carrousel-->
                                <button type="button" data-bs-target="#curtidas" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#curtidas" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#curtidas" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active"><!--Primeiro slide do carrousel-->
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="post-esquerdo"><!--Posts do lado esquerdo-->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <h3 class="card-title">New beat!</h3>
                                                        </div> 
                                                        <div class="col-2">
                                                            <i class="curtida ph ph-heart-straight"></i><!--icone de curtida-->
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <p class="card-text">Alternating between English and Spanish-language 
                                                        projects with unparalleled fluidity, she has released several of 
                                                        the most lauded albums of the past decade.</p>
                                                    <div class="arquivos"><!--Descrição do post-->
                                                        <br>
                                                        <a href="#" class="card-link">Card link</a><!--Arquivo do post-->
                                                        <br>
                                                        <br>
                                                        <a href="#" class="card-link">Another link</a>
                                                    </div><!--Arquivo do post-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="post-direito"><!--Posts do lado direito-->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <h3 class="card-title">My vocals</h3>
                                                        </div> 
                                                        <div class="col-2">
                                                            <i class="curtida ph ph-heart-straight"></i>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <p class="card-text">Aaliyah was born January 16, 1979 in Brooklyn, 
                                                        New York. Later she moved to Detroit where she developed and honed
                                                        her angelic falsetto and smooth vocal timbre that would become the 
                                                        hallmark of her legendary style.</p>
                                                    <div class="arquivos">
                                                        <br>
                                                        <a href="#" class="card-link">Card link</a>
                                                        <br>
                                                        <br>
                                                        <a href="#" class="card-link">Another link</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="post-esquerdo"><!--Posts do lado esquerdo-->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <h3 class="card-title">New beat!</h3>
                                                        </div> 
                                                        <div class="col-2">
                                                            <i class="curtida ph ph-heart-straight"></i><!--icone de curtida-->
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <p class="card-text">Alternating between English and Spanish-language 
                                                        projects with unparalleled fluidity, she has released several of 
                                                        the most lauded albums of the past decade.</p>
                                                    <div class="arquivos"><!--Descrição do post-->
                                                        <br>
                                                        <a href="#" class="card-link">Card link</a><!--Arquivo do post-->
                                                        <br>
                                                        <br>
                                                        <a href="#" class="card-link">Another link</a>
                                                    </div><!--Arquivo do post-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="post-esquerdo"><!--Posts do lado esquerdo-->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <h3 class="card-title">New beat!</h3>
                                                        </div> 
                                                        <div class="col-2">
                                                            <i class="curtida ph ph-heart-straight"></i><!--icone de curtida-->
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <p class="card-text">Alternating between English and Spanish-language 
                                                        projects with unparalleled fluidity, she has released several of 
                                                        the most lauded albums of the past decade.</p>
                                                    <div class="arquivos"><!--Descrição do post-->
                                                        <br>
                                                        <a href="#" class="card-link">Card link</a><!--Arquivo do post-->
                                                        <br>
                                                        <br>
                                                        <a href="#" class="card-link">Another link</a>
                                                    </div><!--Arquivo do post-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="post-direito"><!--Posts do lado direito-->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <h3 class="card-title">My vocals</h3>
                                                        </div> 
                                                        <div class="col-2">
                                                            <i class="curtida ph ph-heart-straight"></i>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <p class="card-text">Aaliyah was born January 16, 1979 in Brooklyn, 
                                                        New York. Later she moved to Detroit where she developed and honed
                                                        her angelic falsetto and smooth vocal timbre that would become the 
                                                        hallmark of her legendary style.</p>
                                                    <div class="arquivos">
                                                        <br>
                                                        <a href="#" class="card-link">Card link</a>
                                                        <br>
                                                        <br>
                                                        <a href="#" class="card-link">Another link</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="post-direito"><!--Posts do lado direito-->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <h3 class="card-title">My vocals</h3>
                                                        </div> 
                                                        <div class="col-2">
                                                            <i class="curtida ph ph-heart-straight"></i>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <p class="card-text">Aaliyah was born January 16, 1979 in Brooklyn, 
                                                        New York. Later she moved to Detroit where she developed and honed
                                                        her angelic falsetto and smooth vocal timbre that would become the 
                                                        hallmark of her legendary style.</p>
                                                    <div class="arquivos"></div>
                                                    <br>    
                                                    <a href="#" class="card-link">Card link</a>
                                                        <br>
                                                        <br>
                                                        <a href="#" class="card-link">Another link</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    


    
<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/Perfil.js"></script>
</body>
</html>

