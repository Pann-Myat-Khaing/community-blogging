<?php
    require_once "inc/header.php";
    if(!isset($_GET['slug'])){
        Helper::redirect('404.php');
    }else{
        $slug = $_GET['slug'];
        $article=Article::detail($slug);
        
        // echo "<pre>";
        // print_r($article);
    }
?>

<div class="col-md-8">

                                <div class="card card-dark">
                                        <div class="card-body">
                                                <div class="row">
                                                        <div class="col-md-12">
                                                                <div class="card card-dark">
                                                                        <div class="card-body">
                                                                                <div class="row">
                                                                                        <!-- icons -->
                                                                                        <div class="col-md-4">
                                                                                                <div class="row">
                                                                                                        <div
                                                                                                                class="col-md-4 text-center">
                                                                                                                <?Php 
                                                                                                                $user = User::auth();
                                                                                                                  $user_id=$user? $user['id']:'0';
                                                                                                                  $article_id = $article['id'];
                                                                                                                  $myLike=Database::raw("Select * from article_like where user_id=$user_id and article_id=$article_id")->getOne();
                                                                                                                  
                                                                                                                  if(!isset($mylike)){
                                                                                                                ?>
                                                                                                                <i
                                                                                                                     id="like" class="far fa-heart text-danger" user_id="<?php echo $user_id; ?>" article_id="<?php echo $article_id; ?>">
                                                                                                                  </i>
                                                                                                                <?php }else{ ?>
                                                                                                                <i
                                                                                                                     id="like" class="fas fa-heart text-white" user_id="<?php echo $user_id; ?>" article_id="<?php echo $article_id; ?>">
                                                                                                                </i>      
                                                                                                                <?php } ?>
                                                                                                                <small
                                                                                                                      id="like_count"  class="text-muted"><?php echo $article['like_count'];?></small>
                                                                                                        </div>
                                                                                                        <div
                                                                                                                class="col-md-4 text-center">
                                                                                                                <i
                                                                                                                        class="far fa-comment text-dark"></i>
                                                                                                                <small
                                                                                                                        id="cmt_count" class="text-muted"><?php echo $article['comment_count'];?></small>
                                                                                                        </div>

                                                                                                </div>
                                                                                        </div>
                                                                                        <!-- Icons -->

                                                                                        <!-- Category -->
                                                                                        <div class="col-md-4">
                                                                                                <div class="row">
                                                                                                        <div
                                                                                                                class="col-md-12">
                                                                                                                <a href="" class="badge badge-primary"><?php echo $article['category'];?></a>

                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                        <!-- Category -->


                                                                                        <!-- Category -->
                                                                                        <div class="col-md-4">
                                                                                                <div class="row">
                                                                                                        <div class="col-md-12">
                                                                                                        <?php 
                                                                                                        foreach($article['language']as $language){
                                                                                                        ?>
                                                                                                                
                                                                                                                <a href=""
                                                                                                                        class="badge badge-success"><?php echo $language->name;?>
                                                                                                                </a>
                                                                                                        <?php
                                                                                                        }
                                                                                                        ?>       
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                        <!-- Category -->

                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12">
                                                        <h3><?Php echo $article['name']; ?></h3>
                                                        <p>
                                                                <?php echo $article['description'];?>
                                                        </p>
                                                </div>

                                                <!-- Creat Comments -->
                                                <div class="card card-dark mb-3">
                                                        <div class="card-body">
                                                                <form action="" method="post" id="frmCmt">
                                                                        <input type="text" id="comment" placeholder="Write your thoughs here . . . " class="form-control my-2">
                                                                        <input type="submit" value="Create" class="btn btn-outline-primary float-right my-4">
                                                                </form>
                                                        </div>
                                                </div>
                                                <!-- Comments -->
                                                <div class="card card-dark">
                                                        <div class="card-header">
                                                                <h4>Comments</h4>
                                                        </div>
                                                        <div class="card-body">
                                                                <div id="comment-list">
                                                                <!-- Loop Comment -->
                                                                <?php 
                                                                // echo "<pre>";
                                                                foreach($article['comment']as $comment){
                                                                        $comment_owner = Database::table('users')->where('id',$comment->user_id)->getOne();

                                                                ?>
                                                                <div class='card-dark mt-1'>
                                                                        <div class='card-body'>
                                                                                <div class='row'>
                                                                                <div class='col-md-1'>
                                                                                        <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXg70J8td4HQA6_zLYKYDaFWpSeGMjT-fSng&usqp=CAU' style='width:50px; height:50px; object-fit:cover; border-radius:50%' alt=''>
                                                                                </div>
                                                                                <div class='col-md-4 d-flex align-items-center'>
                                                                                        <?php echo $comment_owner['name'];?>
                                                                                </div>
                                                                                </div>
                                                                        <hr>
                                                                        <p><?php echo $comment->comment;?></p>
                                                                        </div>
                                                                </div>

                                                                
                                                                <?php  }?>
                                                        </div>
                                                         

                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
<?php
    require_once "inc/footer.php";
?>

<script>

        //comment
        var frmCmt = document.getElementById('frmCmt');
        var cmt_count = document.querySelector('#cmt_count');
        frmCmt.addEventListener('submit',function(e){
                e.preventDefault();
                var data = new FormData();
                data.append('comment',document.getElementById('comment').value);
                data.append('article_id',<?Php echo $article['id'];?>);
                
                axios.post('api.php',data)
                .then(function(res){
                        if(res.data=="Not Login"){
                                location.href = 'login.php';
                        }else{
                                cmt_count.innerHTML=res.data.slice(0,4);
                                document.getElementById('comment-list').innerHTML = res.data.substr(3);
                        }
                       
                })
                frmCmt.reset();
        });

        
        var like = document.querySelector('#like');

        // Save the state to localStorage before the page unloads
        window.addEventListener('beforeunload', () => {
        localStorage.setItem('myElementClasses', like.classList.value);
        });

        // Retrieve the state from localStorage on page load
        if (localStorage.getItem('myElementClasses')) {
        like.classList.value = localStorage.getItem('myElementClasses');
        }

        //like
        
        var like_count = document.querySelector('#like_count');
        // alert("hello");
        like.addEventListener("click",function(){
                var user_id= like.getAttribute('user_id');
                var article_id= like.getAttribute('article_id');
                if(user_id==0){
                        location.href = "login.php";
                }else{
                        axios.get(`api.php?like&user_id=${user_id}&article_id=${article_id}`)
                .then(function(res){
                        if(Number.isInteger(res.data)){
                                like_count.innerHTML= res.data;
                                like.classList.remove('far');
                                like.classList.remove('text-white');
                                like.classList.add('fas');
                                like.classList.add('text-danger');
                                toastr.success("success");
                                // location.reload();
                        }
                        else{
                                // console.log(res.data);
                                // if(res.data == "like Removed"){
                                        res.data=res.data.substr(13);
                                        like_count.innerHTML= res.data;
                                        like.classList.remove('fas');
                                        like.classList.remove('text-danger'); 
                                        like.classList.add('far');
                                        like.classList.add('text-white');  
                                        // location.reload();
                                // }
                                // console.log(res.data);
                                // toastr.warning(res.data);
                        }
                })
                }
                
                
        })
</script>