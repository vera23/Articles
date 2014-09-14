<?php 

class ArticleModel extends AbstractModel{
    
	static protected $table = 'articles';
    static public $cols = array('title', 'content');
}