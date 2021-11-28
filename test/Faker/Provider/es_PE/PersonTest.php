<?php

namespace myanmarFaker\Test\Provider\es_PE;

use Faker\Provider\es_PE\Person;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PersonTest extends TestCase
{
    public function testDNI()
    {
        $dni = $this->faker->dni;
        self::assertMatchesRegularExpression('/\A[0-9]{8}\Z/', $dni);
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
