<?php
require 'Elevator.php';
require 'Person.php';

$passengers = [];
$electricityON = true;
$elevator = new Elevator(1);

//number of buttons to use by passengers
$requestButtonPressed = false;
$stopButton = false;
$clsoeDoorsButton = false;
$openDoorsButton = false;
$emergencyButton = false;

//hardcoded passengers. Person('atFlour', 'requestDirection', 'weight')
$Sasha = array_push($passengers, new Person(10, 2, 80));
$Nastya = array_push($passengers, new Person(5, 1, 50));
$Katya = array_push($passengers, new Person(6, 4, 40));

//var_dump($passenger);

  while($passengers != null){
  rsort($passengers);

  foreach ($passengers as $passenger){

        if($passenger ->pressButton()){

        echo "Лифт был вызван <br/>";
        echo "Лифт направляется на $passenger->atFloor этаж <br/>";
        $requestedFloor = $elevator ->requestElevator($passenger ->atFloor); //In my imagination passenger pressing button with the floor number here
        echo "Лифт на $requestedFloor этаже <br/>";

        $totalWeight = $elevator ->checkLoad($passenger);
        echo "Лифт загружен общим весом пассажиров - $totalWeight <br/><br/>";

        if ($totalWeight > Elevator::MAX_LOAD_CAPACITY)
        exit;
      }
    }


    $currentFloor = $elevator ->serveRequest($passengers);

//var_dump($elevator ->loadElevator($passengers));

//$stopButton = $passenger ->pressButton();

//some ElevatorControllers
  if($stopButton)
    $elevator ->makeStop();

  if($clsoeDoorsButton)
    $elevator ->closeDoors();

  if($openDoorsButton)
      $elevator ->openDoors();

  if($emergencyButton)
      $elevator ->emergencySituation();

  if (!$elevator ->loadElevator($passengers))
exit;

}
