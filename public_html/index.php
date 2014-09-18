<?php
session_start();
require_once 'Token.php';

if (isset($_POST['quantity'], $_POST['product'], $_POST['token'])) {
  extract($_POST, EXTR_PREFIX_ALL, 'brand_');
  if (!empty($brand_quantity) && !empty($brand_product)) {
    if (Token::check($brand_token))
    echo 'OK';
  }
}

$html = file_get_contents('index.html');
echo sprintf($html, Token::generate());
