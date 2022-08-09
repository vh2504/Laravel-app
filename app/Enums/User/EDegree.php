<?php

namespace App\Enums\User;

enum EDegree: int
{
    // 選択する
    case Default = 0;
    // 卒業
    case Graduation = 1;
    // 中退
    case Drop_Out = 2;
    // 卒業見込み
    case Expected_Graduation = 3;
}
