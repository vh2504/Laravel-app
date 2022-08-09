<?php

namespace App\Enums\Job;

/**
 * @link ref https://job-medley.com/dh/clinic/
 * @note その他の施設形態から探す
 */
enum EType: int
{
    // 病院
    case HOSPITAL = 0;
    // 歯科診療所・技工所
    case DENTISTRY = 1;
    // 代替医療・リラクゼーション
    case RELAXATION = 2;
    // 介護・福祉事業所
    case WELFARE = 3;
    // 薬局・ドラッグストア
    case  PHARMACY = 4;
    // 訪問看護ステーション
    case HOME_NURSING = 5;
    // 保育園・幼稚園
    case CHILDCARE = 6;
    // 美容・サロン・ジム
    case SALON = 7;
    // その他（企業・学校等）
    case OTHER = 8;
}
