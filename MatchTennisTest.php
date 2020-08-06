<?php

require "MatchTennis.php";

use PHPUnit\Framework\TestCase;


class MatchTennisTest extends TestCase
{
   /**
    * @dataProvider testMatchProduct
    */
   public function testMatch($sortie, $entree)
   {
      $match = new MatchTennis();
      $this->assertSame($sortie, $match->partie($entree));
   }

   public function testMatchProduct()
   {
      return [
         ["A:0 B:1 (Set en cours)", "1111"],
         ["A:1 B:0 (Set en cours)", "011000"],
         ["A:0 B:1 (Set en cours)", "111001"],
         ["A:1 B:0 (Set en cours)", "011000"],
         ["A:0 B:1 (Set en cours)", "11100010101011"],
         ["A:1 B:1 (Set en cours)", "11110000"],
         ["A:1 B:1 (Set en cours)", "00001111"],
         ["A:6 B:0 A:1 B:0 (Set en cours)", "0000000000000000000000000000"],
         ["A:0 B:6 A:0 B:1 (Set en cours)", "1111111111111111111111111111"],
         ["A:6 B:0 (Match en cours)", "000000000000000000000000"],
         ["A:0 B:6 (Match en cours)", "111111111111111111111111"],
         ["A:6 B:0 A:0 B:6 (Match en cours)", "000000000000000000000000111111111111111111111111"],
         ["A:0 B:6 A:0 B:6", "111111111111111111111111111111111111111111111111"],
         ["A:6 B:2 A:4 B:5 (Jeu en cours)", "001110010000101000000010101011111101010010100101100001001101100101010000010010010011110101001110111001110110001011110011110101"],
         ["A:3 B:6 A:3 B:6", "00110101011111101111111111111000000010000011010011010000101110111000101111011101101110001000100011111111"]
      ];
   }

   /**
    * @dataProvider testMatchTropLongProduct
    */
   public function testMatchTropLong($sortie, $entree)
   {
      $match = new MatchTennis();
      $this->assertSame($sortie, $match->partie($entree));
   }

   public function testMatchTropLongProduct()
   {
      return [
         ["Match déjà fini : A:3 B:6 A:1 B:6 (Chaine trop longue)", "11101101110011110100001011111110011000100011111101110001011110111011011111101001111000000001101001101100011101011011100011011110010101111110000"]
      ];
   }
}
