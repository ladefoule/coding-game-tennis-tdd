<?php

require "MatchTennis.php";

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertSame;


class MatchTennisTest extends TestCase
{

   public function testIncomplet()
   {

      $match = new MatchTennis();

      $this->assertSame("A:2 B:0 (Jeu en cours) (Set en cours) (Match en cours)", $match->partie("00000000111"));
      $this->assertSame("A:0 B:2 (Jeu en cours) (Set en cours) (Match en cours)", $match->partie("111111110101010101"));
   }

   public function testJeuComplet()
   {

      $match = new MatchTennis();

      $this->assertSame("A:1 B:0 (Set en cours) (Match en cours)", $match->partie("0000"));
      $this->assertSame("A:0 B:1 (Set en cours) (Match en cours)", $match->partie("1111"));
      $this->assertSame("A:1 B:0 (Set en cours) (Match en cours)", $match->partie("011000"));
      $this->assertSame("A:0 B:1 (Set en cours) (Match en cours)", $match->partie("111001"));
      $this->assertSame("A:1 B:0 (Set en cours) (Match en cours)", $match->partie("011000"));
      $this->assertSame("A:0 B:1 (Set en cours) (Match en cours)", $match->partie("11100010101011"));

      $this->assertSame("A:1 B:1 (Set en cours) (Match en cours)", $match->partie("11110000"));
      $this->assertSame("A:1 B:1 (Set en cours) (Match en cours)", $match->partie("00001111"));

      $this->assertSame("A:6 B:0 A:1 B:0 (Set en cours) (Match en cours)", $match->partie("0000000000000000000000000000"));
      $this->assertSame("A:0 B:6 A:0 B:1 (Set en cours) (Match en cours)", $match->partie("1111111111111111111111111111"));
   }

   public function testSetComplet()
   {

      $match = new MatchTennis();

      $this->assertSame("A:6 B:0 (Match en cours)", $match->partie("000000000000000000000000"));
      $this->assertSame("A:0 B:6 (Match en cours)", $match->partie("111111111111111111111111"));

      $this->assertSame("A:6 B:0 A:0 B:6 (Match en cours)", $match->partie("000000000000000000000000111111111111111111111111"));
      $this->assertSame("A:0 B:6 A:0 B:6", $match->partie("111111111111111111111111111111111111111111111111"));
   }
}