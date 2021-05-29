<?php
$con=mysqli_connect("localhost","root","","groceryshopping")or die("couldn't connect");

session_start();
    if( isset($_SESSION['login']) && isset($_POST['password']))
    {
        $n=$_POST["password"];
        $id=$_SESSION["login"];

        $query="UPDATE users SET password='$n' WHERE id=$id";
        if(mysqli_query($con,$query)){
            session_unset();
            header("Location:.\Login.php");
        }
        else{
            session_unset();
            echo "query error";
        }
    }
    else{
        session_unset();
        header("location:..\fpEnterMail.php?err=wrongpass");
    }

?>