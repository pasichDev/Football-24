<? 
/**
 * @name        Football 24 News
 * @author      pasich
 * @link        https://t.me/andriipasichnik
 */

define('pasichDev', 1);

$root = '';
$start_time = microtime();
$start_array = explode(" ",$start_time);
$start_time = $start_array[1] + $start_array[0];


/*--------------------------------
  Автозагрузка класов
--------------------------------*/
spl_autoload_register(function ($class) {
    include  $root.'class/' . $class . '.class.php';
});
 
$core = new core() or die('Error: Core System'); //загрузим ядро
unset($core);
core::includ_parser(); // вызвем библотеку парсера
error_reporting(0); // отключено показ ошибок

/*--------------------------------
  Обявим системные переменные
--------------------------------*/

$home = core::$home;  //Ссылка на ваш сайт      
$cou = $_GET['country']; //переменная выбора страны
$post = $_GET['post']; //переменная выбора статьи


echo '<!DOCTYPE html><html><head>
<link rel="stylesheet" href="'.$home.'src/bulma.css"> 
<link rel="stylesheet" href="'.$home.'src/style.css"> 
<script src="'.$home.'src/js.js" ></script> 
<link rel="apple-touch-icon" href="'.$home.'src/img/apple_icon.png" type="image/png"/>
<link rel="icon" href="'.$home.'favicon.ico" type="image/x-icon"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="'.$description.'" />
<meta name="keywords" content="'.$keywords.'" />
<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8"/>
<title>'.core::title('default').'</title></head><body>
<div class="container">
<nav class="navbar is-success" role="navigation" aria-label="main navigation"><div class="navbar-brand">
<div class="navbar-item"><img src="'.$home.'src/svg/goal.svg" width="112" height="28"></div>
<a role="button" class="navbar-burger burger" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span></a> </div>
  <div id="navbarBasicExample" class="navbar-menu">
<div class="navbar-start">
<a href="?" class="navbar-item"> Главная </a>
<div class="navbar-item has-dropdown is-hoverable">
<a class="navbar-link"> <b>Новости</b> </a>
<div class="navbar-dropdown">
<a href="?country=ukraine" class="navbar-item"> Украина</a>
<a href="?country=germany" class="navbar-item"> Германия</a>
<a href="?country=england" class="navbar-item"> Англия</a>
<a href="?country=spain" class="navbar-item"> Испания</a>
<a href="?country=italy" class="navbar-item"> Италия</a>
<a href="?country=portugal" class="navbar-item"> Португалия</a>
  </div></div></div></div></nav><div class="body">';












/*--------------------------------
 Сейчас мы проверим какой именно метод должен сработать
    *viewIndex - Главная страница новостей, для выбранной страны
    *viewPost - Просмотр поста
--------------------------------*/
if(empty($post))
view::viewIndex(core::checkCountry($cou));
else 
view::viewPost($post);




//страница сгенерирована за
$end_time = microtime();
$end_array = explode(" ",$end_time);
$end_time = $end_array[1] + $end_array[0];
$time = $end_time - $start_time;

?>

<!-- Футер сайта -->
</div></div></div>
<footer class="footer"><div class="content has-text-centered"><p>
<strong class="has-text-success">Футбол 24/7</strong> by <a class="tag is-danger is-light" href="https://github.com/pasichDev">Andrii PasichNIK.</a>
</br><small class="has-text-grey">Материалы принадлежат <a class="tag is-info is-light" href="https://football.ua/">football.ua</a></small></br>
<small> Ген: <b><? echo mb_strimwidth($time, 0, 6); ?>с</b> </smal></p></div></footer>  
</div> </body></html>






