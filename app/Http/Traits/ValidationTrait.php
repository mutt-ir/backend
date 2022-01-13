<?php
namespace App\Http\Traits;

use App\Http\Resources\APIResponse;
use Illuminate\Support\Facades\Validator;
use function abort;
use function response;

trait ValidationTrait
{
    private function validateRequest($data, $rules): bool
    {
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            $statusCode = 422;
            $response = response(
                new APIResponse($validator->errors()->all(), $statusCode),
                $statusCode
            );
            abort($response);
        }
        return true;
    }
}
