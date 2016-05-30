<?php
require_once 'models/User_model.php';
require_once 'models/Security_model.php';
require_once 'models/Tag_model.php';
class VK_Controller{
    public $user_model;
    public $security_model;
    public $vars = array();
    function __construct()
    {
        $this->user_model = new User_model();
        $this->security_model = new Security_model();
        $this->tag_model = new Tag_model();
    }
     function set($data){
         $this->vars = array_merge($this->vars, $data);
     }

    function views($filename){
        extract($this->vars);
        require (ROOT.'views/'.$filename.'.php');
    }
    function base_url(){
        return 'http://'.$_SERVER['SERVER_NAME'].':8080/matcha/';
    }
}
?>