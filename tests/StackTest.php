<?php
require_once __DIR__ . '/../Stack.php';
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    private $stack;

    public function testStackIsEmpty()
    {
        self::assertTrue($this->stack->isEmpty());
    }

    public function testAfterPushStackNotEmpty()
    {
        $this->stack->push(656);
        self::assertFalse($this->stack->isEmpty());
    }

    public function testAfterOnePushAndOnePopStackEmpty()
    {
        $this->stack->push(11);
        $this->stack->pop();
        self::assertTrue($this->stack->isEmpty());
    }

    public function testAfterPushTwiceAndPopOnceStackNotEmpty()
    {
        $this->stack->push(3);
        $this->stack->push(35);
        $this->stack->pop();
        self::assertFalse($this->stack->isEmpty());
    }

    public function testPoppingEmptyStackShouldThrowException()
    {
        $this->expectException(EmptyStackPoppedException::class);
        $this->stack->pop();
    }

    public function testAfterPushingAndPoppingGetSameValue()
    {
        $number = rand(10000,99999);
        $this->stack->push($number);
        $result = $this->stack->pop();
        self::assertEquals($number, $result);

        $number = rand(10000,99999);
        $this->stack->push($number);
        $result = $this->stack->pop();
        self::assertEquals($number, $result);

        $number = rand(10000,99999);
        $this->stack->push($number);
        $result = $this->stack->pop();
        self::assertEquals($number, $result);
    }

    public function testAfterTwoPushesAndTwoPopsAssertTheFirstValue()
    {
        $number = rand(1,1000);
        $this->stack->push($number);
        $this->stack->push($number+1);
        $this->stack->pop();
        $result = $this->stack->pop();
        self::assertEquals($number,$result);
    }

    public function setUp(): void
    {
        $this->stack = new Stack();
    }
}