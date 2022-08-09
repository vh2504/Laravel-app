<?php

namespace App\Enums\User;

enum EPosition: int
{
    // 選択する
    case Default = 0;
    // なし
    case None = 1;
    // 医院長/副医院長
    case Head_Doctor = 2;
    // その他
    case Other = 3;
}
