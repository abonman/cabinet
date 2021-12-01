<?php

namespace Cabinets;

abstract class Cabinet
{

    protected $shelves = [];
    private $maxAmount;
    private $shelfNumber;
    protected $door = false;
    protected $size;

    abstract protected function add();
    abstract protected function take();
    abstract protected function openDoor();
    abstract protected function closeDoor();
    abstract protected function getCapacity();

    public function setShelfNumber(int $maxAmount): void
    {
        $this->maxAmount = $maxAmount;
    }
    public function setmaxAmount(int $shelfNumber): void
    {
        $this->shelfNumber = $shelfNumber;
    }
    public function getShelfNumber(): int
    {
        return $this->maxAmount;
    }
    public function getmaxAmount(): int
    {
        return $this->shelfNumber;
    }
}
