<?php
  declare(strict_types=1);

  class Ordinateur {
    private string $cpu;
    private string $display;
    private string $mark;
    private string $os;
    private string $ram;
    private string $screensize;
    private string $storage;
    private string $type;

    public function __construct(?string $cpu, ?string $display, ?string $mark, ?string $os, ?string $ram, ?string $screensize, ?string $storage, ?string $type)
    {
      $this->cpu = $cpu;
      $this->display = $display;
      $this->mark = $mark;
      $this->os = $os;
      $this->ram = $ram;
      $this->screensize = $screensize;
      $this->storage = $storage;
      $this->type = $type;
    }

    public function getCpu() {return $this->cpu;}
    public function setCpu($cpu) {$this->cpu = $cpu;}

    public function getDisplay() {return $this->display;}
    public function setDisplay($display) {$this->display = $display;}

    public function getMark() {return $this->mark;}
    public function setMark($mark) {$this->mark = $mark;}

    public function getOs() {return $this->os;}
    public function setOs($os) {$this->os = $os;}

    public function getRam() {return $this->ram;}
    public function setRam($ram) {$this->ram = $ram;}

    public function getScreensize() {return $this->screensize;}
    public function setScreensize($screensize) {$this->screensize = $screensize;}

    public function getStorage() {return $this->storage;}
    public function setStorage($storage) {$this->storage = $storage;}

    public function getType() {return $this->type;}
    public function setType($type) {$this->type = $type;}
  }