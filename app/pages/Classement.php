<?php
use App\Config;

?>
<head>
    <link rel="stylesheet" href="<?= Config::$PATH_PUBLIC . 'css/classement.css' ?>">
</head>

<div class="container">
    <h1>Classement</h1>


<?php
$n = 1;
foreach ($vars as $key => $value) {
    $username = $value->getJoueur();
    $nbVictoire = $value->getVictoires();
    $display = "$n";
    if ($n == 1) {
        $display = "👑";
    }
    if ($n == 2) {
        $display = "🥈";
    }
    if ($n == 3) {
        $display = "🥉";
    }
    $link = Config::$url . "/public/?username=$username";
    echo "<a href='$link' class='content'>";
    echo "<p>$display</p>";
    echo "<p>$username</p>";
    echo "<p>$nbVictoire</p>";
    echo "</a>";
    $n += 1;
}
?>

</div>