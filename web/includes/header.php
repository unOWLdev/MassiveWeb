<?php 
error_reporting(0);
error_reporting(E_ALL);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="generator" content="">

<title><?php if ($_GET['query']) { ?> Searching for <?php echo $_GET['query']; } else if ($_GET['page']) { ?> Page <?php echo $_GET['page']; } else if ($_GET['id']) {  $thename = $_GET['name']; $thename = str_replace('_', ' ', $thename); $thename = ucfirst($thename); echo $thename;} else { ?> DEV1 <?php } ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  </head>
  <body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="/">DEV1</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/bnbs/1">INDEX</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" role="search" action="/search.php" method="get">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"  name="query">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

    <main role="main" class="container">
