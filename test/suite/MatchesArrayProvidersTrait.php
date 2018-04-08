<?php

namespace Triun\LongestCommonSubstring;

trait MatchesArrayProvidersTrait
{
    public function twoStringsSymmetricalMatchesArrayProvider()
    {
        return [
            'No common elements' => [
                'ABC',
                'DEF',
                [],
            ],
            'Empty values'       => [
                '',
                '',
                [
                    [
                        'value'   => '',
                        'length'  => 1, // "\n"
                        'indexes' => [0, 0],
                    ],
                ],
            ],
        ];
    }

    public function twoStringsOrderedMatchesArrayProvider()
    {
        return [
            'Hexadecimal'        => [
                '0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF',
                '23415A32443FC243D123456789AC342553',
                [
                    [
                        'value'   => '123456789A',
                        'length'  => 10,
                        'indexes' => [1, 17],
                    ],
                    [
                        'value'   => '123456789A',
                        'length'  => 10,
                        'indexes' => [17, 17],
                    ],
                    [
                        'value'   => '123456789A',
                        'length'  => 10,
                        'indexes' => [33, 17],
                    ],
                    [
                        'value'   => '123456789A',
                        'length'  => 10,
                        'indexes' => [49, 17],
                    ],
                ],
            ],
        ];
    }
}
