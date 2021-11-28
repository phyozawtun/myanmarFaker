<?php

namespace myanmarFaker\Provider\my_MM;

use myanmarFaker\Provider\Miscellaneous;

class Person extends \myanmarFaker\Provider\Person
{
    protected static $maleNameFormats = [
        '{{firstNameMale}}{{lastName}}',
        '{{firstNameMale}}{{lastName}}',
        '{{firstNameMale}}{{lastName}}',
        '{{firstNameMale}}{{lastName}}',
        '{{titleMale}}{{firstNameMale}}{{lastName}}',
        '{{firstNameMale}}{{lastName}}{{suffix}}',
        '{{titleMale}}{{firstNameMale}}{{lastName}}{{suffix}}',
    ];

    protected static $femaleNameFormats = [
        '{{firstNameFemale}}{{lastName}}',
        '{{firstNameFemale}}{{lastName}}',
        '{{firstNameFemale}}{{lastName}}',
        '{{firstNameFemale}}{{lastName}}',
        '{{titleFemale}}{{firstNameFemale}}{{lastName}}',
        '{{firstNameFemale}}{{lastName}}{{suffix}}',
        '{{titleFemale}}{{firstNameFemale}}{{lastName}}{{suffix}}',
    ];

    protected static $firstNameMale = [
        'သူရ', 'သီဟ', 'ဇေယျာ', 'ဝဏ္ဏ', 'ကောင်း',
    ];

    protected static $firstNameFemale = [
        'စန္ဒာ', 'သန္တာ', 'သီရိ', 'ဟေမာ',
    ];

    protected static $lastName = [
        'ထွန်း', 'ဖြိုး', 'အောင်', 'တိုး', 'ချို',
    ];

    protected static $firstNameEn = [
        'ko', 'ma', 'oo', 'mg', 'bo',
    ];

    protected static $lastNameEn = [
        'tun', 'phyo', 'aung', 'toe', 'cho',
    ];

    public function firstNameEn($gender = null)
    {
        return $this->generator->parse(static::randomElement(static::$firstNameEn));
    }

    public function lastNameEn($gender = null)
    {
        return $this->generator->parse(static::randomElement(static::$lastNameEn));
    }

    protected static $suffix = [
        'ထွန်း', 'ဖြိုး', 'အောင်', 'တိုး', 'ချို',
    ];

    protected static $titleMale = [
        'အရှင်',
        'အသျှင်',
        'ဗညား',
        'ဗိုလ်',
        'ဗိုလ်ချုပ်',
        'ဒူးဝါး',
        'ခွန်',
        'ကို',
        'မန်း',
        'မောင်',
        'မင်း',
        'နိုင်',
        'င',
        'စိုင်း',
        'ဆလိုင်း',
        'စဝ်',
        'စော',
        'စ',
        'စော်ဘွား',
        'ဆရာ',
        //'ဆရာတော်',
        'ရှင်',
        'သျှင်',
        'သမိန်',
        'သခင်',
        'ဦး'
    ];

    protected static $titleFemale = [
        'ဒေါ်',
        'မ',
        'မယ်',
        'မိ',
        'နန်း',
        'နော်',
        'နမ့်',
        'နန်း',
        'နန်း',
        'ဆရာမ'
    ];


    /**
     * @example 'PhD'
     */
    public static function suffix()
    {
        return static::randomElement(static::$suffix);
    }

    /**
     * @example '123-45-6789'
     */
    public static function ssn()
    {
        $area = Miscellaneous::boolean() ? self::numberBetween(1, 665) : self::numberBetween(667, 899);
        $group = self::numberBetween(1, 99);
        $serial = self::numberBetween(1, 9999);
        return sprintf('%03d-%02d-%04d', $area, $group, $serial);
    }

    final public static function safeEmailDomain()
    {
        $domains = [
            'myanmar.com',
            'mandalay.org',
            'yangon.net',
        ];

        return static::randomElement($domains);
    }
}
