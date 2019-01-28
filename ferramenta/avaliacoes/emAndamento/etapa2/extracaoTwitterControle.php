<?php
session_start();
$posts = $_SESSION['postagens'];
$idAvaliacao = $_SESSION['idAvaliacao'];

include './salvaPostsTwitterControle.php';
$salvaTwitter = new SalvaTwitter($posts, $idAvaliacao);