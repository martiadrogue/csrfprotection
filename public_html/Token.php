<?php
class Token {

  public static function generate() {
    $random = openssl_random_pseudo_bytes(32);
    $_SESSION['token'] = base64_encode($random);
    return $_SESSION['token'];
  }
  
  public static function check($token) {
    if (isset($_POST['token']) && $token === $_SESSION['token']) {
      unset($_SESSION['token']);
      return true;
    }
    return false;
  }
}
