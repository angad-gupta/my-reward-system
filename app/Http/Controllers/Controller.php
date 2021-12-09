<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(title="Rara Ads Api", version="0.1")
 */

 /**
 *
 *  @OA\Server(
 *      url="/api/",
 *      description="Localhost"
 * )
 *  *  @OA\Server(
 *      url="https://raraads.bidhee.net/api/",
 *      description="Raraads OpenApi Server"
 * )
 */

     /**
    * @OA\SecurityScheme(
    *      securityScheme="bearerAuth",
    *      in="header",
    *      name="bearerAuth",
    *      type="http",
    *      scheme="bearer",
    *      bearerFormat="JWT",
    * ),
    */






class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
