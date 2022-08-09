<?php

namespace App\Enums\Job;

/**
 * 給与期間
 * Lương theo thời kì
 *  時給: lương giờ
 *  月給: lương tháng
 *  年給: Lương năm
 */
enum ESalary: int
{
    // 時給
    case PAY_BY_H = 0;
    // 月給
    case PAY_BY_M = 1;
    // 年給
    case PAY_BY_Y = 2;
}
