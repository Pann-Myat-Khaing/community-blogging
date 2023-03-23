<?Php
require_once "inc/header.php";
if(isset($_GET['category'])){
        $slug = $_GET['category'];
        $articles = Article::articleByCategory($slug);
}elseif(isset($_GET['language'])){
        $slug = $_GET['language'];
        $articles = Article::articleByLanguage($slug);
}elseif(isset($_GET['search'])){
        $search = $_GET['search'];
        $articles = Article::search($search);
}else{
        $articles = Article::all();
}

?>
 <!-- Content -->
 <div class="col-md-8">
<div class="card card-dark">
        <div class="card-body">
                <a href="<?php echo $articles['prev_page'];?>" class="btn btn-danger">Previous Posts</a>
                <a href="<?php echo $articles['next_page'];?>" class="btn btn-danger float-right">Next Posts</a>
        </div>
</div>
<div class="card card-dark">
        <div class="card-body">
                <div class="row">
                        <?php 
                                foreach($articles['data'] as $data){
                                        
                                
                        ?>
                        <!-- Loop this -->
                        <div class="col-md-4 mt-2">
                                <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="<?Php echo $data->image;?>" alt="Card image cap" style="max-height:288px; object-fit:cover;">
                                        <div class="card-body">
                                                <h5 class="text-dark">
                                                        <?php echo $data->name; ?>
                                                </h5>
                                        </div>
                                        <div class="card-footer">
                                                <div class="row">
                                                        <div class="col-md-4 text-center">
                                                                <i class="fas fa-heart text-warning">
                                                                </i>
                                                                <small class="text-muted"><?php echo $data->like_count;?></small>
                                                        </div>
                                                        <div class="col-md-4 text-center">
                                                                <i class="far fa-comment text-dark"></i>
                                                                <small class="text-muted"><?php echo $data->comment_count;?></small>
                                                        </div>
                                                        <div class="col-md-4 text-center">
                                                                <a href="<?Php echo "detail.php?slug=$data->slug"; ?>" class="badge badge-warning p-1">View</a>
                                                        </div>
                                                </div>

                                        </div>
                                </div>
                        </div>
                        
                        <?php
                              }  
                        ?>
                </div>
        </div>
</div>

<?Php
require_once "inc/footer.php";
?>