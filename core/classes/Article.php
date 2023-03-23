<?php
require_once "Database.php";
class Article
{
    public static function all()
    {
        $articles = Database::table('articles')->orderBy('id',"DESC")->paginate(3);
        
        foreach($articles['data'] as $article){
            $cmt_count= Database::table('article_comment')->where('article_id',$article->id)->count();         
            $article->comment_count=$cmt_count;
            $like_count = Database::table('article_like')->where('article_id',$article->id)->count();
            $article->like_count = $like_count;
        }
        
        return $articles;
    }
    public static function detail($slug)
    {
        $article = Database::table('articles')->where('slug',$slug)->getOne();
        //try to get like count
        $like = Database::table('article_like')->where('article_id',$article['id'])->count();
        $article['like_count'] = $like;
        //try to get cmt count
        $cmt = Database::table('article_comment')->where('article_id',$article['id'])->orderBy('id','desc')->getAll();
        $article['comment_count'] = count($cmt);
        $article['comment'] = $cmt; 
        //try to get languages
        $languages = Database::raw("SELECT languages.id,languages.name,languages.slug
        FROM article_language 
        left join languages 
        on languages.id = article_language.language_id
        where article_id={$article['id']}")->getAll();
        $article['language']= $languages;

        //try to get category
        $category = Database::table('categories')->where('id',$article['category_id'])->getOne();
        $article['category'] = $category['name'];
        return $article;
    }
    public static function articleByCategory($slug){
        $category= Database::table('categories')->where('slug',$slug)->getOne();
        $articles = Database::table('articles')->where('category_id',$category['id'])->orderBy('id',"DESC")->paginate(3,"category=$slug");
        foreach($articles['data'] as $article){
            $cmt_count= Database::table('article_comment')->where('article_id',$article->id)->count();         
            $article->comment_count=$cmt_count;
            $like_count = Database::table('article_like')->where('article_id',$article->id)->count();
            $article->like_count = $like_count;
        }
        return $articles;
    }
    
    public static function articleByLanguage($slug){
        $language_id = Database::table('languages')->where('slug',$slug)->getOne()['id'];

       
        $articles = Database::raw("SELECT * FROM article_language
        inner join articles 
        on article_language.article_id = articles.id
        where language_id={$language_id}")->orderBy('articles.id','desc')->paginate("3","language=$slug");
        foreach($articles['data'] as $article){
            $cmt_count= Database::table('article_comment')->where('article_id',$article->id)->count();         
            $article->comment_count=$cmt_count;
            $like_count = Database::table('article_like')->where('article_id',$article->id)->count();
            $article->like_count = $like_count;
        }
        return $articles;
    }
    public static function create($request)
    {
        $error=[];
        if(isset($request)){
            if(empty($request['title'])){
                $error[] = "Title field required";
            }
            if(empty($request['description'])){
                $error[] = "Description field required";
            }
            if(count($error)){
                return $error;
            }
            else{
                $user_id = User::auth()['id'];
                $title = $request['title'];
                $category = $request['category'];
                $languages = $request['language'];
                $desc = $request['description'];
                $slug = Helper::slug($title);
                //image upload
                $image = $_FILES['image'];
                $image_name = $image['name'];
                $path= "assets/article/$image_name";
                $tmp_name = $image['tmp_name'];
                if(move_uploaded_file($tmp_name,$path)){
                    $article = Database::insert('articles',[
                        'name' => $title,
                        'slug' => $slug,
                        'user_id' => $user_id,
                        'category_id'=>$category,
                        'image' => $path,
                        'description' => $desc
                    ]);

                    if($article)
                    {
                        foreach($languages as $language){
                        Database::insert('article_language',[
                            'article_id' => $article['id'],
                            'language_id' => $language
                        ]);
                        
                        }
                        return "success";
                    }
                }
            }
        
        
        }
    }

    public static function search($search)
    {
        $articles = Database::table('articles')->where('name','like',"%$search%")->paginate(3,'search=$search');
        foreach($articles['data'] as $article){
            $cmt_count= Database::table('article_comment')->where('article_id',$article->id)->count();         
            $article->comment_count=$cmt_count;
            $like_count = Database::table('article_like')->where('article_id',$article->id)->count();
            $article->like_count = $like_count;
        }
        return $articles;

    }
}

?>