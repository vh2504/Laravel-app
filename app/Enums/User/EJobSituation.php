<?php

namespace App\Enums\User;

enum EJobSituation: int
{
    // 選択する
    case Default = 0;
    // 正職員
    case Regular_Staff = 1;
    // 契約職員
    case Contract_Staff = 2;
    // パート・バイト
    case Parttime_Job = 3;
    // 業務委託
    case Business_Entrustment = 4;
    //就業中
    case Working = 5;
    //離職中
    case Unemployed = 6;
    //在学中
    case Studying = 7;
}
