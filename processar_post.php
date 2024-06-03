<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


    session_start();

    if(!isset($_SESSION["id_user"])){
        header("Location:CadastroLogin.php");
        exit();

    }

    require_once('conexao.php');

    $database = new Database(); 
    $db = $database->getConnection();
    

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $id_user = $_SESSION['id_user'];

        $query = "INSERT INTO post(titulo_post, descricao_post, data_post, id_user) VALUES (?, ?, NOW(), ?)";


        $stmt = $db->prepare($query);
        $stmt->bind_param('ssi', $titulo, $descricao, $id_user);

        if($stmt->execute()){
            $id_post = $stmt->insert_id;
            
            if(!empty($_FILES['arquivo']['name'])){
                $arquivo = $_FILES['arquivo'];
                $nome_arquivo = basename($arquivo['name']);
                $caminho_arquivo = "uploads/" . $nome_arquivo;
                $tipo_arquivo = pathinfo($caminho_arquivo, PATHINFO_EXTENSION);

                if(move_uploaded_file($arquivo['tmp_name'], $caminho_arquivo )){
                    $query = "INSERT INTO arquivo (caminho_arquivo, id_post) values (?,?)";
                    $stmt = $db->prepare($query);
                    $stmt->bind_param('si', $caminho_arquivo, $id_post);
                    $stmt->execute();
                }
            }

            echo "<script> alert('post criado com sucesso')</script>";
            header("Location:getpost.php");
        
        }else{
            echo "<script> alert('Deu Merda')</script>";
        }
        


    }else{
        echo "Método de solicitação Invalido";
    }
  


?>