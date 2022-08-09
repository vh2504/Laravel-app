<?php

namespace App\Enums\User;

enum EMarital: int
{
    // あり
    case IsMarital = 1;
    // なし
    case IsNotMarital = 2;
}
