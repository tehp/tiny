<?php

class Controller
{

  /**
   * @param  string $controller - The name of the controller.
   */
  public static function load($controller)
  {
      require_once(getcwd() . "/controllers/" . $controller . ".php");
  }
}
