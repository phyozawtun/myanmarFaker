<?php

namespace myanmarFaker\Test\Provider\sv_SE;

use Faker\Provider\sv_SE\Municipality;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class MunicipalityTest extends TestCase
{
    public function testGenerate()
    {
        self::assertNotEmpty($this->faker->municipality());
    }

    protected function getProviders(): iterable
    {
        yield new Municipality($this->faker);
    }
}
