<?php

namespace myanmarFaker\Test\Provider\lt_LT;

use Faker\Provider\lt_LT\Address;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class AddressTest extends TestCase
{
    public function testMunicipality()
    {
        self::assertStringEndsWith('savivaldybė', $this->faker->municipality());
    }

    protected function getProviders(): iterable
    {
        yield new Address($this->faker);
    }
}
