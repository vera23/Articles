  <?php

    abstract class AbstractController {
        
	    
	    public function action($action,$id){
          
		    $method = $action. 'Action';
            if(method_exists($this, $method)){
			    if (null == $id || is_numeric($id)){
				$this->id = $id;
		        $this->$method($id);
			    }
			}
	     }
	    }
