<?php

require_once 'QueueInterface.php';


/**
 * This queue is implemented using PHP arrays.
 * The php array functions are also used, although I know the array_shift operation
 * is not very efficient; its cost in big O notation is O(n).
 */
class Queue implements QueueInterface
{

    protected $queue;


    /**
     * Create a new queue (an array) without elements in it.
     */
    public function __construct()
    {
        $this->queue = array();
    }


    /**
     * Returns a boolean indicating wether the queue is empty or not.
     * (true = empty)
     *
     * @return boolean
     */
    public function isEmpty(): bool
    {
        return count($this->queue) == 0;
    }


    /**
     * Push an element into the queue using PHP simple array notation.
     *
     * @param Mixed $element
     * @return boolean
     */
    public function push($element): bool
    {
        //Following PHP documentation, this is better than using array_push
        $this->queue[] = $element;
        return true;
    }


    /**
     * Get the first element of the queue.
     * We return the first element, and shift the other elements one position to the beginning.
     *
     * @return Mixed
     */
    public function pop()
    {
        //What if we perform a pop on an empty queue?  Throw exception.
        if ($this->isEmpty()) {
            throw new EmptyQueueException("Queue is empty");
        }

        //Just return the first element and eliminate it from the queue (array_shift)
        //ATTENTION: the cost of the array_shift operation is O(n).  If the amount of
        //elements in the queue is high, that might be fairly slow.
        return array_shift($this->queue);
    }


    /**
     * Eliminate all the queue elements.
     *
     * @return void
     */
    public function purge(): void
    {
        $this->queue = array();
    }


    /**
     * Returns the number of elements in the queue
     *
     * @return integer
     */
    public function count(): int
    {
        return count($this->queue);
    }


    /**
     * Just a help function to print out the queue
     *
     * @return void
     */
    public function print(): void
    {
        $count = $this->count();
        for ($i=0; $i < $count; $i++) {
            echo $i." - ".$this->queue[$i]."\n";
            // print_r($this->queue[$i]);
        }
    }

}
?>