<?
/**
 * @name        Football 24 News
 * @author      pasich
 * @link        https://t.me/andriipasichnik
 */

defined('pasichDev') or die('Доступ запрещено');

class core {

//обявим свойства
	public static $home = 'http://news24/'; // Ссылка на ваш сайт (Нужно изменить, в конце оставить слеш)
  public static $defaultCountry ='ukraine'; // Страна по умолчанию
  public static $description =''; // description
  public static $keywords =''; // keywords
  public static $newsCount ='10'; // К-во новостей на страницу
  public static $img_mode ='1'; // Отображать ли фотографию к посту (1 - да, 0 - нет)

/*--------------------------------
  Методы
--------------------------------*/
 public static function includ_parser(){
   include_once 'SHDparser.php'; }

public static function title($type,$var=''){

  if($type=='default') $title = 'Новости футбола - '.$var;
      elseif($type=='edit') $title = $var;
          return $title;  }

public static function editHref ($html){ //заменим ссылку 
	return str_replace("https://football.ua/", "?post=", $html); }

public static function conectionIN ($mod='',$html){ //заменим обрежим ее если это пост
   if($mod == 'edit'){ $html = str_replace(".html", "", $html);} 
    $var = "https://football.ua/$html.html";
     return $var; }

public static function checkCountry($var){ //проверим выбраную страну на существование
if(empty($var)){ $var = self::$defaultCountry;}
$array = array('ukraine',  'germany', 'england',  'spain',  'italy',  'turkey', 'netherlands', 'portugal');
if ($var && ($key = array_search($var, $array)) !== false ) { $var = $var;} else { $var = self::$defaultCountry;}
   return $var; } 


public static function rus_name($x){
$country = [
    "ukraine" => "Украина",
    "germany" => "Германия",
    "england" => "Англия",
    "spain" => "Испания",
    "italy" => "Италия",
    "netherlands" => "Нидерланды",
    "portugal" => "Португалия",
    "turkey" => "Турция" ];
   
   return $country[$x];	}

}






