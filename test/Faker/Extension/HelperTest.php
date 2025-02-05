<?php

namespace myanmarFaker\Test\Extension;

use Faker\Extension\Helper;
use PHPUnit\Framework\TestCase;

final class HelperTest extends TestCase
{
    public function testRandomElementReturnsNullWhenArrayEmpty()
    {
        self::assertNull(Helper::randomElement([]));
    }

    public function testRandomElementReturnsElementFromArray()
    {
        $elements = ['23', 'e', 32, '#'];
        self::assertContains(Helper::randomElement($elements), $elements);
    }

    public function testRandomElementReturnsElementFromAssociativeArray()
    {
        $elements = ['tata' => '23', 'toto' => 'e', 'tutu' => 32, 'titi' => '#'];
        self::assertContains(Helper::randomElement($elements), $elements);
    }

    public function testNumerifyReturnsSameStringWhenItContainsNoHashSign()
    {
        self::assertEquals('fooBar?', Helper::numerify('fooBar?'));
    }

    public function testNumerifyReturnsStringWithHashSignsReplacedByDigits()
    {
        self::assertMatchesRegularExpression('/foo\dBa\dr/', Helper::numerify('foo#Ba#r'));
    }

    public function testNumerifyReturnsStringWithPercentageSignsReplacedByDigits()
    {
        self::assertMatchesRegularExpression('/foo\dBa\dr/', Helper::numerify('foo%Ba%r'));
    }

    public function testNumerifyReturnsStringWithPercentageSignsReplacedByNotNullDigits()
    {
        self::assertNotEquals('0', Helper::numerify('%'));
    }

    public function testNumerifyCanGenerateALargeNumberOfDigits()
    {
        $largePattern = str_repeat('#', 20); // definitely larger than PHP_INT_MAX on all systems
        self::assertEquals(20, strlen(Helper::numerify($largePattern)));
    }

    public function testNumerifyReturnsLargeNumber()
    {
        $result = Helper::numerify(str_repeat('#', 10));
        self::assertGreaterThan(100, (int) $result);
    }

    public function testLexifyReturnsSameStringWhenItContainsNoQuestionMark()
    {
        self::assertEquals('fooBar#', Helper::lexify('fooBar#'));
    }

    public function testLexifyReturnsStringWithQuestionMarksReplacedByLetters()
    {
        self::assertMatchesRegularExpression('/foo[a-z]Ba[a-z]r/', Helper::lexify('foo?Ba?r'));
    }

    public function testBothifyCombinesNumerifyAndLexify()
    {
        self::assertMatchesRegularExpression('/foo[a-z]Ba\dr/', Helper::bothify('foo?Ba#r'));
    }

    public function testBothifyAsterisk()
    {
        self::assertMatchesRegularExpression('/foo([a-z]|\d)Ba([a-z]|\d)r/', Helper::bothify('foo*Ba*r'));
    }

    public function testBothifyUtf()
    {
        $utf = 'œ∑´®†¥¨ˆøπ“‘和製╯°□°╯︵ ┻━┻🐵 🙈 ﺚﻣ ﻦﻔﺳ ﺲﻘﻄﺗ ﻮﺑﺎﻠﺘﺣﺪﻳﺩ،, ﺝﺰﻳﺮﺘﻳ ﺏﺎﺴﺘﺧﺩﺎﻣ ﺄﻧ ﺪﻧﻭ. ﺇﺫ ﻪﻧﺍ؟ ﺎﻠﺴﺗﺍﺭ ﻮﺘ';
        self::assertMatchesRegularExpression('/' . $utf . 'foo\dB[a-z]a([a-z]|\d)r/u', Helper::bothify($utf . 'foo#B?a*r'));
    }
}
