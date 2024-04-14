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

        </div>
    </main>
</body>
</html>
