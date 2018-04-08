<?php

namespace Triun\LongestCommonSubstring;

use PHPUnit\Framework\TestCase;

class MatchesSolverTest extends TestCase
{
    use ValuesProvidersTrait,
        MatchesUniqueValuesProvidersTrait,
        MatchesValuesProvidersTrait,
        MatchesArrayProvidersTrait;

    /**
     * @var \Triun\LongestCommonSubstring\MatchesSolver
     */
    protected static $solver;

    public static function setUpBeforeClass()
    {
        static::$solver = new MatchesSolver();
    }

    /*
    |--------------------------------------------------------------------------
    | First match value
    |--------------------------------------------------------------------------
    */

    /**
     * @dataProvider twoStringsSymmetricValuesProvider
     *
     * @param string $stringLeft
     * @param string $stringRight
     * @param string $expected
     */
    public function testTwoStringsSymmetricValues($stringLeft, $stringRight, $expected)
    {
        $this->assertEquals($expected, static::$solver->solve($stringLeft, $stringRight));
        $this->assertEquals($expected, static::$solver->solve($stringRight, $stringLeft));
    }

    /**
     * @dataProvider twoStringsOrderedValuesProvider
     *
     * @param string $stringLeft
     * @param string $stringRight
     * @param string $expected
     */
    public function testTwoStringsOrderedValues($stringLeft, $stringRight, $expected)
    {
        $this->assertEquals($expected, static::$solver->solve($stringLeft, $stringRight));
    }

    /**
     * @dataProvider threeStringsSymmetricValuesProvider
     *
     * @param string $stringA
     * @param string $stringB
     * @param string $stringC
     * @param string $expected
     */
    public function testThreeStringsSymmetricValues($stringA, $stringB, $stringC, $expected)
    {
        $this->assertEquals($expected, static::$solver->solve($stringA, $stringB, $stringC));
        $this->assertEquals($expected, static::$solver->solve($stringA, $stringC, $stringB));
        $this->assertEquals($expected, static::$solver->solve($stringB, $stringA, $stringC));
        $this->assertEquals($expected, static::$solver->solve($stringB, $stringC, $stringA));
        $this->assertEquals($expected, static::$solver->solve($stringC, $stringA, $stringB));
        $this->assertEquals($expected, static::$solver->solve($stringC, $stringB, $stringA));
    }

    /*
    |--------------------------------------------------------------------------
    | Unique match values
    |--------------------------------------------------------------------------
    */

    /**
     * @dataProvider twoStringsSymmetricMatchesUniqueValuesProvider
     *
     * @param string $stringLeft
     * @param string $stringRight
     * @param string $expected
     */
    public function testTwoStringsSymmetricMatchesUniqueValues($stringLeft, $stringRight, $expected)
    {
        $this->assertSame($expected, static::$solver->solve($stringLeft, $stringRight)->unique());
        $this->assertSame($expected, static::$solver->solve($stringRight, $stringLeft)->unique());
    }

    /**
     * @dataProvider twoStringsOrderedMatchesUniqueValuesProvider
     *
     * @param string $stringLeft
     * @param string $stringRight
     * @param string $expected
     */
    public function testTwoStringsOrderedMatchesUniqueValues($stringLeft, $stringRight, $expected)
    {
        $this->assertSame($expected, static::$solver->solve($stringLeft, $stringRight)->unique());
    }

    /**
     * @dataProvider threeStringsSymmetricMatchesUniqueValuesProvider
     *
     * @param string $stringA
     * @param string $stringB
     * @param string $stringC
     * @param string $expected
     */
    public function testThreeStringsSymmetricMatchesUniqueValues($stringA, $stringB, $stringC, $expected)
    {
        $this->assertSame($expected, static::$solver->solve($stringA, $stringB, $stringC)->unique());
        $this->assertSame($expected, static::$solver->solve($stringA, $stringC, $stringB)->unique());
        $this->assertSame($expected, static::$solver->solve($stringB, $stringA, $stringC)->unique());
        $this->assertSame($expected, static::$solver->solve($stringB, $stringC, $stringA)->unique());
        $this->assertSame($expected, static::$solver->solve($stringC, $stringA, $stringB)->unique());
        $this->assertSame($expected, static::$solver->solve($stringC, $stringB, $stringA)->unique());
    }

    /*
    |--------------------------------------------------------------------------
    | All match values
    |--------------------------------------------------------------------------
    */

    /**
     * @dataProvider twoStringsSymmetricMatchesValuesProvider
     *
     * @param string $stringLeft
     * @param string $stringRight
     * @param string $expected
     */
    public function testTwoStringsSymmetricMatchesValues($stringLeft, $stringRight, $expected)
    {
        $this->assertSame($expected, static::$solver->solve($stringLeft, $stringRight)->values());
        $this->assertSame($expected, static::$solver->solve($stringRight, $stringLeft)->values());
    }

    /**
     * @dataProvider twoStringsOrderedMatchesValuesProvider
     *
     * @param string $stringLeft
     * @param string $stringRight
     * @param string $expected
     */
    public function testTwoStringsOrderedMatchesValues($stringLeft, $stringRight, $expected)
    {
        $this->assertSame($expected, static::$solver->solve($stringLeft, $stringRight)->values());
    }

    /**
     * @dataProvider threeStringsSymmetricMatchesValuesProvider
     *
     * @param string $stringA
     * @param string $stringB
     * @param string $stringC
     * @param string $expected
     */
    public function testThreeStringsSymmetricMatchesValues($stringA, $stringB, $stringC, $expected)
    {
        $this->assertSame($expected, static::$solver->solve($stringA, $stringB, $stringC)->values());
        $this->assertSame($expected, static::$solver->solve($stringA, $stringC, $stringB)->values());
        $this->assertSame($expected, static::$solver->solve($stringB, $stringA, $stringC)->values());
        $this->assertSame($expected, static::$solver->solve($stringB, $stringC, $stringA)->values());
        $this->assertSame($expected, static::$solver->solve($stringC, $stringA, $stringB)->values());
        $this->assertSame($expected, static::$solver->solve($stringC, $stringB, $stringA)->values());
    }

    /*
    |--------------------------------------------------------------------------
    | All match to array
    |--------------------------------------------------------------------------
    */

    /**
     * @dataProvider twoStringsSymmetricalMatchesArrayProvider
     *
     * @param string $stringLeft
     * @param string $stringRight
     * @param string $expected
     */
    public function testTwoStringsSymmetricalMatchesArray($stringLeft, $stringRight, $expected)
    {
        $this->assertSame($expected, static::$solver->solve($stringLeft, $stringRight)->toArray());
        $this->assertSame($expected, static::$solver->solve($stringRight, $stringLeft)->toArray());
    }

    /**
     * @dataProvider twoStringsOrderedMatchesArrayProvider
     *
     * @param string $stringLeft
     * @param string $stringRight
     * @param string $expected
     */
    public function testTwoStringsOrderedMatchesArray($stringLeft, $stringRight, $expected)
    {
        $this->assertSame($expected, static::$solver->solve($stringLeft, $stringRight)->toArray());
    }
}
