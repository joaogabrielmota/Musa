<?php

session_start();

require_once('conexao.php');
require_once('Usuario.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);
    
    $email = $_POST['email_user'];   
    $senha = $_POST['senha_user'];

    if($user->login($email, $senha)){
        $_SESSION['id_user'] = $user->id_user;
        $_SESSION['nome_user'] = $user->nome_user;
        header("Location:Perfil.php");
        exit();
    } else{
        echo '<script>alert("Email ou Senha invalido")</script>'; 
    }

}





?>





<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"> 
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/js/bootstrap.bundle.js">
    <link rel="stylesheet" href="css/ResponsividadeCadastroLogin.css">
    <link rel="stylesheet" href="css/CadastroLogin.css">
    <title>Musa</title>
</head>
<body>
    <div class="container" id="container">
        <h1 id="logo">Musa</h1>
        <div class="form-container cadastrar">
            <form>
                <!--Cadastrar-->
                <h1>Criar sua conta</h1>
                <!--Redes sociais-->
                <div class="social-icons">
                    <i class = "ph-smiley"></i>

                    <a href="#">
                        <i class="fa-brands fa-google social"></i>
                    </a>
                    <a href="#">
                        <i class="fa-brands fa-x-twitter social"></i>
                    </a>
                    <a href="#">
                        <i class="fa-brands fa-meta social"></i>
                    </a>
                </div>

                <!--Nome-->
                <span>ou então usar seu email</span>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Nome">
                    <label for="floatingInput"><i class="form-icons fa-regular fa-circle-user"></i> Nome</label>
                </div>
                <!--Email-->
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="Email">
                    <label for="floatingInput"><i class="fa-solid fa-envelope"></i> Email</label>
                </div>
                <!--Telefone-->
                <div class="form-floating">
                    <input type="tel" class="form-control" id="floatingInput" placeholder="Telefone">
                    <label for="floatingInput"><i class="fa-solid fa-phone"></i> Telefone</label>
                </div>
                <!--Estado-->
                    <select class="form-select" id="floatingSelect">
                        <option selected></i>Estado</option>
                        <option value="1">São Paulo</option>
                        <option value="2">Rio de Janeiro</option>
                        <option value="3">Minas Gerais</option>
                        <option value="4">Paraná</option>
                        <option value="5">Santa Catarina</option>
                    </select>

                <!--Senha-->
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingInput" placeholder="Senha">
                    <label for="floatingInput"><i class="fa-solid fa-lock"></i> Senha</label>
                </div>
                
                <!--Botão finalizar cadastro-->
                <a href = "#"><button type="button" class="btn btn-lg registrar">Cadastrar-se</button></a>
            </form> 
        </div>
        
        <!--Logar-->
        <div class="form-container logar">
            <form action="CadastroLogin.php" method="POST">
                <h1>Entrar em sua conta</h1>
                <div class="social-icons">
                    <a href="#">
                        <i class="fa-brands fa-google social"></i>
                    </a>
                    <a href="#">
                        <i class="fa-brands fa-x-twitter social"></i>
                    </a>
                    <a href="#">
                        <i class="fa-brands fa-meta social"></i>
                    </a>
                </div>
                <span>ou então usar seu email</span>
                <br>
                <div class="form-floating">
                    <input type="email" class="form-control" name="email_user" id="email_user" placeholder="Email">
                    <label for="floatingInput"><i class="fa-solid fa-envelope"></i> Email</label>
                </div>

                <div class="form-floating">
                    <input type="password"  class="form-control" name="senha_user" id="senha_user" placeholder="Senha">
                    <label for="floatingInput"><i class="fa-solid fa-lock"></i> Senha</label>
                </div>
                <a class="recuperarSenha" href="#">Esqueceu sua senha?</a>
                <!--Botão finalizar cadastro-->
               <button type="submit" class="btn btn-lg botaoForm login">Entrar</button>
            </form> 
        </div>

        <!--Painel esquerdo-->
        <div class="toggle-container d-none d-sm-block">
            <div class="toggle">
                <div class="toggle-panel toggle-left background-left">
                    <h1>Olá! <br>
                        Novo por aqui?</h1>
                        <p>Insira algumas informações e comece
                        <br>
                        sua jornada conosco.</p>
                        <!--Botão para ir para o cadastro-->
                        <button id="registrar" type="button" class="btn btn-dark btn-lg">Cadastre-se</button>
                    </div>

                    <!--Painel direito-->
                    <div class="toggle-panel toggle-right background-right">
                        <h1>Bem vindo 
                        <br>
                        novamente!</h1>
                        <p>Para se conectar novamente entre
                        <br> 
                        com suas informações.</p>
                        <!--botao para ir para o login-->
                        <a href="#"><button id="logar" type="submit" class="btn btn-dark btn-lg">Entrar</button></a>
                    </div>
                </div>
            </div>
        </div>
    <script src="js/CadastroLogin.js"></script>
</body>
</html>