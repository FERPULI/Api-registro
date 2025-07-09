<?php
require_once __DIR__ . '/../config/database.php';

$db = (new Database())->connect();
$request = $_GET['resource'] ?? '';

switch ($request) {
    case 'usuario':
        require_once __DIR__ .'/../routes/usuario.php';
        break;
    default:
        http_response_code(404);
        echo json_encode(["message" => "Ruta no encontrada"]);
        break;
}
