<?php

Interface QueueInterface
{

    public function isEmpty(): bool;
    public function push($element): bool;
    public function pop();
    public function purge(): void;
    public function count(): int;
    public function print(): void;

}
?>