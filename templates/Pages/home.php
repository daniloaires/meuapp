<?php

use Cake\Core\Configure;

//$this->disableAutoLayout();

?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

    <header>

    </header>

    <main class="main">
        <div class="container">

            <div class="container-fluid bg-image">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                    <h1 class="text-center text-white">Bem vindo!</h1>
                    <p class="text-center text-white">ERP para Gestão Empresarial.</p>
                    </div>
                </div>
            </div>        

        </div>
    </main>
</body>
</html>
