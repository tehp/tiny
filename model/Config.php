<?php
/**
  * The Config class allows access to get
  * values from the global config variable.
  */

class Config {

  /**
   * Gets a value from the config global array.
   * @param  string $path - The path to the wanted value.
   * @return string       - The wanted value from the config variable.
   */
  public static function get($path = null)
  {

      // Copy of global config array.
      $config = $GLOBALS['config'];

      // Finds value in the global array.
      foreach (explode('/', $path) as $key) {
          if (isset($config[$key])) {
              $config = $config[$key];
          }
      }

      // Returns the found value.
      return $config;
  }
}
