<?php

class Elevator{

  //const MAX_PASSENGERS = 8;   I was planning to add it, but it is useless as we have max weight.
  public const MAX_LOAD_CAPACITY = 800;

  public $currentFloor = 1;
  public $requestedFroor;
  public $currentDirection;
  public $doorsOpen = false;
  public $passengersTotalWeight;

  function __construct($currentFloor){
        $this ->currentFloor = $currentFloor;
  }
//request elevator function. Desireable floor of the passenger as a parameter. Returns floor which was achieved
  function requestElevator($requestedDirection){

    $currentFloor = $this ->currentFloor;

    if($requestedDirection > $currentFloor) {
      for($i = $currentFloor; $i < $requestedDirection; $i++){
        $currentFloor += 1;
      }
      $this ->openDoors();
      $this ->closeDoors();
      return $currentFloor;

    }

    if($requestedDirection < $currentFloor) {
      for($i = $currentFloor; $i > $requestedDirection; $i--){
        $currentFloor -= 1;
      }
      return $currentFloor;
    }
    $this ->openDoors();
    $this ->closeDoors();
    return $currentFloor;
  }

//Cheking total weight of all our passengers. In case elevator is overloaded, it won't move forward.
 function checkLoad($passengerWeight){
    $maxWeight = Elevator::MAX_LOAD_CAPACITY;
    $passengerWeight = $passengerWeight ->weight;

    $this ->passengersTotalWeight += $passengerWeight;

    if ($this ->passengersTotalWeight < $maxWeight){
       return ($this ->passengersTotalWeight);
    }else{
      echo "Get out from the elevator! Overweight <br/>";
      return ($this ->passengersTotalWeight);
    }

  }

//checking if the elevator is in need or not.
  function loadElevator($passengers){

    $totalWeight = $this ->checkLoad($passengers);

    $elevatorAvailable = $this ->doorsOpen;

    if($elevatorAvailable || ($totalWeight == 0)){
      return false;
    }
    return true;
  }

//helping to sort an array of passengers to minimize time of travel in our awesome elevator
  function cmp($a, $b)
  {
      return strcmp($b->requestDirection, $a->requestDirection);
  }
//Serving passengers. All will arrive one by one in a minimal time
  function serveRequest($passengers){

    usort($passengers, array($this, "cmp"));
    $currentFloor = $this ->currentFloor;

    foreach ($passengers as $passenger){

      $currentDirection = $passenger ->requestDirection;
  //var_dump($currentDirection);

      while($currentFloor != $currentDirection){
          if($currentFloor < $currentDirection)
              $currentFloor++;
          else if($currentFloor > $currentDirection)
              $currentFloor--;
          else{
               exit;
              }
        }
        echo "Лифт прибыл на $currentFloor этаж для высадки пассажира<br/>";
        $this ->openDoors();
        $this ->closeDoors();
        $this ->passengersTotalWeight -= $passenger ->weight;
        echo "Лифт загружен общим весом пассажиров - $this->passengersTotalWeight <br/>";
      }
      return $currentFloor;
  }

//Standart functions... making it more real:)
  function makeStop(){
    sleep(1);
    echo "STOPPED<br/>";
  }

  function openDoors(){
    $this ->makeStop();
    $doorsOpen = true;
    echo "DOORS WERE OPENED<br/>";

    return true;
  }

  function closeDoors(){
    $doorsOpen = false;
    echo "DOORS WERE CLOSED<br/>";

     return false;
  }

  function emergencySituation(){
      echo "Just pray";
  }
}
