<?php
require_once "Helper.php";
class User
{
    public static function auth()
    {
        if(isset($_SESSION['user_id'])){
            
            $user_id = $_SESSION['user_id'];
            $user = Database::table('users')->where('id',$user_id)->getOne();
            return $user;
        }
        return false;
    }
    public function login($request)
    {
        $error = [];
        if(isset($request)){
            if(empty($request['email'])){
                $error[] = "Email field required";
            }
            if(empty($request['password'])){
                $error[] = "Password required";
            }
            if(!filter_var($request['email'],FILTER_VALIDATE_EMAIL)){
                $error[] = "Invalid Email";
            }
            if(count($error)){
                return $error;
            }
            else{
                $email = Helper::filter($request['email']);
                $password = $request['password'];
                $user = Database::table('users')->where('email',$email)->getOne();

                if($user){
                    if(password_verify($password,$user['password'])){
                        $_SESSION['user_id']=$user['id'];
                        
                        Helper::redirect('index.php');
                         $error[]= "success";
                         return $error;
                    }else{
                        $error[] = "Incrorrect Password";
                        return $error;

                    }
                }
                else{
                    $error[] = "Invalid Email address";
                    return $error;
                }
               
            
        }
    }
}
    public function register($request)
    {
        $error = [];
        $db = new Database();
        if(isset($request)){
            if(empty($request['name'])){
                $error[]='Name field is required';
            }
            if(empty($request['email'])){
                $error[]='Email field is required';
            }
            if(!filter_var($request['email'],FILTER_VALIDATE_EMAIL)){
                $error[]='INVALID email Fomat';
            }
            if(empty($request['password'])){
                $error[]='Password field is required';
            }
            $user = Database::table('users')->where('email',$request['email'])->getOne();
            if($user){
                $error[] = "Email account already exist";
            }
            if(count($error)){
                return $error;
            }
            else{
                //insert db
                $user = $db::insert('users',[
                    'name' => Helper::filter($request['name']),
                    'slug' => Helper::slug($request['name']),
                    'email' => Helper::filter($request['email']),
                    'password' => password_hash($request['password'],PASSWORD_DEFAULT)
                ]);
                // return $user;
                //session userid
                $_SESSION['user_id']=$user['id'];
                // $_SESSION['user_id'] = $user->id;

                //header index
                return 'true';
            }
        }
        
    }
    public static function update($request,$image)
    {
        $name = $request['name'];
        $user = Database::table('users')->where('name',$name)->getOne();
        $user_id = $user['id'];
        $slug = Helper::slug($name);
        $email = $request['email'];
            if(empty($password)){
                $password = $user['password'];
            }
            else{
                $password = password_hash($request['password'],PASSWORD_DEFAULT);
            }
                $image_name = $image['name'];
                $path = "assets/user/$image_name";
                $tmp_name = $image['tmp_name'];
                $move= move_uploaded_file($tmp_name,$path);
                if($move){
                $user = Database::update('users',[
                    'name' => $name,
                    'slug' => $slug,
                    'email' => $email,
                    'password' => $password,
                    'image' => $path
                ],$user_id);
                return 'success';
            }
       
    }
}

