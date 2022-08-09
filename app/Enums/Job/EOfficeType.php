<?php

namespace App\Enums\Job;

enum EOfficeType: int
{
    case HOSPITAL = 0;
    //歯科診療所・技工所
    case DENTISTRY = 1;
}
