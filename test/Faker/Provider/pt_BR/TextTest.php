<?php

namespace myanmarFaker\Test\Provider\pt_BR;

use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class TextTest extends TestCase
{
    private $textClass;

    protected function setUp(): void
    {
        $this->textClass = new \ReflectionClass('Faker\Provider\pt_BR\Text');
    }

    protected function getMethod($name)
    {
        $method = $this->textClass->getMethod($name);

        $method->setAccessible(true);

        return $method;
    }

    public function testItShouldAppendEndPunctToTheEndOfString()
    {
        self::assertSame(
            'Uma noite destas.',
            $this->getMethod('appendEnd')->invokeArgs(null, ['Uma noite destas, '])
        );

        self::assertSame(
            'Uma noite destas.',
            $this->getMethod('appendEnd')->invokeArgs(null, ['Uma noite destas—   '])
        );

        self::assertSame(
            'Uma noite destas.',
            $this->getMethod('appendEnd')->invokeArgs(null, ['Uma noite destas,'])
        );

        self::assertSame(
            'Uma noite destas!.',
            $this->getMethod('appendEnd')->invokeArgs(null, ['Uma noite destas! '])
        );

        self::assertSame(
            'Uma noite destas.',
            $this->getMethod('appendEnd')->invokeArgs(null, ['Uma noite destas: '])
        );

        self::assertSame(
            'Uma noite destas.',
            $this->getMethod('appendEnd')->invokeArgs(null, ['Uma noite destas; '])
        );
    }
}
