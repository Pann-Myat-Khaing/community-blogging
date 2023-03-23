<?php
//  ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
// include_once "inc/header.php";
// // $_SESSION['user_id']="he";

// if(isset($_SESSION['user_id'])){
//     echo $_SESSION['user_id'];
//     $user_id = $_SESSION['user_id'];
//     $user = Database::table('users')->where('id',$user_id)->getOne();
//     // return $user;
// }
// else{
//     echo "ma shi";
// }
// $password = "ttk123";
// if(password_verify("ttk123","$password")){
// echo "match";
// }else{
//     echo "Un";
// }
require_once "inc/header.php";
    
    //     Helper::redirect('404.php');
    // }else{
        // $article = Database::table('articles')->where('slug','reactjs')->getOne();
        // $slug = $_GET['slug'];
        // $article=Article::detail($slug);
// $languages = Database::raw("SELECT languages.id,languages.name,languages.slug
// FROM article_language 
// left join languages 
// on languages.id = article_language.language_id
// where article_id={$article['id']}")->getAll();
// $article['language']= $languages;
        
// echo "<pre>";
// print_r($article);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<i class="fa-regular fa-heart"></i>
</body>
</html>