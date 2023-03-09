<?php
require 'cors.php';
require 'Database.php';
$obj = new Database();

$out = array('email'=>false,'password'=>false,'checkedEmail'=>false,'checkedPassword'=>false,'empties'=>false,'success'=>false);

if($_SERVER['REQUEST_METHOD']== 'POST'){
   if(isset($_POST['email'])){
       $email = $_POST['email'];
       $checkEmail = $obj->query("SELECT * FROM users WHERE email = '$email'");
       if(!$checkEmail){
           $out['checkedEmail'] = true;
           $out['message'] = 'Користувача з таким логіном немає в базі даних.Зареєструйтесь';
       }
       elseif (isset($_POST['password'])){
           $password = $_POST['password'];
           $checkPassword = $obj->query("SELECT password FROM users WHERE email = '$email'");
       if($password !== $checkPassword[0]['password']){
           $out['checkedPassword'] = true;
           $out['message'] = 'Неправильно введений пароль.Спробуйте ще';
       }
       else {
           $out['success'] = true;
           $obj->query("UPDATE users SET is_auth = 1 WHERE email = '$email'");
       }
       }
   }
}

echo json_encode($out);