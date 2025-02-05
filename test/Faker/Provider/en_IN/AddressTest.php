<?php

namespace myanmarFaker\Provider\en_IN;

use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class AddressTest extends TestCase
{
    public function testCity()
    {
        $city = $this->faker->city();
        self::assertNotEmpty($city);
        self::assertIsString($city);
        self::assertMatchesRegularExpression('/[A-Z][a-z]+/', $city);
    }

    public function testCountry()
    {
        $country = $this->faker->country();
        self::assertNotEmpty($country);
        self::assertIsString($country);
        self::assertMatchesRegularExpression('/[A-Z][a-z]+/', $country);
    }

    public function testLocalityName()
    {
        $localityName = $this->faker->localityName();
        self::assertNotEmpty($localityName);
        self::assertIsString($localityName);
        self::assertMatchesRegularExpression('/[A-Z][a-z]+/', $localityName);
    }

    public function testAreaSuffix()
    {
        $areaSuffix = $this->faker->areaSuffix();
        self::assertNotEmpty($areaSuffix);
        self::assertIsString($areaSuffix);
        self::assertMatchesRegularExpression('/[A-Z][a-z]+/', $areaSuffix);
    }

    protected function getProviders(): iterable
    {
        yield new Address($this->faker);
    }
}
