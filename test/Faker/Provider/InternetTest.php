<?php

namespace myanmarFaker\Test\Provider;

use Faker\Provider\Company;
use Faker\Provider\Internet;
use Faker\Provider\Lorem;
use Faker\Provider\Person;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class InternetTest extends TestCase
{
    /**
     * @dataProvider localeDataProvider
     */
    public function testEmailIsValid($locale)
    {
        $this->loadLocalProviders($locale);
        self::assertNotFalse(filter_var($this->faker->email(), FILTER_VALIDATE_EMAIL));
    }

    /**
     * @dataProvider localeDataProvider
     */
    public function testUsernameIsValid($locale)
    {
        $this->loadLocalProviders($locale);
        $pattern = '/^[A-Za-z0-9]+([._][A-Za-z0-9]+)*$/';
        $username = $this->faker->username();
        self::assertMatchesRegularExpression($pattern, $username);
    }

    /**
     * @dataProvider localeDataProvider
     */
    public function testDomainnameIsValid($locale)
    {
        $this->loadLocalProviders($locale);
        $pattern = '/^[a-z]+(\.[a-z]+)+$/';
        $domainName = $this->faker->domainName();
        self::assertMatchesRegularExpression($pattern, $domainName);
    }

    /**
     * @dataProvider localeDataProvider
     */
    public function testDomainwordIsValid($locale)
    {
        $this->loadLocalProviders($locale);
        $pattern = '/^[a-z]+$/';
        $domainWord = $this->faker->domainWord();
        self::assertMatchesRegularExpression($pattern, $domainWord);
    }

    public function loadLocalProviders($locale)
    {
        $this->loadLocalProvider($locale, 'Internet');
        $this->loadLocalProvider($locale, 'Person');
        $this->loadLocalProvider($locale, 'Company');
    }

    public function testPasswordIsValid()
    {
        self::assertMatchesRegularExpression('/^.{6}$/', $this->faker->password(6, 6));
    }

    public function testSlugIsValid()
    {
        $pattern = '/^[a-z0-9-]+$/';
        $slug = $this->faker->slug();
        self::assertSame(preg_match($pattern, $slug), 1);
    }

    public function testSlugWithoutVariableNbWordsProducesValidSlug()
    {
        $pattern = '/^[a-z0-9-]+$/';
        $slug = $this->faker->slug(6, false);
        self::assertSame(preg_match($pattern, $slug), 1);
    }

    public function testSlugWithoutVariableNbWordsProducesCorrectNumberOfNbWords()
    {
        $slug = $this->faker->slug(3, false);
        self::assertCount(3, explode('-', $slug));
    }

    public function testSlugWithoutNbWordsIsEmpty()
    {
        $slug = $this->faker->slug(0);
        self::assertSame('', $slug);
    }

    public function testUrlIsValid()
    {
        self::assertNotFalse(filter_var($this->faker->url(), FILTER_VALIDATE_URL));
    }

    public function testLocalIpv4()
    {
        self::assertNotFalse(filter_var($this->faker->localIpv4(), FILTER_VALIDATE_IP, FILTER_FLAG_IPV4));
    }

    public function testIpv4()
    {
        self::assertNotFalse(filter_var($this->faker->ipv4(), FILTER_VALIDATE_IP, FILTER_FLAG_IPV4));
    }

    public function testIpv4NotLocalNetwork()
    {
        self::assertDoesNotMatchRegularExpression('/\A0\./', $this->faker->ipv4());
    }

    public function testIpv4NotBroadcast()
    {
        self::assertNotEquals('255.255.255.255', $this->faker->ipv4());
    }

    public function testIpv6()
    {
        self::assertNotFalse(filter_var($this->faker->ipv6(), FILTER_VALIDATE_IP, FILTER_FLAG_IPV6));
    }

    public function testMacAddress()
    {
        self::assertNotFalse(filter_var($this->faker->macAddress(), FILTER_VALIDATE_MAC));
    }

    protected function getProviders(): iterable
    {
        yield new Lorem($this->faker);

        yield new Person($this->faker);

        yield new Internet($this->faker);

        yield new Company($this->faker);
    }
}
