<?php
declare(strict_types=1);

namespace App\View;

use Cake\View\View;
use CakeLte\View\CakeLteTrait;

class AppView extends View{
  use CakeLteTrait;

  public $layout = 'CakeLte.top-nav';

  // 'CakeLte.default'
  // 'CakeLte.login'
  // 'CakeLte.top-nav'

  public function initialize(): void{
      parent::initialize();
      $this->initializeCakeLte();
      //...
  }
}