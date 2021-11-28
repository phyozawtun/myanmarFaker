<?php

namespace myanmarFaker\Test\Provider\de_CH;

use Faker\Calculator\Ean;
use Faker\Provider\de_CH\Person;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PersonTest extends TestCase
{
    public function testAvs13Number()
    {
        $avs = $this->faker->avs13;
        self::assertMatchesRegularExpression('/^756\.([0-9]{4})\.([0-9]{4})\.([0-9]{2})$/', $avs);
        self::assertTrue(Ean::isValid(str_replace('.', '', $avs)));
    }

    public function testAhv13Number()
    {
        $ahv = $this->faker->ahv13;
        self::assertMatchesRegularExpression('/^756\.([0-9]{4})\.([0-9]{4})\.([0-9]{2})$/', $ahv);
        self::assertTrue(Ean::isValid(str_replace('.', '', $ahv)));
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
