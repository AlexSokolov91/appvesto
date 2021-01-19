<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\UserResponseTrait;

class BaseController extends Controller
{
    use UserResponseTrait;
}
