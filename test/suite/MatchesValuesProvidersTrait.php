<?php

namespace Triun\LongestCommonSubstring;

trait MatchesValuesProvidersTrait
{
    public function twoStringsSymmetricMatchesValuesProvider()
    {
        return [
            'Empty values'                          => [
                '',
                '',
                [''],
            ],
            'All elements equal'                    => [
                'ABC',
                'ABC',
                ['ABC'],
            ],
            'Second string is a substring of first' => [
                'ABCDEF',
                'BCDE',
                ['BCDE'],
            ],
            'Basic common substring'                => [
                'ABDE',
                'ACDF',
                ['A', 'D'],
            ],
            'Common substring of larger data set'   => [
                'ABCDEF',
                'JADFAFKDFBCDEHJDFG',
                ['BCDE'],
            ],
            'Single element substring at start'     => [
                'ABCDEF',
                'A',
                ['A'],
            ],
            'Single element substring at middle'    => [
                'ABCDEF',
                'D',
                ['D'],
            ],
            'Single element substring at end'       => [
                'ABCDEF',
                'F',
                ['F'],
            ],
            'Elements after end of first string'    => [
                'JAFAFKDBCEHJDF',
                'JDFAKDFCDEJDFG',
                ['JDF', 'JDF'],
            ],
            'No common elements'                    => [
                'ABC',
                'DEF',
                [],
            ],
            'No case common elements'               => [
                'ABC',
                'abc',
                [],
            ],
            'Equal Word'                            => [
                'Tortor',
                'Tortor',
                ['Tortor'],
            ],
            'Similar Word'                          => [
                'Color',
                'Colour',
                ['Colo'],
            ],
            'Word case'                             => [
                'color',
                'Colour',
                ['olo'],
            ],
            'Equal Sentence'                        => [
                'Donec ullamcorper nulla non metus auctor fringilla.',
                'Donec ullamcorper nulla non metus auctor fringilla.',
                ['Donec ullamcorper nulla non metus auctor fringilla.'],
            ],
            'Similar Sentence'                      => [
                'Donec ullamcorper nulla non metus auctor fringilla.',
                'Donec ullamcorper nulla no metus auctor fringilla.',
                ['Donec ullamcorper nulla no'],
            ],
            'Hexadecimal'                           => [
                '0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF',
                '23415A32443FC243D123456789AC342553',
                ['123456789A', '123456789A', '123456789A', '123456789A'],
            ],
            'README example'                        => [
                'BANANA',
                'ATANA',
                ['ANA', 'ANA'],
            ],
        ];
    }

    public function twoStringsOrderedMatchesValuesProvider()
    {
        return [
            'Reverse string ASC -> DESC'      => [
                'ABCDE',
                'EDCBA',
                ['A', 'B', 'C', 'D', 'E'],
            ],
            'Reverse string DESC -> ASC'      => [
                'EDCBA',
                'ABCDE',
                ['E', 'D', 'C', 'B', 'A'],
            ],
            'Order change Natural -> Changed' => [
                'ABCDEF',
                'ABDCEF',
                ['AB', 'EF'],
            ],
            'Order change Changed -> Natural' => [
                'ABDCEF',
                'ABCDEF',
                ['AB', 'EF'],
            ],
            'Hexadecimal'                     => [
                '0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF',
                '56789AB56789ABCDE56789ABCDE56789AB56789A123456789A',
                [
                    '123456789A',
                    '56789ABCDE',
                    '56789ABCDE',
                    '123456789A',
                    '56789ABCDE',
                    '56789ABCDE',
                    '123456789A',
                    '56789ABCDE',
                    '56789ABCDE',
                    '123456789A',
                    '56789ABCDE',
                    '56789ABCDE',
                ],
            ],
            'Hexadecimal Reverse'             => [
                '56789AB56789ABCDE56789ABCDE56789AB56789A123456789A',
                '0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF',
                [
                    '56789ABCDE',
                    '56789ABCDE',
                    '56789ABCDE',
                    '56789ABCDE',
                    '56789ABCDE',
                    '56789ABCDE',
                    '56789ABCDE',
                    '56789ABCDE',
                    '123456789A',
                    '123456789A',
                    '123456789A',
                    '123456789A',
                ],
            ],
        ];
    }

    public function threeStringsSymmetricMatchesValuesProvider()
    {
        return [
            'No match'          => [
                'ABDEGH',
                'JKLMN',
                'OPQRST',
                [],
            ],
            'One match'         => [
                'ABDEGH3',
                'JKL3MN',
                '3OPQRST',
                ['3'],
            ],
            'Wikipedia Example' => [
                'ABABC',
                'BABCA',
                'ABCBA',
                ['ABC'],
            ],
        ];
    }
}
