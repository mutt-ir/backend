<?php

/**
 * @OA\Schema(
 *      schema="APIShortRequest",
 *      title="APIShortRequest",
 *      required={"url"},
 * 	    @OA\Property(
 * 	    	property="url",
 * 	    	type="string"
 * 	    ),
 * 	    @OA\Property(
 * 	    	property="slug",
 * 	    	type="string",
 *          maxLength=12
 * 	    )
 * )
 */

/**
 * @OA\Post(
 *     path="/api/short",
 *     summary="Short a link",
 *     tags={"Shortener"},
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 allOf={
 *                      @OA\Schema(ref="#/components/schemas/APIShortRequest"),
 *                 }
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(ref="#/components/schemas/APIShortResponse"),
 *             },
 *         )
 *     )
 * )
 */
