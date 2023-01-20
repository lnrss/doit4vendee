<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no" />
    <meta name="author" content="Do It 4 Vendée">
    <title><?=$title?></title>
    <meta name="description" content="<?=$pageDescription?>">
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="https://doit4vendee.fr/" />
    <!-- Favicon  -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.ico">
    <!--  Box Icons  -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- Swiper -->
    <link rel="stylesheet" href="assets/css/swiper.min.css?v=<?=time()?>">
    <!-- Popover -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.webui-popover/1.2.1/jquery.webui-popover.min.css?v=<?=time()?>">
    <!--  Css  -->
    <link rel="stylesheet" href="assets/css/style.css?v=<?=time()?>">
    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11?v=<?=time()?>"></script> 
    <script>
        function errorModal(etat, title, text, textButton, footer){
            Swal.fire({
                icon: etat,
                title: title,
                text: text,
                confirmButtonColor: 'var(--red-color)',
                confirmButtonText: textButton,
                footer: footer
            })
        }
    </script>
</head>