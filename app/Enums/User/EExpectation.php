<?php

namespace App\Enums\User;

enum EExpectation: int
{
    // 特になし
    case None = 0;
    // 今すぐに
    case Now = 1;
    // 1ヶ月以内
    case One_Month = 2;
    // 3ヶ月以内
    case Three_Month = 3;
    // 3ヶ月以上先
    case More_Three_Month = 4;
}
