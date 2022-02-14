<!DOCTYPE html>
<html>
<head>
  <title>Search Results</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Mclds">
  <meta name="description" content="Search results page">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Passion+One:wght@700&family=Staatliches&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css" integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/grids-responsive-min.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/bkmks_pure/css/index.css" media="screen">
  <link rel="stylesheet" type="text/css" href="http://localhost/bkmks_pure/css/tachyons.css" media="screen">
  <style>
        .footer {
            position: absolute;
            bottom: 0;
            text-align-center;
            margin-left: 360px;
        }
        input.button-large.pure-button {
            margin-left: 4px;
            background: #fff6e2;
            color: #fff6e2; 
        }
        input#bkmk {
            border-style: solid;
            border-width: 0 0 2px 0;
            border-color: #db575e;
            color: #4c442f;
            box-shadow: none;
            background: #fff6e2;
 }
  </style>
</head>
<body>
  <div class="pure-g" id="header">
    <div class="pure-u-1-3" id="left-half">
      <a id="header_link" href="http://localhost/bkmks_pure/index.php" style="text-decoration:none;color:#db575e">
      <h1>BOOKMARKS</h1></a>
    </div>
    <div class="pure-u-1-2" id="right-half">
      <p><?php include '/usr/share/nginx/html/bkmks_pure/forms/search_form.php' ?></p>
    </div>
  </div>
    <div class="container" style="min-height:100vh;position:relative">
  <div class="pure-g" id="content">
    <div class="pure-u-1-3" id="left-third"></div>
    <div class="pure-u-1-3" id="center-third">
    <p><?php

$question = $_GET['bookmark'];

$where = "localhost";
$user = "mic";
$password = "xxxx";
$dbname = "bkmks";
$pdo = new PDO("mysql:host=$where;dbname=$dbname", $user, $password);

$a=1;
$stmt = $pdo->prepare("SELECT title, comment, link FROM bkmks WHERE MATCH(title, comment, link, k1, k2, k3) AGAINST ('$question')");
$stmt->execute();
$users = $stmt->fetchAll();
foreach($users as $user)
{
?></p>
    <div class="title" name="title-search">
    <?php echo $user["title"]; ?><br>
    <span style="color:#1b9aaa">»»&nbsp;</span><?php echo $user["comment"]; ?><br>
    <a href=<?php echo $user["link"]; ?> target='_blank' style='text-decoration:none;font-size:20px;color:#db575e'>++</a>
    </div><br>
    <?php } ?>
    </div>
    <div class="pure-u-1-3" id="right-third"></div>
    </div>
    <footer>
    <?php require '/usr/share/nginx/html/support_services/partials/footer.php'; ?>
</footer>
    </div>
    </body>
    </html>
