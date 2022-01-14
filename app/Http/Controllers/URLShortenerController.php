<?php

namespace App\Http\Controllers;

use App\Http\Resources\api\APIShortResponse;
use App\Http\Traits\ValidationTrait;
use App\Models\Link;
use Illuminate\Http\Request;

class URLShortenerController extends Controller
{
    use ValidationTrait;

    protected static $rules = [
        'url' => 'required|string',
        'slug' => 'sometimes|max:12|unique:App\Models\Link,slug'
    ];

    public function short(Request $request): APIShortResponse
    {
        $this->validateRequest($request->all(), self::$rules);
        $short = Link::short($request->post('url'), $request->post('slug'));
        return new APIShortResponse($short);
    }
}
