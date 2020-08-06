<?php


class MatchTennis
{

   public function partie($entree)
   {
      $finDuSet = false;
      $finDuMatch = false;
      $pointsA = $pointsB = 0;
      $nbJeuxA = $nbJeuxB = 0;
      $nbSetsB = $nbSetsA = 0;
      $nbSets = 0;
      $score = "";

      // On parcourt toute la chaine $entree caractère par caractère
      for ($i = 0; $i < strlen($entree); $i++) {
         $finDuSet = false;
         $separateur = ($nbSets == 0) ? '' : ' ';

         $point = $entree[$i];
         if ($point == 0){
            $pointsA++;
         }else{
            $pointsB++;
         }

         // Dans le cas où 1 équipe remporte 1 jeu
         if(abs($pointsA - $pointsB) >= 2 AND ($pointsA >= 4 || $pointsB >= 4)){
            if($pointsA > $pointsB)
               $nbJeuxA++;
            else
               $nbJeuxB++;

            $pointsA = $pointsB = 0;
         }

         // Dans le cas où 1 équipe remporte 1 set
         if(abs($nbJeuxA - $nbJeuxB) >= 2 AND ($nbJeuxA >= 6 || $nbJeuxB >= 6)){
            $score = $score . $separateur. "A:" . $nbJeuxA . ' ' . 'B:' . $nbJeuxB;
            
            if($nbJeuxA > $nbJeuxB)
               $nbSetsA++;
            else
               $nbSetsB++;
            
            //echo $nbJeuxA . '/' . $nbJeuxB . '/' . $nbSetsA;
            $nbSets++;
            $finDuSet = true;
            $nbJeuxA = $nbJeuxB = 0;
         }

         // Dans le cas de la fin du match
         if($nbSetsA == 2 || $nbSetsB == 2){
            $finDuMatch = true;
            break;
         }
      }

      if($pointsA == 0 and $pointsB == 0)
         $etatJeu = '';
      else
         $etatJeu = ' (Jeu en cours)';

      if($finDuSet)
         $etatSet = '';
      else
         $etatSet = ' (Set en cours)';

      if($finDuMatch)
         $etatMatch = '';
      else
         $etatMatch = ' (Match en cours)';

      if(!$finDuSet){
         $score = $score . $separateur. "A:" . $nbJeuxA . ' ' . 'B:' . $nbJeuxB . $etatJeu . $etatSet . $etatMatch;
      }else {
         $score = $score . $etatJeu . $etatSet . $etatMatch;
      }
      return $score;
   }
}
