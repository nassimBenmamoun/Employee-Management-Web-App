<?php

class UsersController{

    public function register(){
        if(isset($_POST['submit'])){
            $options = ['cost' => 12];
            $password = password_hash($_POST['pw'],PASSWORD_BCRYPT,$options);
            $data = array(
                'fullname' => $_POST['fullname'],
                'username' => $_POST['username'],
                'password' => $password
            );
            $result = User::createUser($data);
            if($result === 'ok'){
                Session::set('success','Compte créé');
                Redirect::to("login");
            }else{
                Session::set('error','Compte Non créé');
            }

        }
    }
    
    public function login(){
        if(isset($_POST['submit'])){
            $data = array(
                'username' => $_POST['username']
            );
            $user = User::logUser($data);
            if($user->username === $_POST['username'] && password_verify($_POST['pw'],$user->password)){
                $_SESSION['logged'] = true;
                $_SESSION['username'] = $user->username;
                Redirect::to('home');
            }else{
                Session::set('error','Username ou Mot de passe incorrecte');
                Redirect::to("login");
            }
        }
    }

    static public function logout(){
        session_destroy();
    }



}

?>