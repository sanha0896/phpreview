<?php
  declare(strict_types=1);

  interface ComputerInterface {
    public function cpu(): string;
    public function display(): string;
    public function mark(): string;
    public function os(): string;
    public function ram(): string;
    public function screensize(): string;
    public function storage(): string;
    public function type(): string;
  }