<?php
  declare(strict_types=1);

  class Dell implements ComputerInterface {
    public function cpu(): string {
      return '';
    }

    public function display(): string {
      return 'led';
    }

    public function mark(): string {
      return 'dell';
    }

    public function os(): string {
      return 'freedos';
    }

    public function ram(): string {
      return '8Go';
    }

    public function screensize(): string {
      return '14';
    }

    public function storage(): string {
      return '256';
    }

    public function type(): string {
      return 'portable';
    }
  }