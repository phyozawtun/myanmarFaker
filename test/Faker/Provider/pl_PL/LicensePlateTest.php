<?php

namespace myanmarFaker\Provider\pl_PL;

use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class LicensePlateTest extends TestCase
{
    /**
     * Test the validity of license plate
     */
    public function testNonSpecialLicensePlates()
    {
        for ($i = 0; $i < 40; ++$i) {
            $licensePlate = $this->faker->licensePlate;
            self::assertNotEmpty($licensePlate);
            self::assertIsString($licensePlate);
            self::assertMatchesRegularExpression('/^(?:[A-GI-TV-Z][A-PR-Z] [A-PR-Z\d]{5}|[A-GI-TV-Z][A-PR-Z]{2} [A-PR-Z\d]{4,5})$/', $licensePlate);
        }
    }

    /**
     * Test that special license plates are filtered out
     */
    public function testExplicitlyNonSpecialLicensePlates()
    {
        for ($i = 0; $i < 40; ++$i) {
            $licensePlate = $this->faker->licensePlate(
                false
            );
            self::assertNotEmpty($licensePlate);
            self::assertIsString($licensePlate);
            self::assertMatchesRegularExpression('/^(?:[A-GI-TV-Z][A-PR-Z] [A-PR-Z\d]{5}|[A-GI-TV-Z][A-PR-Z]{2} [A-PR-Z\d]{4,5})$/', $licensePlate);
        }
    }

    /**
     * Test that special license plates are filtered out
     */
    public function testWithSpecialLicensePlates()
    {
        for ($i = 0; $i < 5; ++$i) {
            $licensePlate = $this->faker->licensePlate(
                true
            );
            self::assertNotEmpty($licensePlate);
            self::assertIsString($licensePlate);
            self::assertMatchesRegularExpression('/^(?:[A-PR-Z]{2} [A-PR-Z\d]{5}|[A-PR-Z]{3} [A-PR-Z\d]{4,5})$/', $licensePlate);
        }
    }

    /**
     * Test that license plate belongs to podkapracikie voivodeship
     */
    public function testPodkarpackieLicensePlate()
    {
        for ($i = 0; $i < 5; ++$i) {
            $licensePlate = $this->faker->licensePlate(
                false,
                ['podkarpackie']
            );
            self::assertNotEmpty($licensePlate);
            self::assertIsString($licensePlate);
            self::assertMatchesRegularExpression('/^(?:R[A-PR-Z] [A-PR-Z\d]{5}|R[A-PR-Z]{2} [A-PR-Z\d]{4,5})$/', $licensePlate);
        }
    }

    /**
     * Test that license plate belongs to łodzkie voivodeship or to army
     */
    public function testLodzkieOrArmyLicensePlate()
    {
        for ($i = 0; $i < 5; ++$i) {
            $licensePlate = $this->faker->licensePlate(
                true,
                ['łódzkie', 'army']
            );
            self::assertNotEmpty($licensePlate);
            self::assertIsString($licensePlate);
            self::assertMatchesRegularExpression('/^(?:[EU][A-PR-Z] [A-PR-Z\d]{5}|[EU][A-PR-Z]{2} [A-PR-Z\d]{4,5})$/', $licensePlate);
        }
    }

    /**
     * Test that license plate belongs to łodzkie voivodeship but filters out army
     */
    public function testLodzkieButNotArmyLicensePlate()
    {
        for ($i = 0; $i < 5; ++$i) {
            $licensePlate = $this->faker->licensePlate(
                false,
                ['łódzkie', 'army']
            );
            self::assertNotEmpty($licensePlate);
            self::assertIsString($licensePlate);
            self::assertMatchesRegularExpression('/^(?:[E][A-PR-Z] [A-PR-Z\d]{5}|[E][A-PR-Z]{2} [A-PR-Z\d]{4,5})$/', $licensePlate);
        }
    }

    /**
     * Test that license plate belongs is generated when invorrect voivodeship is given
     */
    public function testNoCorrectVoivodeshipLicensePlate()
    {
        for ($i = 0; $i < 5; ++$i) {
            $licensePlate = $this->faker->licensePlate(
                true,
                ['fake voivodeship', 'fake voivodeship2']
            );
            self::assertNotEmpty($licensePlate);
            self::assertIsString($licensePlate);
            self::assertMatchesRegularExpression('/^(?:[A-PR-Z]{2} [A-PR-Z\d]{5}|[A-PR-Z]{3} [A-PR-Z\d]{4,5})$/', $licensePlate);
        }
    }

    /**
     * Test that correct license plate is generated when no voivodeship is given
     */
    public function testNoVoivodeshipLicensePlate()
    {
        for ($i = 0; $i < 5; ++$i) {
            $licensePlate = $this->faker->licensePlate(
                true,
                []
            );
            self::assertNotEmpty($licensePlate);
            self::assertIsString($licensePlate);
            self::assertMatchesRegularExpression('/^(?:[A-PR-Z]{2} [A-PR-Z\d]{5}|[A-PR-Z]{3} [A-PR-Z\d]{4,5})$/', $licensePlate);
        }
    }

    /**
     * Test that correct license plate is generated when no voivodeship or county is given
     */
    public function testNoVoivodeshipNoCountyLicensePlate()
    {
        for ($i = 0; $i < 5; ++$i) {
            $licensePlate = $this->faker->licensePlate(
                true,
                [],
                []
            );
            self::assertNotEmpty($licensePlate);
            self::assertIsString($licensePlate);
            self::assertMatchesRegularExpression('/^(?:[A-PR-Z]{2} [A-PR-Z\d]{5}|[A-PR-Z]{3} [A-PR-Z\d]{4,5})$/', $licensePlate);
        }
    }

    /**
     * Test that license plate belongs to one of warszawski zachodni or radomski counties or to Border Guard
     */
    public function testVoivodeshipCountyLicensePlate()
    {
        for ($i = 0; $i < 5; ++$i) {
            $licensePlate = $this->faker->licensePlate(
                true,
                ['mazowieckie', 'services'],
                ['Straż Graniczna', 'warszawski zachodni', 'radomski']
            );
            self::assertNotEmpty($licensePlate);
            self::assertIsString($licensePlate);
            self::assertMatchesRegularExpression('/^(?:WZ [A-PR-Z\d]{5}|(?:WRA|HWA|HWK) [A-PR-Z\d]{4,5})$/', $licensePlate);
        }
    }

    /**
     * Test that correct license plate belonging to the correct voivedeship is generated when non-existing county is given
     */
    public function testVoivodeshipFakeCountyLicensePlate()
    {
        for ($i = 0; $i < 5; ++$i) {
            $licensePlate = $this->faker->licensePlate(
                true,
                ['mazowieckie', 'services'],
                ['fake county']
            );
            self::assertNotEmpty($licensePlate);
            self::assertIsString($licensePlate);
            self::assertMatchesRegularExpression('/^(?:[WH][A-PR-Z] [A-PR-Z\d]{5}|[WH][A-PR-Z]{2} [A-PR-Z\d]{4,5})$/', $licensePlate);
        }
    }

    /**
     * Test that correct license plate is generated when non-existing voivodeship is given
     */
    public function testVoivodeshipFakeVoivodeshipLicensePlate()
    {
        for ($i = 0; $i < 5; ++$i) {
            $licensePlate = $this->faker->licensePlate(
                true,
                ['fake voivodeship'],
                ['Straż Graniczna', 'warszawski zachodni', 'radomski']
            );
            self::assertNotEmpty($licensePlate);
            self::assertIsString($licensePlate);
            self::assertMatchesRegularExpression('/^(?:[A-PR-Z]{2} [A-PR-Z\d]{5}|[A-PR-Z]{3} [A-PR-Z\d]{4,5})$/', $licensePlate);
        }
    }

    /**
     * Test that correct license plate is generated when null is given instead of voivodeships list
     */
    public function testVoivodeshipNullVoivodeshipArrayLicensePlate()
    {
        for ($i = 0; $i < 5; ++$i) {
            $licensePlate = $this->faker->licensePlate(
                true,
                null,
                ['Straż Graniczna', 'warszawski zachodni', 'radomski']
            );
            self::assertNotEmpty($licensePlate);
            self::assertIsString($licensePlate);
            self::assertMatchesRegularExpression('/^(?:[A-PR-Z]{2} [A-PR-Z\d]{5}|[A-PR-Z]{3} [A-PR-Z\d]{4,5})$/', $licensePlate);
        }
    }

    /**
     * Test that correct license plate is generated when null is given in voivodeships array
     */
    public function testVoivodeshipNullVoivodeshipLicensePlate()
    {
        for ($i = 0; $i < 5; ++$i) {
            $licensePlate = $this->faker->licensePlate(
                true,
                [null],
                ['Straż Graniczna', 'warszawski zachodni', 'radomski']
            );
            self::assertNotEmpty($licensePlate);
            self::assertIsString($licensePlate);
            self::assertMatchesRegularExpression('/^(?:[A-PR-Z]{2} [A-PR-Z\d]{5}|[A-PR-Z]{3} [A-PR-Z\d]{4,5})$/', $licensePlate);
        }
    }

    /**
     * Test that special license plate is not generated when 1st argument is false
     */
    public function testVoivodeship1stArgumentFalse()
    {
        for ($i = 0; $i < 5; ++$i) {
            $licensePlate = $this->faker->licensePlate(
                false,
                ['mazowieckie', 'services'],
                null
            );
            self::assertNotEmpty($licensePlate);
            self::assertIsString($licensePlate);
            self::assertMatchesRegularExpression('/^(?:W[A-PR-Z] [A-PR-Z\d]{5}|W[A-PR-Z]{2} [A-PR-Z\d]{4,5})$/', $licensePlate);
        }
    }

    /**
     * Test that special license plate is generated when 1st argument is true
     */
    public function testVoivodeship1stArgumentTrue()
    {
        for ($i = 0; $i < 5; ++$i) {
            $licensePlate = $this->faker->licensePlate(
                true,
                ['services'],
                null
            );
            self::assertNotEmpty($licensePlate);
            self::assertIsString($licensePlate);
            self::assertMatchesRegularExpression('/^(?:H[A-PR-Z] [A-PR-Z\d]{5}|H[A-PR-Z]{2} [A-PR-Z\d]{4,5})$/', $licensePlate);
        }
    }

    protected function getProviders(): iterable
    {
        yield new LicensePlate($this->faker);
    }
}
