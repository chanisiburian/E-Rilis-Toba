<?php

namespace App\Http\Controllers;

use App\Http\Middleware\ApiAccess;
use App\Http\Middleware\ApiAccessAdmin;
use App\Http\Middleware\ApiAccessUser;
use App\Http\Middleware\ApiVerif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
