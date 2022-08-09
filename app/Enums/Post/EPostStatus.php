<?php

namespace App\Enums\Post;

enum EPostStatus: int
{
    case Rejected = 0;
    case Pending = 1;
    case Approved = 2;
    case Hidden = 3;
    case Published = 4;
    case Draft = 5;
}
