<?php

use \PHPUnit\Framework\TestCase;


class QueueTest extends TestCase
{

    protected static $queue;


    /**
     * Set the queue for all the tests.
     * The Queue is autoloaded (see composer.json).
     *
     * @return void
     */
    public static function setUpBeforeClass(): void
    {
        static::$queue = new Queue;
    }


    public function test_new_queue_is_empty()
    {
        $this->assertTrue(static::$queue->isEmpty());
    }


    public function test_an_item_is_added_to_the_queue()
    {
        static::$queue->push("Test item");
        $this->assertEquals(1, static::$queue->count());
    }


    public function test_an_item_is_removed_from_the_queue()
    {
        $item = static::$queue->pop();

        $this->assertEquals("Test item", $item);
        $this->assertEquals(0, static::$queue->count());
        $this->assertTrue(static::$queue->isEmpty());
    }


    /**
     * Add several elements to the [empty] queue.
     * The queue should extract them "First In First Out".
     *
     * @return void
     */
    public function test_add_and_pop_elements()
    {
        static::$queue->push("Test item 1");
        static::$queue->push("Test item 2");
        static::$queue->push("Test item 3");
        static::$queue->push("Test item 4");
        static::$queue->push("Test item 5");
        static::$queue->push("Test item 6");
        static::$queue->push("Test item 7");
        static::$queue->push("Test item 8");
        static::$queue->push("Test item 9");
        $this->assertEquals(9, static::$queue->count());

        //And now, pop 3 elements and see if they are "Test item 1",
        // "Test item 2" and "Test item 3".
        $item1 = static::$queue->pop();
        $this->assertEquals("Test item 1", $item1);

        $item2 = static::$queue->pop();
        $this->assertEquals("Test item 2", $item2);

        $item3 = static::$queue->pop();
        $this->assertEquals("Test item 3", $item3);
    }


    /**
     * Test the capture of an exception.
     * In the previous test there were 6 elements left in the queue.
     *
     * @return void
     */
    public function test_exception_thrown_when_popping_on_empty_queue()
    {
        $this->assertEquals(6, static::$queue->count());
        $this->assertFalse(static::$queue->isEmpty());

        $this->expectException(EmptyQueueException::class);
        $this->expectExceptionMessage("Queue is empty");

        static::$queue->purge();
        $item = static::$queue->pop();                   //  <- Exception!!!

        $this->assertEquals(0, static::$queue->count());
        $this->assertTrue(static::$queue->isEmpty());
    }


    /**
     * Eliminate the queue.
     *
     * @return void
     */
    public static function tearDownAfterClass(): void
    {
        static::$queue = null;
    }


}