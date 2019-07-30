<?php

class Person{

  public $atFloor;
  public $requestDirection;
  public $weight = 80;

  function __construct($atFloor, $requestDirection, $weight){
       $this ->atFloor = $atFloor;
       $this ->requestDirection = $requestDirection;
       $this ->weight = $weight;
  }

//All our passenger is able to do - pressing buttons. Button of the floor, stop button, emergency, etc.
  function pressButton() {
      echo "Button was pressed!";
      return $buttonPressed = true;
  }
}
