<?php

require_once './src/Queue.php';


// Create the queue
$queue = new Queue();


// Insert some elements
$queue->push("Element 1");
$queue->push("Element 2");
$queue->push("Element 3");
$queue->push("Element 4");
$queue->push("Element 5");
$queue->push("Element 6");
$queue->push("Element 7");
$queue->push("Element 8");
$queue->push("Element 9");
$queue->push("Element 10");
$queue->push("Element 11");
$queue->push("Element 12");
$queue->push("Element 13");
$queue->push("Element 14");
$queue->push("Element 15");
$queue->push("Element 16");
$queue->push("Element 17");
$queue->push("Element 18");
$queue->push("Element 19");
$queue->push("Element 20");

// Our queue should now have 7 elements
echo "The queue has ".$queue->count()." elements.\n";

// Let's print out the queue
$queue->print();


// Let's pop some elements.  It should be "Element 1" and "Element 2".
$element1 = $queue->pop();
echo "I have popped out \"".$element1."\".\n";
$element2 = $queue->pop();
echo "I have popped out \"".$element2."\"\n";
?>