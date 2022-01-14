<?php

/**
 * @OA\Schema(
 *  schema="APIShortResponse",
 *  title="APIShortResponse",
 *  allOf={
 *     @OA\Schema(ref="#/components/schemas/APIResponse")
 *  },
 * 	@OA\Property(
 * 		property="data",
 * 		allOf={
 *          @OA\Schema(
 * 	            @OA\Property(
 * 	            	property="slug",
 * 	            	type="string"
 * 	            ),
 * 	            @OA\Property(
 * 	            	property="shortened_url",
 * 	            	type="string"
 * 	            )
 *          )
 *     },
 * 	),
 * )
 */
