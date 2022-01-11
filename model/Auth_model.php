<?php

class Auth_model {

    protected $db;
    function __construct($db){
        $this->db = $db;
    }

    function proses_login($user,$pass)
    {
        // untuk password kita enskrip dengan md5
        $row = $this->db->prepare('SELECT * FROM tbl_user WHERE username=? AND password=md5(?)');
        $row->execute(array($user,$pass));
        $count = $row->rowCount();
        if($count > 0)
        {
            return $hasil = $row->fetch();
        }else{
            return 'gagal';
        }
    }
    
}

?>