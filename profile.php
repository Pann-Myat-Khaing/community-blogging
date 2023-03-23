<?php
require_once "inc/header.php";
if(!isset($_GET['user'])){
        Helper::redirect('login.php');
}
else{
        $slug = $_GET['user'];
        $user = Database::table('users')->where('slug',$slug)->getOne();
        if(isset($_POST['submit'])){ 
                if(isset($_FILES['image'])){
                $image = $_FILES['image'];     
                }else{
                $image = $user['image'];
                }
                $msg = User::update($_POST,$image);
                if($msg == 'success'){
                        Helper::redirect('index.php');
                }
        }
}
?>
 <div class="col-md-8">
<div class="card card-dark">
        <div class="card-header bg-warning">
                <h3>Register</h3>
        </div>
        <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                                <label for="" class="text-white">Enter Your Name</label>
                                <input type="text" name="name" value="<?php echo $user['name'];?>" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="" class="text-white">Enter Email</label>
                                <input type="name" name="email" class="form-control" value="<?php echo $user['email'];?>">
                        </div>
                        <div class="form-group">
                                <label for="" class="text-white">Enter Password</label>
                                <input type="text" name="password" class="form-control" placeholder="enter password">
                        </div>
                        <div class="form-group">
                                <label for="" class="text-white">Choose Your Image</label>
                                <input type="file" name="image" class="form-control"><br>
                                <img src="<?php echo $user['image'];?>" alt="" style="max-width:300px;">
                        </div>
                        <input type="submit" name="submit" value="Update" class="btn  btn-outline-warning">
                </form>
        </div>
</div>
<?php
require_once "inc/header.php";
?>