<?php
require_once "inc/header.php";
if(User::auth()){
    Helper::redirect('index.php');
}
$user_db = new User();
if(isset($_POST['submit'])){
   $user= $user_db->login($_POST);
}

if(isset($user) and $user == 'success'){
    Helper::redirect("index.php");
}

?>
 <!-- Content -->
 <div class="col-md-8">
<div class="card card-dark">
    <div class="card-header bg-warning">
        <h3>Login</h3>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <?php 
            if(isset($user) and is_array($user))
            {
                foreach($user as $error)
                {
                
            ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php }} ?>
            <div class="form-group">
                <label for="" class="text-white">Enter Email</label>
                <input type="text" name="email" class="form-control" placeholder="enter email">
            </div>
            <div class="form-group">
                <label for="" class="text-white">Enter Password</label>
                <input type="text" name="password" class="form-control" placeholder="enter password">
            </div>
            <input type="submit" value="Login" name="submit" class="btn  btn-outline-warning">
        </form>
    </div>
</div>

<?php
require_once "inc/footer.php";
?>