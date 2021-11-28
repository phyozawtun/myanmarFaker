<?php

namespace myanmarFaker\Test\Provider\ar_SA;

use Faker\Calculator\Luhn;
use Faker\Provider\ar_SA\Company;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class CompanyTest extends TestCase
{
    public function testCompanyIdNumberIsValid()
    {
        $companyIdNumber = $this->faker->companyIdNumber;
        self::assertMatchesRegularExpression('/^700\d{7}$/', $companyIdNumber);
        self::assertTrue(Luhn::isValid($companyIdNumber));
    }

    protected function getProviders(): iterable
    {
        yield new Company($this->faker);
    }
}
