<?php

namespace myanmarFaker\Test\Provider;

use Faker;
use Faker\Test\TestCase;

/**
 * Class ProviderOverrideTest
 */
/**
 * @group legacy
 */
final class ProviderOverrideTest extends TestCase
{
    /**
     * Constants with regular expression patterns for testing the output.
     *
     * Regular expressions are sensitive for malformed strings (e.g.: strings with incorrect encodings) so by using
     * PCRE for the tests, even though they seem fairly pointless, we test for incorrect encodings also.
     */
    public const TEST_STRING_REGEX = '/.+/u';

    /**
     * Slightly more specific for e-mail, the point isn't to properly validate e-mails.
     */
    public const TEST_EMAIL_REGEX = '/^(.+)@(.+)$/ui';

    /**
     * @dataProvider localeDataProvider
     *
     * @param string $locale
     */
    public function testAddress($locale = null)
    {
        $faker = Faker\Factory::create($locale);

        self::assertMatchesRegularExpression(static::TEST_STRING_REGEX, $faker->city);
        self::assertMatchesRegularExpression(static::TEST_STRING_REGEX, $faker->postcode);
        self::assertMatchesRegularExpression(static::TEST_STRING_REGEX, $faker->address);
        self::assertMatchesRegularExpression(static::TEST_STRING_REGEX, $faker->country);
    }

    /**
     * @dataProvider localeDataProvider
     *
     * @param string $locale
     */
    public function testCompany($locale = null)
    {
        $faker = Faker\Factory::create($locale);

        self::assertMatchesRegularExpression(static::TEST_STRING_REGEX, $faker->company);
    }

    /**
     * @dataProvider localeDataProvider
     *
     * @param string $locale
     */
    public function testDateTime($locale = null)
    {
        $faker = Faker\Factory::create($locale);

        self::assertMatchesRegularExpression(static::TEST_STRING_REGEX, $faker->century);
        self::assertMatchesRegularExpression(static::TEST_STRING_REGEX, $faker->timezone);
    }

    /**
     * @dataProvider localeDataProvider
     *
     * @param string $locale
     */
    public function testInternet($locale = null)
    {
        $faker = Faker\Factory::create($locale);

        self::assertMatchesRegularExpression(static::TEST_STRING_REGEX, $faker->userName);

        self::assertMatchesRegularExpression(static::TEST_EMAIL_REGEX, $faker->email);
        self::assertMatchesRegularExpression(static::TEST_EMAIL_REGEX, $faker->safeEmail);
        self::assertMatchesRegularExpression(static::TEST_EMAIL_REGEX, $faker->freeEmail);
        self::assertMatchesRegularExpression(static::TEST_EMAIL_REGEX, $faker->companyEmail);
    }

    /**
     * @dataProvider localeDataProvider
     *
     * @param string $locale
     */
    public function testPerson($locale = null)
    {
        $faker = Faker\Factory::create($locale);

        self::assertMatchesRegularExpression(static::TEST_STRING_REGEX, $faker->name);
        self::assertMatchesRegularExpression(static::TEST_STRING_REGEX, $faker->title);
        self::assertMatchesRegularExpression(static::TEST_STRING_REGEX, $faker->firstName);
        self::assertMatchesRegularExpression(static::TEST_STRING_REGEX, $faker->lastName);
    }

    /**
     * @dataProvider localeDataProvider
     *
     * @param string $locale
     */
    public function testPhoneNumber($locale = null)
    {
        $faker = Faker\Factory::create($locale);

        self::assertMatchesRegularExpression(static::TEST_STRING_REGEX, $faker->phoneNumber);
    }

    /**
     * @dataProvider localeDataProvider
     *
     * @param string $locale
     */
    public function testUserAgent($locale = null)
    {
        $faker = Faker\Factory::create($locale);

        self::assertMatchesRegularExpression(static::TEST_STRING_REGEX, $faker->userAgent);
    }

    /**
     * @dataProvider localeDataProvider
     *
     * @param null   $locale
     * @param string $locale
     */
    public function testUuid($locale = null)
    {
        $faker = Faker\Factory::create($locale);

        self::assertMatchesRegularExpression(static::TEST_STRING_REGEX, $faker->uuid);
    }
}
