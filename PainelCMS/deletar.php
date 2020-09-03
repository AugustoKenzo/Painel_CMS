<?php
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=painel_cms;','root','');
  } catch (PDOException $e) {
    echo "Falhou: ".$e->getMessage();
  }

  if(isset($_POST['id_membro'])){
      $sql = $pdo->prepare("DELETE FROM `tb_equipe` WHERE `id`=?");
      $sql->execute(array($_POST['id_membro']));
  }