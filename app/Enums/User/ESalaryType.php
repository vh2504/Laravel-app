<?php

namespace App\Enums\User;

enum ESalaryType: int
{
    // 選択する
    case Default = 0;
    // 年収
    case Annual_Income = 1;
    // 月収
    case Monthly_Income = 2;
    // 日給
    case Daily = 3;
    // 時給
    case Hourly_Wage = 4;
}
