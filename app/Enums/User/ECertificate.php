<?php

namespace App\Enums\User;

enum ECertificate: int
{
    // 選択する
    case Default = 0;
    // 高等学校
    case Higt_School = 1;
    // 高等専門学校
    case College_Of_Technology = 2;
    // 短期大学
    case Junior_College = 3;
    // 大学
    case The_University = 4;
    // 大学院(修士)
    case Graduate_School_Master = 5;
    // 大学院(博士)
    case Graduate_School_Phd = 6;
    // 専門学校
    case Vocational_School = 7;
    // その他
    case Others = 8;
}
