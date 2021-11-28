<?php

namespace myanmarFaker\Test\Provider\nl_BE;

use Faker\Provider\nl_BE\Person;
use Faker\Test\TestCase;

/**
 * @group Person
 */
/**
 * @group legacy
 */
final class PersonTest extends TestCase
{
    public function testRrnIsValid()
    {
        $rrn = $this->faker->rrn();

        self::assertEquals(11, strlen($rrn));

        $ctrlNumber = substr($rrn, 9, 2);
        $calcCtrl = 97 - (substr($rrn, 0, 9) % 97);
        $altcalcCtrl = 97 - ((2 . substr($rrn, 0, 9)) % 97);
        self::assertContains((int) $ctrlNumber, [$calcCtrl, $altcalcCtrl]);

        $middle = substr($rrn, 6, 3);
        self::assertGreaterThan(1, $middle);
        self::assertLessThan(997, $middle);
    }

    public function testRrnIsMale()
    {
        $rrn = $this->faker->rrn('male');
        self::assertEquals(substr($rrn, 6, 3) % 2, 1);
    }

    public function testRrnIsFemale()
    {
        $rrn = $this->faker->rrn('female');
        self::assertEquals(substr($rrn, 6, 3) % 2, 0);
    }

    protected function getProviders(): iterable
    {
        yield new Person($this->faker);
    }
}
