<?php
  declare(strict_types=1);

  // encapsulation --------------------
  class Car {
    private string $color;
    private string $mark;
    
    public function __construct(?string $color = null, ?string $mark = null)
    {
      $this->color = $color;
      $this->mark = $mark;
    }

    public function __invoke()
    {
      
    }

    public function __toArray()
    {

    }

    // public function __toString()
    // {
    //   return 
    // }

    public function setColor($color)
    {
      $this->color = $color;
    }

    public function getColor()
    {
      return $this->color;
    }

    public function setMark($mark)
    {
      $this->mark = $mark;
    }

    public function getMark()
    {
      return $this->mark;
    }
  }

  $suv = new Car(color: "red", mark: "toyota");
  echo $suv->getColor();
  // --------------------



  

  // exo1 --------------------
  class RiceCooker {
    private bool $active = false;
    private bool $enMarche = false;

    public function allumer()
    {
      $this->active = true;
    }

    public function eteindre()
    {
      $this->active = false;
      $this->enMarche = false;
    }

    public function getEtat()
    {
      if (!$this->active) {
        return "èteint";
      }
      if ($this->enMarche) {
        return "en train de cuire";
      }
      return "juste allumé";
    }
  }
  // --------------------





  // Heritage --------------------
  abstract class CParent {
    protected $house = "villa";
    protected $car = "golf";

    public function setHouse($house)
    {
      $this->house = $house;
    }

    public function getHouse()
    {
      return $this->house;
    }
  }

  class CFils extends CParent {
    public function getCar() {

    }
  }





  interface CarInterface {
    public function engine(): bool;
    public function color(): string;
    public function format(): string;
    public function seat(): int;
  }

  class Ford implements CarInterface {
    public function engine(): bool {
      return true;
    }

    public function color(): string {
      return "Black";
    }

    public function format(): string {
      return "square";
    }

    public function seat(): int {
      return 7;
    }
  }

  class Toyota implements CarInterface {
    public function engine(): bool {
      return true;
    }

    public function color(): string {
      return "Red";
    }

    public function format(): string {
      return "square";
    }

    public function seat(): int {
      return 5;
    }
  }


  function makeCar(CarInterface $car) {   // function makeCar(Toyota|Ford $car) {
    return $car->color();
  }


  class CarFactory {
    
  }

  $yaris = new Toyota();
  echo makeCar($yaris);