<?php

namespace Triun\LongestCommonSubstring;

use PHPUnit\Framework\TestCase;

class MatchTest extends TestCase
{
    public function testInstances()
    {
        $match = new Match();

        $this->assertInstanceOf(\JsonSerializable::class, $match);
        $this->assertInstanceOf(\Serializable::class, $match);
    }

    /**
     * @dataProvider valuesProvider
     *
     * @param string $value
     */
    public function testValues(string $value)
    {
        $match = $this->makeFakeMatch($value);

        $this->assertSame($value, $match->value);
        $this->assertSame($value, $match->__toString());
        $this->assertSame($value, (string)$match);
        $this->assertEquals($value, $match);
    }

    /**
     * @dataProvider indexesProvider
     *
     * @param int[] $indexes
     */
    public function testIndexes(array $indexes)
    {
        $match = $this->makeFakeMatch('', $indexes);
        $noOffset = count($indexes);

        $this->assertSame($indexes, $match->indexes);
        $this->assertSame($indexes[0], $match->index());
        $this->assertSame($indexes[0], $match->index(0));
        $this->assertSame($indexes[1], $match->index(1));
        $this->assertSame(null, $match->index($noOffset));
        $this->assertSame(101, $match->index($noOffset, 101));
    }

    public function testNoIndexes()
    {
        $match = $this->makeFakeMatch('', []);

        $this->assertSame(null, $match->index());
        $this->assertSame(null, $match->index(0));
    }

    /**
     * @dataProvider matchProvider
     *
     * @param string $value
     * @param int[]  $indexes
     */
    public function testArray(string $value, array $indexes)
    {
        $match = $this->makeFakeMatch($value, $indexes);

        $expected = [
            'value'   => $value,
            'length'  => strlen($value),
            'indexes' => $indexes,
        ];

        $this->assertSame($expected, $match->toArray());
        $this->assertSame($expected, $match->jsonSerialize());
    }

    /**
     * @dataProvider serializeProvider
     *
     * @param string $value
     * @param int[]  $indexes
     * @param string $serialized
     */
    public function testSerialize(string $value, array $indexes, string $serialized)
    {
        $match = $this->makeFakeMatch($value, $indexes);

        $this->assertSame($serialized, serialize($match));

        $aux = unserialize($serialized);

        $this->assertNotSame($match, $aux);
        $this->assertEquals($match, $aux);
    }

    public function valuesProvider()
    {
        return [
            [
                '',
                'Donec ullamcorper nulla non metus auctor fringilla.',
            ],
        ];
    }

    public function indexesProvider()
    {
        return [
            [
                [10, 20, 30, 40],
            ],
        ];
    }

    public function matchProvider()
    {
        return [
            [
                'Donec ullamcorper nulla non metus auctor fringilla.',
                [10, 20, 30, 40],
            ],
        ];
    }

    public function serializeProvider()
    {
        return [
            [
                'Donec ullamcorper nulla non metus auctor fringilla.',
                [10, 20, 30, 40],
                //'O:34:"Triun\LongestCommonSubstring\Match":3:{s:5:"value";s:51:"Donec ullamcorper nulla non metus auctor fringilla.";s:6:"length";i:51;s:7:"indexes";a:4:{i:0;i:10;i:1;i:20;i:2;i:30;i:3;i:40;}}',
                'C:34:"Triun\LongestCommonSubstring\Match":124:{a:3:{i:0;s:51:"Donec ullamcorper nulla non metus auctor fringilla.";i:1;i:51;i:2;a:4:{i:0;i:10;i:1;i:20;i:2;i:30;i:3;i:40;}}}',
            ],
        ];
    }

    /**
     * @param string|null $value
     * @param array       $indexes
     *
     * @return \Triun\LongestCommonSubstring\Match
     */
    protected function makeFakeMatch(string $value = null, array $indexes = [])
    {
        return (new Match($indexes, strlen($value)))->setValue($value);
    }
}
