<?php
// Configurações do banco de dados
if (!defined('DB_SERVER')) {
    define('DB_SERVER', 'localhost');
}
if (!defined('DB_USERNAME')) {
    define('DB_USERNAME', 'root');
}
if (!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', '');
}
if (!defined('DB_NAME')) {
    define('DB_NAME', 'db_pdt');
}

try {
    // Estabelece a conexão com o banco de dados
    $conn = new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
    
    // Define o modo de erro do PDO para exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Log do erro (em ambiente de produção, você pode querer registrar em um arquivo de log)
    echo 'Database : '. $e->getMessage();
    // Exibe uma mensagem amigável ao usuário
    echo 'Erro ao conectar ao banco de dados. Por favor, tente novamente mais tarde.';
}
?>
