<?php

namespace Tests\Feature\Models;

use App\Models\Link;
use Tests\ModelTestCase;

class LinkTest extends ModelTestCase
{
    protected static $model;

    protected function setUp(): void
    {
        self::$model = new Link();
        parent::setUp();
    }

    public function test_model_configuration()
    {
        $this->runConfigurationAssertions(self::$model,[
            'url',
            'slug'
        ]);
    }

    public function test_short()
    {
        $result = self::$model->short('https://google.com');
        self::assertInstanceOf(Link::class, $result);
    }
}
