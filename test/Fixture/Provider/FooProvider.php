<?php

namespace myanmarFaker\Test\Fixture\Provider;

final class FooProvider
{
    public function fooFormatter()
    {
        return 'foobar';
    }

    public function fooFormatterWithArguments($value = '')
    {
        return 'baz' . $value;
    }
}
