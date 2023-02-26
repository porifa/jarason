<?php

namespace Porifa\Jarason\Enums;

enum RequestType: string
{
    case GET = 'get';
    case POST = 'post';
    case HEAD = 'head';
    case PUT = 'put';
    case PATCH = 'patch';
    case DELETE = 'delete';
}
