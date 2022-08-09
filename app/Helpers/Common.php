<?php

namespace App\Helpers;

use DateTime;
use Illuminate\Pagination\LengthAwarePaginator;

class Common
{
    /**
     * categoryList
     *
     * @param array  $categories
     * @param int    $parent
     * @param string $str
     * @param int    $selected
     * @return void
     */
    public static function categoryList(array $categories, int $parent = 0, string $str = "---", int $selected = 0)
    {
        foreach ($categories as $key => $val) {
            $id = $val['id'];
            $name = $val['name'];
            if ($val['parent_id'] == $parent) {
                if ($selected != 0 && $id == $selected) {
                    echo "<option value=$id selected='selected'>$str $name</option>";
                } else {
                    echo "<option value=$id>$str $name</option>";
                }

                self::categoryList($categories, $id, $str . "  ---", $selected);
            }
        }
    }

    /**
     * categoryListMultiple
     *
     * @param array  $categories
     * @param int    $parent
     * @param string $str
     * @param array  $selected
     * @return void
     */
    public static function categoryListMultiple(
        array $categories,
        int $parent = 0,
        string $str = "---",
        array $selected = []
    ): void {
        foreach ($categories as $key => $val) {
            $id = $val['id'];
            $name = $val['name'];
            if ($val['parent_id'] == $parent) {
                if (!empty($selected) && in_array($id, $selected)) {
                    echo "<option value=$id selected='selected'>$str $name</option>";
                } else {
                    echo "<option value=$id>$str $name</option>";
                }

                self::categoryListMultiple($categories, $id, $str . "  ---", $selected);
            }
        }
    }

    /**
     * createSlug
     *
     * @param string $text
     * @return string
     */
    public static function createSlug(string $text): string
    {
        $text = self::convertStr($text);
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', (string)$text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', (string)$text);

        // trim
        $text = trim((string)$text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower((string)$text);

        if (empty($text)) {
            return '';
        }

        return $text;
    }

    /**
     * @param string $str
     * @return string
     */
    public static function convertStr(string $str): string
    {
        $str = (string)preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = (string)preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = (string)preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = (string)preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = (string)preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = (string)preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = (string)preg_replace("/(đ)/", 'd', $str);
        $str = (string)preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = (string)preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = (string)preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = (string)preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = (string)preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = (string)preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = (string)preg_replace("/(Đ)/", 'D', $str);
        $rule = "/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/";
        $str = (string)preg_replace($rule, '-', $str);
        return (string)preg_replace("/( )/", '-', $str);
    }

    /**
     * @param LengthAwarePaginator $paginator
     * @param int                  $numberShow
     *
     * @return array<int, array<string, float|int|string>|string>
     */
    public static function paginateCustomize(LengthAwarePaginator $paginator, int $numberShow = 3): array
    {
        $paginatorCustomize = [
            [
                'page' => 1,
                'path' => $paginator->url(1)
            ]
        ];

        $startPage = 2;
        $totalPage = ceil($paginator->total() / $paginator->perPage());
        $endPage = $totalPage - 1;
        $currentPage = $paginator->currentPage();
        if ($currentPage >= $numberShow && $currentPage <= $totalPage) {
            $startPage = $currentPage - $numberShow + (int)($numberShow / 2) + 1;
            $startPage = min($startPage, $totalPage - $numberShow + 1);
            $startPage = $startPage == 1 ? 2 : $startPage;
        }

        if ($startPage + $numberShow - 1 < $totalPage) {
            if ((int)($numberShow / 2) + 1 < $currentPage) {
                $endPage = $startPage + $numberShow - 1;
            } else {
                $endPage = $numberShow;
            }
            $endPage = max($endPage, $numberShow);
        }

        if ($startPage - 1 > 1) {
            $paginatorCustomize[] = "...";
        }

        for ($i = $startPage; $i <= $endPage; $i++) {
            $paginatorCustomize[] = [
                'page' => $i,
                'path' => $paginator->url((int)$i)
            ];
        }

        if ($endPage + 1 < $totalPage) {
            $paginatorCustomize[] = "...";
        }

        if ($totalPage > 1) {
            $paginatorCustomize[] = [
                'page' => $totalPage,
                'path' => $paginator->url((int)$totalPage)
            ];
        }

        return $paginatorCustomize;
    }

    /**
     * @param string $birthday
     * @return int
     */
    public static function getAge(string $birthday): int
    {
        $dob = new DateTime($birthday);
        $now = new DateTime();
        $difference = $now->diff($dob);
        $age = $difference->y;

        return $age;
    }
}
