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

    /**
     * @OA\Post(
     *     path="/api/short",
     *     summary="Short a link",
     *     tags={"Shortener"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="url",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="slug",
     *                     type="string"
     *                 ),
     *                 example={"url": "https://google.com", "slug": "test"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *     )
     * )
     */
    public function short(Request $request): APIShortResponse
    {
        $this->validateRequest($request->all(), self::$rules);
        $short = Link::short($request->post('url'), $request->post('slug'));
        return new APIShortResponse($short);
    }
}
