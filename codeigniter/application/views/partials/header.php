<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/style.css">
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <title> <?= $title . " | " . APPLICATION_NAME?> </title>
</head>
<body>
<header>
    <?php $this->view("components/navbar")?>
</header>
<main class="container relative">
   