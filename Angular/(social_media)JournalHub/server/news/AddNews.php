<?php
include_once "Connection.php";
echo json_encode(AddNews::addNews(), JSON_UNESCAPED_UNICODE);
class AddNews
{
  public static function addNews(){
    $url_components = parse_url(htmlspecialchars(htmlentities(($_SERVER['REQUEST_URI']))));
    parse_str($url_components['query'], $params);
    if(!isset($_GET['token'])){ return json_encode(["error"=>"token"]);}



    $data= json_decode(file_get_contents("PHP://input"));
    $createdArray = $data;

    $token =  trim(htmlentities(htmlspecialchars(stripslashes($_GET['token']))));

    $queryX = Connection::getCon()->prepare("SELECT user_id FROM `users` WHERE token='$token'");
    $queryX->execute(array());
    $user_id = $queryX->fetchAll(PDO::FETCH_ASSOC);

    $user_id = $user_id[0]["user_id"];
    $URL= "http://webnapp.pl/gallery/";
    $category = trim(htmlentities(htmlspecialchars(stripslashes($data->category))));
    $title = trim(htmlentities(htmlspecialchars(stripslashes($data->title))));
    $content = trim(htmlentities(htmlspecialchars(stripslashes($data->content))));
    $content = ltrim(rtrim(trim($content)));
    $randomInt = rand(1,30);
    if($title=="" || $title==null || $content=="" || $content==null || $category=="" || $category ==null) return null;

    switch ($category){
      case "war":
        $URL = $URL."war/".$randomInt.".jpg";
        break;
      case "poland":
        $URL = $URL."poland/".$randomInt.".jpg";
        break;
      case "stars":
        $URL = $URL."stars/".$randomInt.".jpg";
        break;
      case "science":
        $URL = $URL."science/".$randomInt.".jpg";
        break;
      case "world":
        $URL = $URL."world/".$randomInt.".jpg";
        break;
      case "criminal":
        $URL = $URL."criminal/".$randomInt.".jpg";
        break;
      case "weather":
        $URL = $URL."weather/".$randomInt.".jpg";
        break;
    }




    $query = Connection::getCon()->prepare("INSERT INTO `news` (user_id, category, title, content, photo) VALUES ($user_id,TRIM('$category'),TRIM('$title'),TRIM('$content'), '$URL' );");
    $query->execute(array());

     $ndQuery = Connection::getCon()->prepare("SELECT * FROM `news` WHERE user_id='$user_id'");
    $ndQuery->execute(array());
    $ndArray = array_reverse($ndQuery->fetchAll(PDO::FETCH_ASSOC))[0]["news_id"];
    return $ndArray;
  }
}
