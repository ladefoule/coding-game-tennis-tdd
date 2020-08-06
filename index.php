<?php 

require "MatchTennis.php";

$match = new MatchTennis();

// On fait 5 tests aléatoire de matches de Tennis
for($i = 0; $i < 5; $i++){
   $testAleatoire = "";
   $tailleEntree = rand(80, 150);
   for($j=0; $j < $tailleEntree; $j++)
      $testAleatoire = $testAleatoire . rand(0, 1);
   
   echo $testAleatoire.'<br>';
   echo $match->partie($testAleatoire).'<hr>';
}
