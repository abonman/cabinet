<?php

namespace BeverageCabinets;

require_once('./Cabinet.php');

class BeverageCabinet extends \Cabinets\Cabinet
{
    private $color;
    private $doorType;

    public function __construct(string $color, string $size, string $doorType)
    {
        $this->setShelfNumber(3);
        $this->setmaxAmount(20);
        $this->color = $color;
        $this->size = $size;
        $this->doorType = $doorType;
        $this->shelves = array_fill(0, $this->getShelfNumber(), 0);
    }

    public function getDoorType(): string
    {
        return $this->doorType;
    }

    public function getBeverageCabinetColor(): string
    {
        return $this->color;
    }

    public function add(): string
    {
        if (!$this->door) {
            return "Open door before process";
        }
        $full = 0;
        for ($i = 0; $i < $this->getShelfNumber(); $i++) {
            if ($this->shelves[$i] == $this->getmaxAmount()) {
                $full++;
            } else {
                $this->shelves[$i]++;
                $shelfIndex = $i + 1;
                break;
            }
        }
        if ($full === 3) {
            return "The Fridge is full";
        } else {
            return "Drink is succesfully added to {$shelfIndex} ";
        }
    }

    public function take(): string
    {
        if (!$this->door) {
            return "Open door before process";
        }
        $empty = 0;
        for ($i = 0; $i < $this->getShelfNumber(); $i++) {
            if ($this->shelves[$i] == 0) {
                $empty++;
            } else {
                $this->shelves[$i]--;
                $shelfIndex = $i + 1;
                break;
            }
        }
        if ($empty === 3) {
            return "The Fridge is empty";
        } else {
            return "Drink is succesfully taken from {$shelfIndex}";
        }
    }

    public function openDoor(): void
    {
        $this->door = true;
        echo "Door is open";
    }

    public function closeDoor(): void
    {
        $this->door = false;
        echo "Door is closed";
    }

    public function getShelfCapacities(): void
    {
        $beverageCapacity = [];
        foreach ($this->shelves as $shelf => $amount) {
            $difference = ($this->getmaxAmount() - $amount);
            $beverageCapacity[$shelf + 1] = $difference;
        }

        foreach ($beverageCapacity as $shelf => $diff) {
            echo "Shelf Number: " . $shelf . " empty slot: " . $diff . PHP_EOL;
        }
    }

    public function getCapacity(): int
    {
        $capacity = ($this->getmaxAmount() * $this->getShelfNumber()) - array_sum($this->shelves);

        return $capacity;
    }
    
    public function fillBeverageCabinet()
    {
        $this->shelves = array_fill(0, $this->getShelfNumber(), 20);
    }

    public function emptyBeverageCabinet()
    {
        $this->shelves = array_fill(0, $this->getShelfNumber(), 0);
    }
}
