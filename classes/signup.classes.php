<?php
 
 class Signup extends Dbh {

    protected function setUser($uid, $pwd, $email, ){
        // $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email)VALUE(?, ?, ?);');
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ?;');
        $hashedpwd = password_hash( $pwd, PASSWORD_DEFAULT);

        if ($stmt->execute(array($uid, $hashedpwd, $email))){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
       
    }

    protected function checkUser($uid, $email, $resultCheck){
    $stmt = $this->connect()->prepare('SELECT user_uid FROM users WHERE users_uid = ? OR user_email = ?;');
    if ($stmt->execute(array($uid, $email))){
        $stmt = null;
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    $resultCheck;
    if($stmt->rowCount()>0){
        $resultCheck = false;
    }else{
        $resultCheck = true;
    }
    return $resultCheck;
}
 }