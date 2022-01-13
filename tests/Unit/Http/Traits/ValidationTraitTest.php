<?php

namespace Tests\Unit\Http\Traits;

use App\Http\Traits\ValidationTrait;
use PHPUnit\Framework\TestCase;

class ValidationTraitTest extends TestCase
{
    use ValidationTrait;

    public function test_validate_request()
    {
        $result = $this->validateRequest([
            'key' => 'test'
        ], [
            'key' => 'required|string',
        ]);
        $this->assertTrue($result);
    }
}
