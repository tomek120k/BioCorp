<?php

namespace Tests\Hamming;

use BioCorp\Hamming\Hamming;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \BioCorp\Hamming\Hamming
 * @covers \BioCorp\Genetics\DNAStrand
 * @covers \BioCorp\InformationTheory\Hamming
 */
class HammingTest extends TestCase
{
    /**
     * @return void
     */
    public function testIdenticalStrands(): void
    {
        $this->assertEquals(0, Hamming::compute('A', 'A'));
    }

    public function testLongIdenticalStrands(): void
    {
        $this->assertEquals(0, Hamming::compute('GGACTGA', 'GGACTGA'));
    }

    public function testCompleteDistanceInSingleNucleotideStrands(): void
    {
        $this->assertEquals(1, Hamming::compute('A', 'G'));
    }

    public function testCompleteDistanceInSmallStrands(): void
    {
        $this->assertEquals(2, Hamming::compute('AG', 'CT'));
    }

    public function testSmallDistanceInSmallStrands(): void
    {
        $this->assertEquals(1, Hamming::compute('AT', 'CT'));
    }

    public function testSmallDistance(): void
    {
        $this->assertEquals(1, Hamming::compute('GGACG', 'GGTCG'));
    }

    public function testSmallDistanceInLongStrands(): void
    {
        $this->assertEquals(2, Hamming::compute('ACCAGGG', 'ACTATGG'));
    }

    public function testNonUniqueCharacterInFirstStrand(): void
    {
        $this->assertEquals(1, Hamming::compute('AGA', 'AGG'));
    }

    public function testNonUniqueCharacterInSecondStrand(): void
    {
        $this->assertEquals(1, Hamming::compute('AGA', 'AGG'));
    }

    public function testLargeDistance(): void
    {
        $this->assertEquals(4, Hamming::compute('GATACA', 'GCATAA'));
    }

    public function testLargeDistanceInOffByOneStrand(): void
    {
        $this->assertEquals(9, Hamming::compute('GGACGGATTCTG', 'AGGACGGATTCT'));
    }

    public function testEmptyStrands(): void
    {
        $this->assertEquals(0, Hamming::compute('', ''));
    }

    public function testDisallowFirstStrandLonger(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Hamming::compute('AGTG', 'ATA');
    }

    public function testDisallowSecondStrandLonger(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Hamming::compute('ATA', 'AGTG');
    }

    public function testDisallowFirstStrandIncorrect(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Hamming::compute('XYZ', 'AGTG');
    }

    public function testDisallowSecondStrandIncorrect(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Hamming::compute('AGTG', 'XYZ');
    }

    public function testDisallowFirstShortStrandIncorrect(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Hamming::compute('X', 'T');
    }

    public function testDisallowSecondShortStrandIncorrect(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Hamming::compute('A', 'Y');
    }
}
