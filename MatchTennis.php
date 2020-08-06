<?php


class MatchTennis
{

   /**
    * Partie de Tennis
    * En entrée : Une chaine de caractère composée de 0 et/ou 1 ex : 0101010000000001111111111111010101
    * En sortie : Le résultat du match en plus de l'état du jeu/set/match s'il est en cours
    *
    * @param string $entree
    * @return string
    */
   public function partie(string $entree)
   {
      $finDuSet = false;
      $finDuMatch = false;
      $pointsA = $pointsB = 0;
      $nbJeuxA = $nbJeuxB = 0;
      $nbSetsB = $nbSetsA = 0;
      $nbSets = 0;
      $score = ""; // La chaine de caractère qui va contenir le détail du score

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
               $nbJeuxA++; // A remporte le JEU
            else
               $nbJeuxB++; // B remporte le JEU

            $pointsA = $pointsB = 0;
         }

         // Dans le cas où 1 équipe remporte 1 set
         if(abs($nbJeuxA - $nbJeuxB) >= 2 AND ($nbJeuxA >= 6 || $nbJeuxB >= 6)){
            $score = $score . $separateur. "A:" . $nbJeuxA . ' ' . 'B:' . $nbJeuxB;
            
            if($nbJeuxA > $nbJeuxB)
               $nbSetsA++; // A remporte le SET
            else
               $nbSetsB++; // B remporte le SET
            
            $nbSets++;
            $finDuSet = true;
            $nbJeuxA = $nbJeuxB = 0;
         }

         // Dans le cas de fin du match
         if($nbSetsA == 2 || $nbSetsB == 2){
            $finDuMatch = true;
            break; // On ne traite pas la fin de la chaine $entree
         }
      }

      // On affiche "Jeu en cours" si le jeu n'est pas fini et ""(rien) sinon
      if($pointsA == 0 and $pointsB == 0)
         $etatJeu = '';
      else
         $etatJeu = ' (Jeu en cours)';

         // On affiche "Set en cours" si le set n'est pas fini et ""(rien) sinon
      if($finDuSet)
         $etatSet = '';
      else
         $etatSet = ' (Set en cours)';

         // On affiche "Match en cours" si le match n'est pas fini et ""(rien) sinon
      if($finDuMatch)
         $etatMatch = '';
      else
         $etatMatch = ' (Match en cours)';

      // Si le set n'est pas fini on complète le $score avec le score du set en cours
      if(!$finDuSet){
         $score = $score . $separateur. "A:" . $nbJeuxA . ' ' . 'B:' . $nbJeuxB;
      }

      $score = $score . $etatJeu . $etatSet . $etatMatch;
      return $score;
   }
}
