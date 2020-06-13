<?php 

class session{
    public static function init(){
        session_start();
    }
    public static function set($key,$value){
        $_SESSION[$key]= $value;
    }

    public static function get($key){
        if(isset( $_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return false;
        }
        
    }
    public static function checksession(){
        //self::init();
        if($_SESSION["login"] == false){
            self::destroy();
            header("Location: login.php");
        }
    }
  public static function checklogin(){
        if($_SESSION["login"] == true){
            header("Location:profile.php");
        }
    }

    public static function checkloginadmin(){
        if($_SESSION["login"] == true){
            header("Location:dashboard.php");
        }
    }
    public static function destroy(){
        session_destroy();
        session_unset();
         //header("Location: login.php");
    }
}

?>