<?php

namespace App\Enums\Job;

enum EStatus: int
{
    case SHOW = 1;
    case HIDE = 0;
    case DRAFTS = 2;
    case SHOW_ALL = -1;
}
