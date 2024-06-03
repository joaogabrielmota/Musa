<?php

    class User{
        private $conn;
        private $table_name = "user";

        public $id_user;
        public $nome_user;
        public $email_user;
        public $telefone_user;

        public $senha_user;

        public $uf_user;

        public $nomeartistico_user;


        public $descricao_user; 


        public function __construct($db){
            $this->conn = $db;
        }

        public function login($email, $senha){
            $query = "SELECT * FROM " . $this->table_name . " WHERE email_user = ? LIMIT 0,1";
            
            $stmt = $this->conn->prepare($query);

            $stmt->bind_param("s", $email);

            $stmt->execute();

            $result = $stmt->get_result();

            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                if($senha == $row['senha_user']){
                    $this->id_user = $row['id_user'];
                    $this->nome_user = $row['nome_user'];
                    $this->email_user = $row['email_user'];
                    $this->telefone_user = $row['telefone_user'];
                    $this->uf_user = $row['uf_user'];
                    $this->nomeartistico_user = $row['nomeartistico_user'];
                    $this->descricao_user = $row['descricao_user'];

                   return true;

                }
            }

                return false;
        }  

        public function getUserInfo(){
           


            $query = "SELECT nome_user, email_user, telefone_user, uf_user, nomeartistico_user, descricao_user FROM " . $this->table_name . " WHERE id_user = ?";
            $stmt = $this->conn->prepare($query);
            if($stmt === false){
                throw new Exception($this->conn->error);
            }
            $stmt->bind_param("i", $this->id_user);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows > 0){
                
                $userInfo = $result->fetch_assoc();
                $stmt->close();
                return $userInfo;



            }else{
                $stmt->close();
                return null;
            }

        }

        public function getUserTags(){
            $query = "SELECT t.nome_tag FROM tag t INNER JOIN tag_user tu ON t.id_tag = tu.id_tag WHERE tu.id_user = ?";

            $stmt = $this->conn->prepare($query);
            if($stmt === false){
                throw new Exception($this->conn->error);
            }   

            $stmt->bind_param("i", $this->id_user);
            $stmt->execute();
            $result = $stmt->get_result();

            $tags =[];

            while($row = $result->fetch_assoc()){
                $tags[] = $row['nome_tag'];
            }

            $stmt->close();
            return $tags;


        }

        public function getUserLinks(){
            $query = "SELECT conteudo_link FROM links WHERE id_user = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $this->id_user);
            $stmt->execute();
            $result = $stmt->get_result();


            $links = [];

            while($row = $result->fetch_assoc()){
                $links[] = $row["conteudo_link"];
            }



            return $links;

        }

        public function getUserPhoto(){
            $query = "SELECT caminho_fotoperfil FROM fotoperfil WHERE id_user = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $this->id_user);
            $stmt->execute();
            $result = $stmt->get_result();
            $fotoinfo = $result->fetch_assoc(); 

            $default = './imagens/Perfil.png';

            return $fotoinfo ? $fotoinfo['caminho_fotoperfil'] : $default;

            


            
        }



        




    }







?>