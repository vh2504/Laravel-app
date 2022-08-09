<?php

namespace Database\Seeders;

use App\Models\OfficeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $officeTypes = [
            '病院',
            '診療所',
            '歯科診療所・技工所',
            '代替医療・リラクゼーション',
            '介護・福祉事業所',
            '薬局・ドラッグストア',
            '訪問看護ステーション',
            '保育園・幼稚園',
            '美容・サロン・ジム',
            'その他（企業・学校等)'
        ];

        foreach($officeTypes as $officeType) {
            OfficeType::create(
                [
                    'name' => $officeType,
                ]
            );
        }
    }
}
