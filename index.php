<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="css/estilo.css">


    <title>Home</title>
</head>
<body>

  

      <header>
        <div class="background-banner">

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

                <button class="btn-login" id="loginBtn" type="submit" href="CadastroLogin.php">Login</button>
              </div>
            </div>
          </nav>
          
            <div class="container-fluid col-12">
              
                <p class="text-banner">Descubra conteúdos <br>exclusivos! Junte-se a <br>nós hoje mesmo para <br>acessar.</p>
                <button class="btn-banner" type="submit">Cadastrar-se</button>
            </div>

        </div>
      </header>

      <main class="row">
        

          <section>
            



            <div class="col-12 mx-auto">
              <h1 style="padding: 2%;">Destaques do mês</h1>
            </div>


            <div id="carouselExampleIndicators" class="carousel slide">
              <div class="carousel-indicators" style="bottom: -50px;">
              <button type="button" style="margin-right: 50px;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active button" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" style="margin-left: 50px; margin-right: 64px;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="button" aria-label="Slide 2"></button>
              <button type="button" style="margin-left: 50px;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="button" aria-label="Slide 3"></button>
              </div>

                <div class="container">
              
                  <div class="carousel-inner" style="padding-left: 3%;">
                    <div class="carousel-item active" >

                      <div class="row row-cols-1 row-cols-lg-2 g-4 mb-3 mb-sm-0">
                        <div class="col">          
                          <div class="destaque1">
                            <div class="post">

                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="destaque2">
                            <div class="post">
                
                            </div>
                          </div>
                        </div>
                        <div class="col border border-danger">
                          <div class="destaque3">
                            <div class="post">
                
                            </div>
                          </div>
                        </div>
                        <div class="col">          
                          <div class="destaque4">
                            <div class="post">
                
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="carousel-item">

                      <div class="row row-cols-1 row-cols-lg-2 g-4 mb-3 mb-sm-0">
                        <div class="col">          
                          <div class="destaque1">
                            <div class="post">

                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="destaque2">
                            <div class="post">
                
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="destaque3">
                            <div class="post">
                
                            </div>
                          </div>
                        </div>
                        <div class="col">          
                          <div class="destaque4">
                            <div class="post">
                
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="carousel-item">

                      <div class="row row-cols-1 row-cols-lg-2 g-4 mb-3 mb-sm-0">
                        <div class="col">          
                          <div class="destaque1">
                            <div class="post">

                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="destaque2">
                            <div class="post">
                
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="destaque3">
                            <div class="post">
                
                            </div>
                          </div>
                        </div>
                        <div class="col">          
                          <div class="destaque4">
                            <div class="post">
                
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

            
                </div>

              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev" style="padding-right: 7%;">
                <i class="ph ph-caret-left setinha"></i>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next" style="padding-left: 7%;">
                <i class="ph ph-caret-right setinha"></i>
              </button>
            </div>


              
          </section>

          <div class="col-12" style="padding-top: 6%;">
            <h1>Nossos artistas</h1>
          </div>

          <div class="row">
            <figure class="col-2 py-4 my-auto">
              <img src="imagens/usuario2.png" class="img-fluid py-2">
              <img src="imagens/usuario2.png" class="img-fluid py-2">
            </figure>
            <figure class="col-2 py-4 my-auto">
              <img src="img/usuario1.png" class="img-fluid py-2">
            </figure>
            <figure class="col-2 py-4 my-auto">
              <img src="imagens/usuario2.png" class="img-fluid py-2">
              <img src="imagens/usuario2.png" class="img-fluid py-2">
            </figure>
            <figure class="col-2 py-4 my-auto">
              <img src="imagens/usuario2.png" class="img-fluid py-2">
              <img src="imagens/usuario2.png" class="img-fluid py-2">
            </figure>
            <figure class="col-2 py-4 my-auto">
              <img src="imagens/usuario1.png" class="img-fluid py-2">
            </figure>
            <figure class="col-2 py-4 my-auto">
              <img src="imagens/usuario2.png" class="img-fluid py-2">
              <img src="imagens/usuario2.png" class="img-fluid py-2">
            </figure>
          </div>


        
      </main>

      <script src="js/home.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      


      
      <script>
        document.getElementById('loginBtn').addEventListener('click', function() {
            window.location.href = 'CadastroLogin.php';
        });
    </script>


</body>

</html>