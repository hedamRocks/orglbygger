<?
    session_start();
    $username = 'hjorth';
    $password = 'xombat';
    $loginOk = true;
    $loginMsg = "";
    if($username != $_POST['userName']){
        $loginMsg .= "Brugernavnet er forkert. ";
        $loginOk = false;
    }
    if($password != $_POST['password']){
        $loginMsg .= "Pasword er forkert.";
        $loginOk = false;
    }

    if($loginOk){
        $_SESSION['admin']=true;
        header("Refresh:0;url=../index.php");
    }else{
        session_unset();
        session_destroy();
        header("Refresh:0;url=index.php?loginError=".$loginMsg);
    }
?>
