# Queue in PHP

Some days ago I had to write a Stack implementation for my job.  Of course, if I have a priority queue and a stack in this account, I also had to add the queue, here.

So, this README.md file describes the implementation of a simple queue written in PHP.  As you probably know, a queue permits the FIFO operations (First In - First Out).

## Uses
There are lots of uses for queues in the real world.  Here just some examples:

* Graph Breadth First Search algorithm (this was the meaning for me).
* Serving requests on a single resource, like a printer, for example.
* Call center software.
* Patients order at doctor, if it is not an emergency room (in that case you would probably use a priority queue).
* ... and much more.

## Implementation
The queue is based on a PHP array.  :-)

This is how it works:

[![Queue](https://miro.medium.com/max/875/0*TRbfsq86lqDoqW6b.png)](https://miro.medium.com/max/875/0*TRbfsq86lqDoqW6b.png)

The operations a queue should offer are:

* Push (enqueue) an element.
* Pop (dequeue) an element.
* Check if the queue is empty.
* Return the number of elements.

Additional operations could be:

* Return if a certain element is in the queue (and maybe its current situation inside the queue).
* Print the queue.


### Cost analysis
Time complexity analysis of this implementation in big O notation.

| Operation | Cost |
|---|---|
| isEmpty | O(1) |
| purge | O(1) |
| count | O(1) |
| push | O(1) |
| pop | O(n) Oops |
| top | O(1) |
| contains | O(n) |

## Installation
First, clone this repository:

```sh
$ git clone https://github.com/oscarpascualbakker/queue.git .
```

Then, run the commands to build and run the Docker image:

```sh
$ docker build -t queue .
$ docker container run -it --rm --name my-queue queue php start.php
```

The output contains the number of elements in the queue, the queue elements itself, and the extraction of two elements for demonstration purposes.

Tests can be run this way:

```sh
$ docker container run -it --rm --name my-queue queue vendor/bin/phpunit ./tests
```

If you would like to modify the code, mount a volume:

```sh
$ docker container run --rm -v $(pwd):/usr/src/queue/ queue php start.php
$ docker container run --rm -v $(pwd):/usr/src/queue/ queue vendor/bin/phpunit ./tests
```


### Comments
Of course, don't hesitate to give me your feedback.  I'm glad to improve it with your help.

### **Cheers!**