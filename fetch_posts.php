<?php

require_once('conexao.php');
session_start();

// Conectar ao banco de dados
$database = new Database();
$db = $database->getConnection();

// Recuperar todas as postagens
$query = "SELECT p.id_post, p.titulo_post, p.descricao_post, p.data_post, u.nome_user, p.id_user, a.caminho_arquivo 
          FROM post p 
          JOIN user u ON p.id_user = u.id_user 
          LEFT JOIN arquivo a ON p.id_post = a.id_post 
          ORDER BY p.data_post DESC";
$stmt = $db->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$posts = [];
while ($row = $result->fetch_assoc()) {
    $posts[] = $row;
}

// Retornar os posts como JSON
header('Content-Type: application/json');
echo json_encode($posts);
?>