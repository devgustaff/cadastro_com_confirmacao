<?php
if (isset($_POST["nome"]) && !empty($_POST["nome"])) {
  $nome = addslashes($_POST["nome"]);
  $email = addslashes($_POST["email"]);

  require_once "config.php";

  $pdo->query(
    "INSERT INTO usuario (nome, email) VALUES ('{$nome}', '{$email}')"
  );

  $id = $pdo->lastInsertId();
  $md5 = md5($id);
  $link = "http://localhost/cadastroComConfirmacao/confirme.php?cod=" . $md5;

  $assunto = "Confirme seu cadastro";
  $msg = "Clique no link abaixo para confirmar seu cadastro\n\n" . $link;
  $cabecalho = "From: seuservidor@seusite.com.br\r\n" . 
                "X-Mailer: PHP/" . phpversion();
  
  mail($email, $assunto, $msg, $cabecalho);

  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Cadastro</title>
</head>

<body>
  <form method="POST">
    Nome: <br>
    <input type="text" name="nome"><br><br>
    Email: <br>
    <input type="email" name="email"><br><br>
    <input type="submit" value="Cadastrar">
  </form>
</body>

</html>