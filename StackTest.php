<?php
require_once ('Api.php');
require_once ('Stack.php');
/**
 * class StackTest
 *
 * Tests a stack
 */
class StackTest extends PHPUnit_Framework_TestCase {

	/**
	 * setUp
	 *
	 * Creates the new stack we are testing
	 */
	protected function setUp() {
		$this->stack = new Stack( array(1, 2, 3));
	}

	/**
	 * testPush
	 *
	 * Test a push
	 */
	public function testPush() {
		$this->stack->push(4);
		$stack = $this->stack->get();
		$this->assertEquals(4, $stack[count($stack) - 1]);
		$this->assertEquals(4, count($stack));
		return $this->stack;
	}


	/**
	 * testPushFromApi
	 *
	 * Test a push from an API
	 */
	public function testPushFromApi() {
        $stub = $this->getMock('Api');
        $stub->expects($this->any())
             ->method('getValue')
             ->will($this->returnValue(4));
			 
		$this->stack->pushFromApi($stub);
		$stack = $this->stack->get();
		$this->assertEquals(4, $stack[count($stack) - 1]);
		$this->assertEquals(4, count($stack));
	}

	/**
	 * testPop
	 *
	 * Tests a push
	 * @depends testPush
	 */
	public function testPop(Stack $stack) {
		$tail = $stack->pop();
		$this->assertEquals(4, $tail);
	}

	/**
	 * testPrint
	 *
	 * Tests printing the stack as JSON 
	 */
	public function testPrint() {
		$this->expectOutputString('[1,2,3]');
		$this->stack->outputJSON();
	}

	/**
	 * testPopEmpty
	 *
	 * @dataProvider provider
	 * @expectedException Exception
	 * @expectedExceptionMessage Empty stack
	 * @expectedExceptionCode 1
	 */
	public function testPopEmpty(Stack $stack) {
		$stack->pop();
	}

	/**
	 * provider
	 *
	 * Gives initial array to test
	 * @return array
	 */
	public function provider() {
		return array( array(new Stack()) );
	}

}
?>
