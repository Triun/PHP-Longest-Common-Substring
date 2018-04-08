<?php

namespace Triun\LongestCommonSubstring;

use PHPUnit\Framework\TestCase;
use RuntimeException;

class MatchesTest extends TestCase
{
    public function testInstances()
    {
        $matches = new Matches([]);

        $this->assertInstanceOf(\ArrayAccess::class, $matches);
        $this->assertInstanceOf(\Iterator::class, $matches);
        $this->assertInstanceOf(\JsonSerializable::class, $matches);
        $this->assertInstanceOf(\Countable::class, $matches);
    }

    /**
     * @dataProvider valuesProvider
     *
     * @param array $items
     */
    public function testCount(array $items)
    {
        $matches = $this->makeFakeCollection($items);
        $total = count($items);

        $this->assertSame($total, $matches->count());
        $this->assertTrue($matches->has());
    }

    /**
     * @dataProvider valuesProvider
     *
     * @param array $items
     */
    public function testAccessors(array $items)
    {
        $matches = $this->makeFakeCollection($items);

        $all = array_map([$this, 'makeFakeMatch'], $items);

        $this->assertEquals($all, $matches->all());

        $first = $this->makeFakeMatch($items[0]);

        $this->assertEquals($first, $matches->first());
    }

    /**
     * @dataProvider valuesProvider
     *
     * @param array $items
     * @param array $values
     * @param array $unique
     */
    public function testValues(array $items, array $values, array $unique)
    {
        $matches = $this->makeFakeCollection($items);

        $this->assertSame($values, $matches->values());
        $this->assertSame($unique, $matches->unique());
        $this->assertSame($values[0], $matches->firstValue());
        $this->assertSame($values[0], (string)$matches);
    }

    /**
     * @dataProvider valuesProvider
     *
     * @param array $items
     */
    public function testArray(array $items)
    {
        $matches = $this->makeFakeCollection($items);

        $array = array_map(function ($item) {
            return [
                'value'   => $item[0],
                'length'  => strlen($item[0]),
                'indexes' => $item[1],
            ];
        }, $items);

        $this->assertSame($array, $matches->toArray());
        $this->assertSame($array, $matches->jsonSerialize());
        $this->assertSame(json_encode($array), $matches->toJson());
    }

    /**
     * @dataProvider valuesProvider
     *
     * @param array $items
     */
    public function testArrayAccess(array $items)
    {
        $matches = $this->makeFakeCollection($items);
        $noOffset = count($items);
        $last = count($items) - 1;

        $this->assertTrue($matches->offsetExists(0));
        $this->assertFalse($matches->offsetExists($noOffset));
        $this->assertTrue(isset($matches[0]));
        $this->assertFalse(isset($matches[$noOffset]));

        $all = $matches->all();

        $this->assertEquals($all[0], $matches->offsetGet(0));
        $this->assertEquals($all[0], $matches[0]);
        $this->assertEquals($all[$last], $matches->offsetGet($last));
        $this->assertEquals($all[$last], $matches[$last]);
    }

    public function testArrayAccessOffsetSetNotAllowed()
    {
        $matches = new Matches([]);

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Read only');

        $matches->offsetSet(0, 'a');
    }

    public function testArrayAccessOffsetUnsetNotAllowed()
    {
        $matches = new Matches([]);

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Read only');

        $matches->offsetUnset(0);
    }

    /**
     * @dataProvider valuesProvider
     *
     * @param array $items
     */
    public function testIterator(array $items)
    {
        $matches = $this->makeFakeCollection($items);

        $all = $matches->all();

        $this->assertTrue($matches->valid());
        $this->assertSame(0, $matches->key());
        $this->assertEquals($all[0], $matches->current());

        $matches->next();

        if (count($items) > 1) {
            $this->assertTrue($matches->valid());
            $this->assertSame(1, $matches->key());
            $this->assertEquals($all[1], $matches->current());
        } else {
            $this->assertFalse($matches->valid());
            $this->assertSame(1, $matches->key());
        }

        $matches->rewind();

        $this->assertSame(0, $matches->key());
    }

    public function testEmpty()
    {
        $matches = $this->makeFakeCollection([]);

        $this->assertSame(0, $matches->count());
        $this->assertFalse($matches->has());

        $this->assertSame(null, $matches->first());
        $this->assertSame(null, $matches->firstValue());
        $this->assertSame('', (string)$matches);

        $this->assertSame([], $matches->all());
        $this->assertSame([], $matches->values());
        $this->assertSame([], $matches->unique());

        $this->assertSame([], $matches->toArray());
        $this->assertSame([], $matches->jsonSerialize());
        $this->assertSame('[]', $matches->toJson());
    }

    public function valuesProvider()
    {
        return [
            'One match'       => [
                'matches' => [
                    [
                        'Donec ullamcorper nulla non metus auctor fringilla.',
                        [10, 20, 30, 40],
                    ],
                ],
                'values'  => [
                    'Donec ullamcorper nulla non metus auctor fringilla.',
                ],
                'unique'  => [
                    'Donec ullamcorper nulla non metus auctor fringilla.',
                ],
            ],
            'Tree matches'    => [
                'matches' => [
                    [
                        'Fermentum',
                        [2, 58],
                    ],
                    [
                        'Donec sed odio dui. Maecenas faucibus mollis interdum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.',
                        [130, 90],
                    ],
                    [
                        'Curabitur blandit tempus porttitor',
                        [323, 56],
                    ],
                ],
                'values'  => [
                    'Fermentum',
                    'Donec sed odio dui. Maecenas faucibus mollis interdum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.',
                    'Curabitur blandit tempus porttitor',
                ],
                'unique'  => [
                    'Fermentum',
                    'Donec sed odio dui. Maecenas faucibus mollis interdum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.',
                    'Curabitur blandit tempus porttitor',
                ],
            ],
            'Repeated values' => [
                'matches' => [
                    [
                        'Fermentum',
                        [2, 58],
                    ],
                    [
                        'Donec sed odio dui. Maecenas faucibus mollis interdum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.',
                        [130, 90],
                    ],
                    [
                        'Curabitur blandit tempus porttitor',
                        [323, 56],
                    ],
                    [
                        'Curabitur blandit tempus porttitor',
                        [405, 56],
                    ],
                    [
                        'Fermentum',
                        [20, 58],
                    ],
                ],
                'values'  => [
                    'Fermentum',
                    'Donec sed odio dui. Maecenas faucibus mollis interdum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.',
                    'Curabitur blandit tempus porttitor',
                    'Curabitur blandit tempus porttitor',
                    'Fermentum',
                ],
                'unique'  => [
                    'Fermentum',
                    'Donec sed odio dui. Maecenas faucibus mollis interdum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.',
                    'Curabitur blandit tempus porttitor',
                ],
            ],
        ];
    }

    /**
     * @param array $items
     *
     * @return \Triun\LongestCommonSubstring\Matches
     */
    protected function makeFakeCollection(array $items)
    {
        return new Matches(array_map([$this, 'makeFakeMatch'], $items));
    }

    /**
     * @param array $item
     *
     * @return \Triun\LongestCommonSubstring\Match
     */
    protected function makeFakeMatch(array $item)
    {
        return (new Match($item[1], strlen($item[0])))->setValue($item[0]);
    }
}
