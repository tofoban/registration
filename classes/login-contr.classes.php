<?php

class loginContr extends Login {
    private $uid;
    private $pwd;
   
    

    public function __construct($uid, $pwd, $pwdRepeat, $email){
        $this->uid = $uid;
        $this->pwd = $pwd;
    }
        public function loginUser (){
            if($this->emptyInput()==false){
                // echo empty input
                header("location: ../index.php?error=emptyinput");
                exit();
            }
            
            $this->getUser($this->uid, $this->pwd);
        }
    private function emptyInput(){
        $result;
        if(empty($this->uid) || empty( $this->pwd) ){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
    
}