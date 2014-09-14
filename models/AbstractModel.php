<?php
error_reporting(E_ALL);
abstract class AbstractModel{


    static protected $table;
	
	public $isNew = true;
	
	static protected function getDbh() {
	    $dsn = 'mysql:dbname=news;host=localhost';
		return new Pdo( $dsn, 'root', '');
	}
	
	static public function findAll() {
	    $sql = "SELECT * FROM " .static::$table;
		$sth = self::getDbh() ->prepare($sql);
		$sth->execute();
		$sth->setFetchMode(PDO::FETCH_CLASS, get_called_class());
		$res= $sth->fetchAll();
		if (count($res)== 0) {
		    throw new Exception ('Нет Статей');
        }
		foreach ($res as $el) {
		    $el->isNew = false;
		}
		return $res;
	}

	static public function findByPk($id)  {
	    $sql = "SELECT * FROM " .static::$table ." WHERE id =:id";
		$sth = self::getDbh() ->prepare($sql);
	    $sth->execute(array(':id' => $id));
		$sth->setFetchMode(PDO::FETCH_CLASS, get_called_class());
		$res = $sth->fetch();
        if(!$res) {
            throw new Exception('Нет статьи с таким номером');
        }
        $res->isNew = false;
		return $res;
	}
	
	
	public function save() {
    
	    $names = $this->getColumnNames();
		
		foreach ($names as $value){
		$a= $value[0];
		$b= $value[1];
		$this->a =$a;
		$this->b = $b;
		
	    if ($this->isNew)  {
		    $sql = "INSERT INTO " . static::$table . ' (' . $a . ','. $b . ")
			VALUES(:title, :content)";
			$dbh = self::getDbh();
			$sth = $dbh->prepare($sql);
		    $sth->execute(array(':title' => $this->title,
			                    ':content' => $this->content,));
			$this->isNew = false;
            $this->id = $dbh->lastInsertId();			
		}
		else {
		$sql = "UPDATE " .static::$table . "
		SET title=:title, content=:content 
		WHERE id=:id";
			$dbh = self::getDbh();
			$sth = $dbh->prepare($sql);
		    $sth->execute(array(':title' => $this->title,
			                    ':content' => $this->content,
								':id' => $this->id,
								));	
		}
		
	}
	}

	public function getColumnNames() {
	    $this->arr = $arr = array();
	
	    $sql = "SHOW COLUMNS FROM ".static::$table;
	    $dbh = self::getDbh();
	    $sth = $dbh->prepare($sql);
	    $sth->execute();
	    $res= $sth->fetchAll();
	    foreach($res as $key=>$result) {
	        foreach ($result as $key2=> $value) {
		        if($key2 === 'Field'){
			        if($value !== 'id'){
				    $arr[]=$value;
					}
			    }
		    }
	    }
		$array[] = $arr;
		$this->array = $array;
		return $array;
	}
	
	
	
	public function delete() {
	    $sql = "DELETE FROM " .static::$table . " WHERE id=:id";
		$sth = self::getDbh() ->prepare($sql);
	    $sth->execute(array(':id' => $this->id));
		$count = $sth->rowCount();
	     if(0 == $count) {
		    throw new Exception ('Нет статьи с таким номером!');
		 }
	     else
			return $this->id;
	}
}