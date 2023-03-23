<?php
    require_once "inc/header.php";
    $languages = Database::table('languages')->getAll();
    $categories = Database::table('categories')->getAll();
    if($_SERVER['REQUEST_METHOD']== "POST"){
        $article = Article::create($_POST);
        if($article == 'success'){
                Helper::redirect('index.php');
        }

    }

?>
<div class="col-md-8">
 <div class="card card-dark">
                                        <div class="card-header">
                                                <h3>Create New Article</h3>
                                        </div>
                                        <div class="card-body">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                                <label for="" class="text-white">Enter Title</label>
                                                                <input type="text" class="form-control" name="title"
                                                                        placeholder="enter username">
                                                        </div>
                                                        <div class="form-group">
                                                                <label for="" class="text-white">Choose Category</label>
                                                                <select name="category" id="" class="form-control">
                                                                <?php foreach($categories as $category){ ?>
                                                                        <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                                                                <?Php } ?>
                                                                </select>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                                
                                                                <?php foreach($languages as $language){ ?>
                                                                <span class="mr-2">
                                                                        <input class="form-check-input" type="checkbox"
                                                                                name="language[]" value="<?php echo $language->id; ?>">
                                                                        <label class="form-check-label"
                                                                                for="inlineCheckbox1"><?php echo $language->name; ?></label>
                                                                </span>
                                                                <?Php } ?>
                                                                
                                                        </div>
                                                        <br><br>
                                                        <div class="form-group">
                                                                <label for="">Choose Image</label>
                                                                <input type="file" class="form-control" name="image">
                                                        </div>
                                                        <div class="form-group">
                                                                <label for="" class="text-white">Enter Description</label>
                                                                <textarea name="description" class="form-control" id=""
                                                                        cols="30" rows="10"></textarea>
                                                        </div>
                                                        <input type="submit" value="Create"
                                                                class="btn  btn-outline-warning">
                                                </form>
                                        </div>
                                </div>
                                </div>


<?php
    require_once "inc/footer.php";
?>

