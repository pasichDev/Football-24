<?
/**
 * @name        Football 24 News
 * @author      pasich
 * @link        https://t.me/andriipasichnik
 */

defined('pasichDev') or die('Доступ запрещено');

class mainView{

public static function endGames($data){// последние сыграные матчи
$game = $data->find( '.feed-table', 0 ); //получим  секцию

if(!empty($game)){
echo '<div class="panel-heading">Последние матчи</div>
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">';

for ($i = 0; $i <= 15; $i ++) {
$lteam = $game->find ( ".left-team" ,   $i );  //получим гостей
$rteam = $game->find ( ".right-team" ,  $i ); //получим выезд
$time = $game->find ( ".time" ,  $i ); //получим дату
$score = $game->find ( ".score " ,  $i );  //голы

if(!empty($lteam)){
echo '<tr>
      <td >'.strip_tags($lteam).'</td>
      <td >'.strip_tags($score).'</td>
      <td >'.strip_tags($rteam).'</td></tr>'; 
    }} echo '</table>'; }
        }

public static function newGames($data){//будующие матчи
$game = $data->find( '.feed-table', 1 ); //получим  секцию, изменяя обьект

if(!empty($game)){
echo '<div class="panel-heading">Следующие матчи</div>
       <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">';
for ($i = 0; $i <= 15; $i ++) {
$lteam = $game->find ( ".left-team" ,   $i );  //получим гостей
$rteam = $game->find ( ".right-team" ,  $i ); //получим выезд
$time = $game->find ( ".time" ,  $i ); //получим дату
$score = $game->find ( ".score " ,  $i );  //голы
if(!empty($lteam)){
echo '<tr>
      <td >'.strip_tags($lteam).'</td>
      <td >'.strip_tags($score).'</td>
      <td >'.strip_tags($rteam).'</td></tr>'; 
    }} echo '</table>';  }     
             }

public static function news($data){//последние новости
echo '<div class="panel-heading">Последние новости</div>';

for ($i = 0; $i <= core::$newsCount; $i ++) {
$news = $data->find( '.news-feed ul', 1 ); //получим  пост
$text = $news->find ( "a" ,  $i );  //получим текст
echo '<div class="card">
       <div class="card-content"> 
       <img src="'.$home.'src/svg/post.svg" width="24" height="24"> '.core::editHref($text).'</div>
      </div></br>'; }   
    }

public static function viewPostLeft($html){  
//Отобразим пост
$data = file_get_html(core::conectionIN('edit',$html)); //наша страничка
if($data) {
$p_form = $data->find( '.author-article', 0 ); //получим  пост
$text = $p_form->find ( '.article-text' ,  0 );  //получим текст
$img = $p_form->find ( '.article-photo' ,  0 );  //получим фотографию
$head = $p_form->find ( 'h1' ,  0 );  //получим текст
$data = $p_form->find ( '.date' ,  0 );  //получим дату поста

echo '<div class="card">';
if(core::$img_mode == '1') echo '<div class="card-image"><figure class="image is-2by1">'.$img.'</figure></div>';
   echo '<div class="card-content"><div class="content">
     <h6 class="title is-6">'.strip_tags($head).'</h6>'.$text.'</br>
    <small class="has-text-grey"> '.strip_tags($data).'</small>
  </div></div></div>'; 
}else{ echo '<div class="notification is-danger"> Извините, но статьи не существует!</div>'; } }

}



class view{
//Данный клас выводит выбраные разделы
public static function viewIndex($country){  //Отобразим главную страницу
$data = file_get_html(core::conectionIN('',$country)); //запрос

 echo '<div class="control">
        <div class="tags has-addons">
        <span class="tag is-dark">Новости футбола</span>
        <span id="time" class="tag is-success"><b>'. core::rus_name($country).'</b></span>
       </div></div><div class="columns"><div class="column">.';
      mainView::endGames($data);
      mainView::newGames($data);
 echo '</div><div class="column">.';
      mainView::news($data);
 echo '</div></div>';
       $data->clear();  }

public static function viewPost($html){  //отобразим пост
$vr = explode("/",$html);
$data = file_get_html(core::conectionIN('',$vr[0])); //запрос

 echo '<div class="columns"><div class="column is-three-fifths">';
       mainView::viewPostLeft($html);
 echo '</div><div class="column">';
       mainView::news($data);
 echo '</div>';  }

}
