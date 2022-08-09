<?php

namespace App\Enums\Job;

/**
 * 雇用形態
 */
enum ESalaryType: int
{
    // すべて: Tất cả
    case ALL = 0;
    // 正職員: Nhân viên chính thức
    case OFFICIAL_STAFF = 1;
    // 契約職員: Nhân viên hợp đồng
    case CONTRACT_STAFF = 2;
    // バート・アルバイト: Parttime
    case PART_TIME = 3;
    // 業務委託：Ủy thác
    case OUTSOURCING_STAFF = 4;
}
