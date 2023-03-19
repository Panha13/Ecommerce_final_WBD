<?php
    session_start();
    function isLogin(){
        if(!isset($_SESSION['valid'])){
            header("location: login.php");
            exit(0);
        }
    }
    function checkLogin($username,$password){
        global $conno;
        $sql = "select user_name, user_password from tbl_user where user_name='$username' and user_password='$password'";
        $result = mysqli_query($conno,$sql);
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_array($result);
            $_SESSION['fullname']=$row['user_name'];
            $_SESSION['valid']=true;
            return true;
        }
        return false;
    }
    function logout(){
        session_destroy();
        header("location: login.php");
    }
?>
