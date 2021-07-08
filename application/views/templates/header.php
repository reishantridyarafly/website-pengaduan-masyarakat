<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
     <title><?= $judul ?></title>

     <!-- General CSS Files -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


     <!-- CSS Libraries -->
     <link rel="stylesheet" href="<?= base_url() ?>assets/datatables/dataTables.bootstrap4.css">
     <link rel="stylesheet" href="<?= base_url() ?>assets/datatables/dataTables.bootstrap4.min.css">

     <!-- Template CSS -->
     <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
     <link rel="stylesheet" href="<?= base_url() ?>/assets/css/components.css">

     <?php
     function limit_words($string, $word_limit)
     {
          $words = explode(" ", $string);
          return implode(" ", array_splice($words, 0, $word_limit));
     }
     ?>
</head>

<body class="<?= $this->uri->segment(1) == 'tanggapan' ? 'sidebar-mini' : '' ?>">
     <div id="app">