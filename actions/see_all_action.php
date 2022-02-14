<?php
$where = "localhost";
$user = "mic";
$password = "xxxx";
$dbname = "bkmks";
$pdo = new PDO("mysql:host=$where;dbname=$dbname", $user, $password);

$a=1;
$stmt = $pdo->prepare("SELECT * FROM bkmks ORDER BY RAND()");
$stmt->execute();
$users = $stmt->fetchAll();
foreach($users as $user)
{
?>
        <div class="title" id="hp_title">
          <?php echo $user["title"]; ?>
          <a href='<?php echo $user["link"]; ?>' target='_blank'>++</i></a> 
        </div><br>
          <?php } ?>
