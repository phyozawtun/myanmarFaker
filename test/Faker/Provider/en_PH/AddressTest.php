<?php

namespace myanmarFaker\Test\Provider\en_PH;

use Faker\Provider\en_PH\Address;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class AddressTest extends TestCase
{
    public function testProvince()
    {
        $province = $this->faker->province();
        self::assertNotEmpty($province);
        self::assertIsString($province);
    }

    public function testCity()
    {
        $city = $this->faker->city();
        self::assertNotEmpty($city);
        self::assertIsString($city);
    }

    public function testMunicipality()
    {
        $municipality = $this->faker->municipality();
        self::assertNotEmpty($municipality);
        self::assertIsString($municipality);
    }

    public function testBarangay()
    {
        $barangay = $this->faker->barangay();
        self::assertIsString($barangay);
    }

    protected function getProviders(): iterable
    {
        yield new Address($this->faker);
    }
}
