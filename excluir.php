<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Vaga;


if (!isset($_GET['id'])  || !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}


$obVaga = Vaga::getVaga($_GET['id']);


if (!$obVaga instanceof Vaga) {
    header('location: index.php?status=error');
    exit;
}

if (isset($_POST['excluir'])) {

    $obVaga->excluir();

    header('location: index.php?status=error');
    exit;
}

require __DIR__ . '/INCLUDES/header.php';
require __DIR__ . '/INCLUDES/confirmarExclusao.php';
require __DIR__ . '/INCLUDES/footer.php';
