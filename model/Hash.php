<?php
/**
 * The Hash class is used to make hash values,
 * and generate salts for securing passwords.
 * TODO: Make salts platform independant
 */
class Hash {
  /**
   * Creates a hash value encrypted with sha256.
   * @param  string $string - The value to be hashed.
   * @param  string $salt   - The salt to be included in the hash.
   * @return string         - The hash value that was made.
   */
  public static function make($string, $salt = '') {
      return hash('sha256', $string . $salt);
  }
  /**
   * Generates a salt value with a length of 32.
   * @return string - The value of the generated salt.
   */
  public static function salt() {
      return utf8_encode(openssl_random_pseudo_bytes(32));
  }
  /**
   * Generates a unique random hash with no salt.
   * @return string - The value of the random value.
   */
  public static function unique() {
      return self::make(uniqid());
  }
}
