<?php

namespace App\Enums\Feature;

enum EType: int
{
    // 診療科目の特徴
    case MEDICAL_SUBJECTS = 0;
    // サービス形態の特徴
    case SERVICE = 1;
    // 仕事内容の特徴
    case JOB_DESCRIPTION = 2;
    // 給与・待遇・福利厚生の特徴
    case WELFARE = 3;
    // 勤務時間の特徴
    case WORKING_TIME = 4;
    // 休日の特徴
    case HOLIDAY = 5;
    // 応募要件の特徴
    case APPLICATION_REQUIREMENTS = 6;
    // アクセスの特徴
    case ACCESS = 7;
}
