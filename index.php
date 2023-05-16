<?php
    require_once "autoload.php";

    $url = $_SERVER['REQUEST_URI'];
    $base = "";
    $urlCharsLength = strlen($url);
    $sysView = null;

    // Remove a ultima barra
    if($url[$urlCharsLength - 1] == "/" || $url[$urlCharsLength - 1] == "\\"){
        $url = rtrim($url, "\\\/");
    }

    // Remove a primeira barra
    if($url[0] == "/" || $url[0] == "\\"){
        $url = ltrim($url, "\\\/");
    }

    $subRoutesArray = explode("/", $url);    
    // Criar Objeto

    $countSubrRouteArray = count($subRoutesArray);

    if($countSubrRouteArray < 2){
        $subRoutesArray[1] = "home";
        $subRoutesArray[2] = "index";
        $countSubrRouteArray = count($subRoutesArray);
    }

    if($countSubrRouteArray > 2){
        $base = $subRoutesArray[0];
        
        // Define a base do projeto
        if(!defined("__BASE__")){
            define("__BASE__", $base);
        }

        $controller = $subRoutesArray[1];
        $action = $subRoutesArray[2];
        $param = 0;

        if ($countSubrRouteArray >= 4) {
            $param = $subRoutesArray[3];
        }

        if(!$controller){
            $controller = "home";
        }

        try{
            //Primeira letra deve ser maiúscula
            $controller = ucfirst($controller); 
            $class = "{$controller}Controller";        
            $useClass = "controllers\\http\\$class";
            

            // Checa se existe um controlador com o nome da requisição
            if (!file_exists($useClass . ".php")) {
                die("Rota não encontrada! - Erro 404");
            }

            //Carrega o arquivo
            require_once("$useClass.php");

            $class = $useClass;
            // Cria-se o objeto
            $classObject = new $class();
            // Checa se há uma ação
            if ($action) {
                if(method_exists( $classObject , $action)){
                    try{
                        $classObject -> $action($param);
                        $sysView = $classObject;
                    }catch(Exception $e){
                        echo var_dump($e);
                        die();
                    }
                } else {
                    die("Rota não encontrada! - Erro 404");
                }
            }
        } catch (Exception $e) {
            die("Ação ou Rota inválida! - Erro 404");
        }
    }

    function getStyle() {
        global $base;
        return "http://" . $_SERVER['HTTP_HOST'] . "/" . $base . "/shared/styles/style.css";
    }
?>
<!Doctype html>
<html>
    <head>
        <title>Caios Rodoviária</title>
        <link rel="stylesheet" href="<?= getStyle(); ?>" />
        <style></style>
    </head>
    <body>
        <div class="app">
            <?= $sysView -> getView(); ?>
        </div>
    </body>
</html>