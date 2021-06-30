<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.css"/>
    <title><?= $title ?? "Magic Card" ?></title>
</head>
<body class="d-flex flex-column  min-vh-100">

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Magic Card</a>
        <div class="dropdown">
        <form class="justify-content-start">
            <a class="btn btn-secondary btn-sm">All</a>
            <a class="btn btn-danger btn-sm">Red</a>
            <a class="btn btn-success btn-sm">Green</a>
            <a class="btn btn-primary btn-sm">Blue</a>
            <a class="btn btn-light btn-sm">White</a>
            <a class="btn btn-dark btn-sm">Dark</a>
        </form>
    </div>
</nav>

<main class="d-flex flex-grow-1 flex-shrink-O flex-basis-0">