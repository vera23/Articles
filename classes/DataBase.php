<?php
   
   class DataBase extends MySqlConnect
   {    
         public $id;
		 public $action;
		 
		 public function id($id)
		 {
		   $this->id = $id;
		   $this->action = $action;
		 }	 
			
		 public function view_all()
		 { 
			 $this->arr = $arr = array();
			 
		     $res = mysql_query( "SELECT * FROM articles" );
			 while($row = mysql_fetch_assoc($res))
			 {  
				$arr[] = $row;
				$this->arr = $arr;
				}	
             $array[] = $arr;
			 $this->array = $array;
			 return $array;
		}


		
		public function view_one($id)
		{
		      $this->art = $art = array();
		      $res = mysql_query("SELECT id, title, content FROM articles WHERE id = '$id' ");
			  while( $row = mysql_fetch_assoc($res))
		    {  
			 $art[] = $row;
				$this->art = $art;
			 }
			 $text[] = $art;
			 $this->text = $text;
			 return $text;
		}
		
		public function delete_article($id)
		{
		    $res = mysql_query("DELETE FROM articles WHERE id= '$id'  ");
					
	        if(0 == mysql_affected_rows())
			{
	            $r= 'Статьи с номером '.$id.'  не существует';
	        }
	        else 
			{
                $r = 'Статья номер '.$id.' успешно удалена!';
		    }	 
            return $r;			
		}
		
		public function add_article(){
		    
			    $res = mysql_query(
                "INSERT INTO articles(id, title, content)
                VALUES ('3', 'Трое из Простоквашино - жуткая изнанка советской классики.', 'Эта совсем не детская сказка имеет скрытый, 
                пугающий смысл. О чем же этот мультфильм на самом деле?
                Начинается история незатейливо – некий мальчик, спускается по лестнице и жует бутерброд с колбасой.
                Прямо на лестнице мальчик знакомится с котом, «живущим на чердаке», «который ремонтируют». 
                Запомним эти ключевые слова, они очень важны для понимания сути происходящего, мы вернемся к ним позже.')");
				
				if($res){
				    $output = 'Статья номер 3 успешно добавлена'; 
				}	
                return $output;				
		}
		
		public function change_content($id)
		{
			    $res = mysql_query("UPDATE articles
                SET title = 'ДЕНЬГИ, ОБЕЗЬЯНЫ И ПРОСТИТУЦИЯ',
                content = 'Двое учёных из Йельского университета (экономист и психолог) решили научить обезьян пользоваться деньгами.
				И у них получилось.'
				WHERE id = '$id'");
				
				if(0 == mysql_affected_rows())
				{
                  $output =  'Мы ничего не изменили, будем дальше влачить жалкое существование';
				}
                else
				{
                    $output =  'мы изменили строку '.$id.'! Мы молодцы ';
                }
				return $output;
			}
		 
	}
		

 