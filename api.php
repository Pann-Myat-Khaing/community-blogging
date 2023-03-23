<?Php
    require_once "core/autoload.php";

    $request=$_GET;
    if(isset($request['like'])){

        $user_id=$request['user_id'];
        $article_id=$request['article_id'];
        $u = Database::table('article_like')->where('user_id',$user_id)->andWhere('article_id',$article_id)->getOne();
        
        if($u){
            $user = Database::raw("Delete from article_like where user_id=$user_id and article_id=$article_id");
            $count = Database::table('article_like')->where('article_id',$article_id)->count();
            echo "like Removed";
            echo $count;
        }else{
            
            $user = Database::insert('article_like',[
                'user_id' => $user_id,
                'article_id' => $article_id
            ]);
            if($user){
                $count = Database::table('article_like')->where('article_id',$article_id)->count();
               echo $count;
            }
        }
        
    }

    if($_POST['comment']){
        
        $user_id = User::Auth()['id'];
        if(!isset($user_id)){
            echo "Not Login";
            die();
        }else{
        $article_id=$_POST['article_id'];
        $comment = $_POST['comment'];

        $comment = Database::insert('article_comment',[
            'user_id'=>$user_id,
            'article_id'=>$article_id,
            'comment'=>$comment
        ]);
        if($comment){
            
            $cmt = Database::table('article_comment')->where('article_id',$article_id)->orderBy('id','DESC')->getAll();
            // echo count($cmt);
            $html = "";
            foreach($cmt as $c){
            $user = Database::table('users')->where('id',$user_id)->getOne();
            $html.="
            <div class='card-dark mt-1'>
                <div class='card-body'>
                    <div class='row'>
                        <div class='col-md-1'>
                            <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXg70J8td4HQA6_zLYKYDaFWpSeGMjT-fSng&usqp=CAU' style='width:50px; height:50px; object-fit:cover; border-radius:50%' alt=''>
                        </div>
                        <div class='col-md-4 d-flex align-items-center'>
                        {$user['name']}
                        </div>
                    </div>
            <hr>
                <p>{$c->comment}</p>
                </div>
            </div>
            ";
            }
        }
    }
}
