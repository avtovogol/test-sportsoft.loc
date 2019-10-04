<?php
/**
 * Created by PhpStorm.
 * User: Георгий
 * Date: 03.10.2019
 * Time: 14:45
 */


namespace common\components;

/**
 * Вспомогательные функции
 */
class Helper

{
    /*
     * Преобразует первый символ строки в верхний регистр
     * @param string $string
     * @return $string
     */
    public static function my_mb_ucfirst($string) {
        $fc = mb_strtoupper(mb_substr($string, 0, 1));
        return $fc.mb_substr($string, 1);
    }
}
