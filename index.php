<?php
    require 'vendor/autoload.php';

   // die($_GET['url']);
function affichage_bd()
{
    $loader = new Twig_Loader_Filesystem(__DIR__ .'/Templates');
    $twig = new Twig_Environment($loader, array(
        'debug' => true,
        'auto_reload' => true
    ));
    echo $twig->render('list_film.twig',['film_affihage' => film()]);
}
function test() {
    $loader = new Twig_Loader_Filesystem(__DIR__ .'/Templates');
    $twig = new Twig_Environment($loader, array(
        'debug' => true,
        'auto_reload' => true
    ));
    echo $twig->render('base.twig', ['database' => "Bonjour Oumar Ousmane Sow Comment tu vas j'espere que tu te porte bien "]);
}

$router = new App\Router\Router($_GET['url']);

    $router->get('/',function() { test();});
    $router->get('/list_film',function(){affichage_bd();});
    $router->get('/posts',function(){echo "Bienvenu Oumarsow";});
    $router->get('/posts/:id',function($id){echo "article".$id;});
    $router->post('/posts/:id',function($id){echo "Bienvenu Oumarsow".$id;});

    $router->run();

    function film()
    {

        $host = 'mysql:dbname=project_annuaire_db;charset=utf8;host=127.0.0.1';
        $user = 'root';
        $password = 'oumarsow';
        $pdo = new PDO($host, $user, $password);
        //if(isset($_POST['submit1']))
        //{
        //$req = $pdo->prepare("INSERT INTO films SET nom_film = ?, annee_sortie = ?, description = ?,photo_film = ?");
       // return $req->execute([$_POST['nom_film'],$_POST['annee_sortie'],$_POST['description'],$_POST['photo_film']]);
        //}
        $req = $pdo->query("SELECT * FROM films");
        return $req;



    }
    ?>

