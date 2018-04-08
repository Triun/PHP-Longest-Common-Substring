<?php

namespace Triun\LongestCommonSubstring;

trait ValuesProvidersTrait
{
    public function twoStringsSymmetricValuesProvider()
    {
        return [
            'Empty values'                          => [
                '',
                '',
                '',
            ],
            'All elements equal'                    => [
                'ABC',
                'ABC',
                'ABC',
            ],
            'Second string is a substring of first' => [
                'ABCDEF',
                'BCDE',
                'BCDE',
            ],
            'Basic common substring'                => [
                'ABDE',
                'ACDF',
                'A',
            ],
            'Common substring of larger data set'   => [
                'ABCDEF',
                'JADFAFKDFBCDEHJDFG',
                'BCDE',
            ],
            'Single element substring at start'     => [
                'ABCDEF',
                'A',
                'A',
            ],
            'Single element substring at middle'    => [
                'ABCDEF',
                'D',
                'D',
            ],
            'Single element substring at end'       => [
                'ABCDEF',
                'F',
                'F',
            ],
            'Elements after end of first string'    => [
                'JAFAFKDBCEHJDF',
                'JDFAKDFCDEJDFG',
                'JDF',
            ],
            'No common elements'                    => [
                'ABC',
                'DEF',
                '',
            ],
            'No case common elements'               => [
                'ABC',
                'abc',
                '',
            ],
            'Equal Word'                            => [
                'Tortor',
                'Tortor',
                'Tortor'
            ],
            'Similar Word'                          => [
                'Color',
                'Colour',
                'Colo'
            ],
            'Word case'                             => [
                'color',
                'Colour',
                'olo'
            ],
            'Equal Sentence'                        => [
                'Donec ullamcorper nulla non metus auctor fringilla.',
                'Donec ullamcorper nulla non metus auctor fringilla.',
                'Donec ullamcorper nulla non metus auctor fringilla.',
            ],
            'Similar Sentence'                      => [
                'Donec ullamcorper nulla non metus auctor fringilla.',
                'Donec ullamcorper nulla no metus auctor fringilla.',
                'Donec ullamcorper nulla no',
            ],
            'Hexadecimal'                           => [
                '0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF',
                '23415A32443FC243D123456789AC342553',
                '123456789A',
            ],
            'README example'                        => [
                'BANANA',
                'ATANA',
                'ANA',
            ],
        ];
    }

    public function twoStringsOrderedValuesProvider()
    {
        return [
            'Reverse string ASC -> DESC'      => [
                'ABCDE',
                'EDCBA',
                'A',
            ],
            'Reverse string DESC -> ASC'      => [
                'EDCBA',
                'ABCDE',
                'E',
            ],
            'Order change Natural -> Changed' => [
                'ABCDEF',
                'ABDCEF',
                'AB',
            ],
            'Order change Changed -> Natural' => [
                'ABDCEF',
                'ABCDEF',
                'AB',
            ],
            'Hexadecimal'                     => [
                '0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF',
                '56789AB56789ABCDE56789ABCDE56789AB56789A123456789A',
                '123456789A',
            ],
            'Hexadecimal Reverse'             => [
                '56789AB56789ABCDE56789ABCDE56789AB56789A123456789A',
                '0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF',
                '56789ABCDE',
            ],
        ];
    }

    public function threeStringsSymmetricValuesProvider()
    {
        return [
            'No match'          => [
                'ABDEGH',
                'JKLMN',
                'OPQRST',
                '',
            ],
            'One match'          => [
                'ABDEGH3',
                'JKL3MN',
                '3OPQRST',
                '3',
            ],
            'Wikipedia Example' => [
                'ABABC',
                'BABCA',
                'ABCBA',
                'ABC',
            ],
        ];
    }
}
