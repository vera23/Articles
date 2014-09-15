<?php

function __autoload($class) { 
            $directory = array('classes/',
                               'models/',
                                'view/' , );		
            foreach($directory as $direct) {
			    if(file_exists($direct . $class. '.php')){
	                require __DIR__ .'//'. $direct . $class . '.php';
			}
	        }
		}