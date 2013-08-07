<?php
/**
 * class Stack
 * 
 * A stack class
 */ 	
class Stack {

/**
 * The stack
 * @access private
 */	
	private $stack = array();


/**
 * __construct
 * 
 * Creates a new stack
 * @param array $stack An array to initalize the stack to
 */	
	public function __construct(array $stack=array()){
		foreach($stack as $int){
			$this->stack[] = (int)$int;
		}
	}

/**
 * get
 * 
 * Returns the stack as an array
 * @return array
 */		 
	 public function get(){
	 	return $this->stack;
	 }


/**
 * push
 * 
 * Pushes an integer to the stack
 * @param int $value A value to push
 * @return array
 */		 
	 public function push($value){
	 	return array_push($this->stack, (int)$value);
	 }

/**
 * pop
 * 
 * Pops an integer from the stack
 * @throws Exception
 * @return array
 */		 
	 public function pop(){
	 	if(empty($this->stack)){
	 		throw new Exception("Empty stack", 1);
	 	}
	 	return array_pop($this->stack);
	 }
	 
/**
 * outputJSON
 * 
 * Prints out the stack in JSON
 * @return void
 */		 
	 public function outputJSON(){
	 	echo json_encode($this->stack);
	 }
}
