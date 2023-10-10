<?php
use App\config;
?>

<?php
    $n = 1;
    foreach ($vars as $key => $value) {
        $username = $value->getJoueur();
        $nbVictoire = $value->getVictoires();
        echo "<div class='li'>";
        echo "<p>$n</p>";
        echo "<p>$username</p>";
        echo "<p>$nbVictoire</p>";
        echo "</div>";
        $n += 1;
    }
?>