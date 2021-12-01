<?php

require_once('./BeverageCabinet.php');

$commandArray = array(
    'take' => 'take',
    'add' => 'add',
    'open' => 'openDoor',
    'close' => 'closeDoor',
    'shelf capacities' => 'getShelfCapacities',
    'total capacity' => 'getCapacity',
    'fill' => 'fillBeverageCabinet',
    'empty' => 'emptyBeverageCabinet'
);

echo "_______________________________________________________________________________________________________" . PHP_EOL;
echo "|The BeverageCabinet operations will be executed according to following commands below;" . PHP_EOL;
echo "|Each shelf of cabinet will be start with empty as default" . PHP_EOL;
echo "|Use 'fill' or 'empty' commands to fill or empty BeverageCabinet" . PHP_EOL;
echo "|'take' this command takes 1 drink from the BeverageCabinet" . PHP_EOL;
echo "|'add' this command adds 1 drink to the BeverageCabinet" . PHP_EOL;
echo "|'open' this command opens the door of BeverageCabinet" . PHP_EOL;
echo "|'close' this command closes the door of BeverageCabinet" . PHP_EOL;
echo "|'shelf capacities' this command returns the total number of each shelf capacity in the BeverageCabinet" . PHP_EOL;
echo "|'total capacity' this command returns total number of empty slot in the BeverageCabinet" . PHP_EOL;
echo "|'exit' this command will be terminate the program" . PHP_EOL;
echo "|______________________________________________________________________________________________________" . PHP_EOL . PHP_EOL;

$a = new BeverageCabinets\BeverageCabinet('red', 'large', 'metal');

getUserCommand($commandArray, $a);

function getUserCommand(array $commandArray, BeverageCabinets\BeverageCabinet $beverageCabinet): void
{
    $commandString = readline("Enter Command:  ");
    if ($commandString == "exit") {
        echo 'terminating...' . PHP_EOL;
        exit;
    }
    if (isset($commandArray[$commandString])) {
        echo call_user_func(array($beverageCabinet, $commandArray[$commandString])) . PHP_EOL;
    } else {
        echo 'Wrong command' . PHP_EOL;
    }

    getUserCommand($commandArray, $beverageCabinet);
}
