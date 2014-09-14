<?php

class MySqlConnect{

 protected $server = 'localhost';
 protected $user = 'root';
 protected $password = '';
 protected $resource = 'news';
 
 public function __construct()  {
    $link = mysql_connect($this->server, $this->user, $this->password);
        if(!$link) {
        mysql_error();
        }
		else{
		mysql_select_db($this->resource);
		}
   }
}