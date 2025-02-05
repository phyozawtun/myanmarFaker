<?php

namespace myanmarFaker\Test\Provider\en_GB;

use Faker\Provider\en_GB\Company;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class CompanyTest extends TestCase
{
    public function testModulus97Algorithm()
    {
        // 9755 format
        self::assertSame('27', $this->faker->calculateModulus97(1234567));
        // Pre November 2009 format
        self::assertSame('82', $this->faker->calculateModulus97(1234567, false));
        // The following value expects a leading zero
        self::assertSame('06', $this->faker->calculateModulus97(1271786));
    }

    public function testModulus97AlgorithmWithInvalidArgument()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->faker->calculateModulus97(123);
    }

    public function testVat()
    {
        $this->assertDefaultVatFormat($this->faker->vat());
        $this->assertDefaultVatFormat($this->faker->vat(Company::VAT_TYPE_DEFAULT));
    }

    private function assertDefaultVatFormat($number)
    {
        self::assertEquals(1, preg_match('/^GB[\d]{3} [\d]{4} [\d]{2}$/', $number));
    }

    public function testVatBranchType()
    {
        $number = $this->faker->vat(Company::VAT_TYPE_BRANCH);
        self::assertEquals(1, preg_match('/^GB[\d]{3} [\d]{4} [\d]{2} [\d]{3}$/', $number));
    }

    public function testVatGovernmentType()
    {
        $number = $this->faker->vat(Company::VAT_TYPE_GOVERNMENT);
        $match = preg_match('/^GBGD([\d]{3})$/', $number, $matches);
        self::assertEquals(1, $match);
        self::assertTrue($matches[1] < 499);
    }

    public function testVatHealthAuthorityType()
    {
        $number = $this->faker->vat(Company::VAT_TYPE_HEALTH_AUTHORITY);
        $match = preg_match('/^GBHA([\d]{3})$/', $number, $matches);
        self::assertEquals(1, $match);
        self::assertTrue($matches[1] > 499);
        self::assertTrue($matches[1] < 1000);
    }

    protected function getProviders(): iterable
    {
        yield new Company($this->faker);
    }
}
