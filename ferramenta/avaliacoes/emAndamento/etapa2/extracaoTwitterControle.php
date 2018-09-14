<?php
session_start();
$posts = $_SESSION['postagens'];
$idAvaliacao = $_SESSION['idAvaliacao'];

include './salvaTwitter.php';
$salvaTwitter = new SalvaTwitter($posts, $idAvaliacao);
