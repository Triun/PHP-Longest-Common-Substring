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
            'UTF-8'              => [
                'L’été était chaud.',
                'L’hiver était froid.',
                [
                    [
                        'value'   => ' était ',
                        'length'  => 7,
                        'indexes' => [5, 7],
                    ],
                ],
            ],
            // In UTF-8: é = 0xC3A9 and © = 0xC2A9 (the last byte is the same but the Unicode characters are different)
            'UTF-8 (nasty)'      => [
                'L’été était chaud.',
                'L’hiver ©tait froid.',
                [
                    [
                        'value'   => 'tait ',
                        'length'  => 5,
                        'indexes' => [7, 9],
                    ],
                ],
            ],
        ];
    }
}
