<?php

namespace Triun\LongestCommonSubstring;

use PHPUnit\Framework\TestCase;

class SolverTest extends TestCase
{
    use ValuesProvidersTrait;

    /**
     * @var \Triun\LongestCommonSubstring\Solver
     */
    protected static $solver;

    public static function setUpBeforeClass()
    {
        static::$solver = new Solver();
    }

    /**
     * @dataProvider twoStringsSymmetricValuesProvider
     *
     * @param string $stringLeft
     * @param string $stringRight
     * @param string $expected
     */
    public function testTwoStringsSymmetric($stringLeft, $stringRight, $expected)
    {
        $this->assertSame($expected, static::$solver->solve($stringLeft, $stringRight));
        $this->assertSame($expected, static::$solver->solve($stringRight, $stringLeft));
    }

    /**
     * @dataProvider twoStringsOrderedValuesProvider
     *
     * @param string $stringLeft
     * @param string $stringRight
     * @param string $expected
     */
    public function testTwoStringsOrdered($stringLeft, $stringRight, $expected)
    {
        $this->assertSame($expected, static::$solver->solve($stringLeft, $stringRight));
    }

    /**
     * @dataProvider threeStringsSymmetricValuesProvider
     *
     * @param string $stringA
     * @param string $stringB
     * @param string $stringC
     * @param string $expected
     */
    public function testThreeStringsSymmetric($stringA, $stringB, $stringC, $expected)
    {
        $this->assertSame($expected, static::$solver->solve($stringA, $stringB, $stringC));
        $this->assertSame($expected, static::$solver->solve($stringA, $stringC, $stringB));
        $this->assertSame($expected, static::$solver->solve($stringB, $stringA, $stringC));
        $this->assertSame($expected, static::$solver->solve($stringB, $stringC, $stringA));
        $this->assertSame($expected, static::$solver->solve($stringC, $stringA, $stringB));
        $this->assertSame($expected, static::$solver->solve($stringC, $stringB, $stringA));
    }
}
