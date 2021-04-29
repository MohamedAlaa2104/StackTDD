<?php

require_once __DIR__ . '/exceptions/EmptyStackPoppedException.php';
class Stack
{

    /**
     * @var false
     */
    private  $count = 0;
    private array $elements;

    public function isEmpty()
    {
        return !(bool)$this->count;
    }

    public function push(int $element)
    {
        $this->elements[$this->count++] = $element;
    }

    public function pop()
    {
        if ($this->isEmpty())
            throw new EmptyStackPoppedException();
        return $this->elements[--$this->count];
    }
}