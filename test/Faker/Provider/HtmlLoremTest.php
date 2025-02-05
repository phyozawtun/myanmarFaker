<?php

namespace myanmarFaker\Test\Provider;

use Faker\Provider\HtmlLorem;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class HtmlLoremTest extends TestCase
{
    public function testProvider()
    {
        $node = $this->faker->randomHtml(6, 10);
        self::assertStringStartsWith('<html>', $node);
        self::assertStringEndsWith("</html>\n", $node);
    }

    public function testRandomHtmlReturnsValidHTMLString()
    {
        $node = $this->faker->randomHtml(6, 10);
        $dom = new \DOMDocument();
        $error = $dom->loadHTML($node);
        self::assertTrue($error);
    }

    protected function getProviders(): iterable
    {
        yield new HtmlLorem($this->faker);
    }
}
