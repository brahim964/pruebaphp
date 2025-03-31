<?php
// Habilitar errores (útil en desarrollo)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Autocargar controladores
$controller = $_GET['controller'] ?? 'equipo';
$action = $_GET['action'] ?? 'index';

$controllerFile = __DIR__ . '/../app/controllers/' . ucfirst($controller) . 'Controller.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerClass = ucfirst($controller) . 'Controller';

    if (class_exists($controllerClass)) {
        $controllerInstance = new $controllerClass();

        if (method_exists($controllerInstance, $action)) {
            $controllerInstance->$action();
        } else {
            echo "La acción '$action' no existe en el controlador '$controllerClass'.";
        }
    } else {
        echo "La clase del controlador '$controllerClass' no se encuentra.";
    }
} else {
    echo "El archivo del controlador '$controllerFile' no existe.";
}
