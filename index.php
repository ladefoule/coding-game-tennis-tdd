<?php 

require "MatchTennis.php";

$match = new MatchTennis();

for($i = 0; $i < 5; $i++){
   $testAleatoire = "";
   $tailleEntree = rand(1, 100);
   for($j=0; $j < $tailleEntree; $j++)
      $testAleatoire = $testAleatoire . rand(0, 1);
   
   echo $testAleatoire.'<br>';
   echo $match->partie($testAleatoire).'<hr>';
}
