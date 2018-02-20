<?php
/**
 * Created by PhpStorm.
 * User: Sclif
 * Date: 14.02.2018
 * Time: 14:19
 */

namespace MyNewProject\MySiteOnClasses\Plugins;

//Пока не придумал ничего но пусть будет так
/**
 * Class DataValidator
 * @package MyNewProject\MySiteOnClasses\Plugins static FUNCTIONS ... temporary
 */
class DataValidator
{
    /**
     * @param $string = (russian symbols)
     * @return string output eng string
     */
    static function rus_to_translit($string) {
        $converter = array(
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
        );
        return strtr($string, $converter);
    }

    /**
     * @param $str string in
     * @return mixed|string string without "bad simbols"
     */
    static function str_to_low($str) {
        // переводим в транслит
        $str = self::rus_to_translit($str);
        // в нижний регистр
        $str = strtolower($str);
        // заменям все ненужное нам на ""
        $str = preg_replace('~[^-a-z0-9_]+~u', '', $str);
        // удаляем начальные и конечные '-'
        $str = trim($str, "-");
        // удаляем пробелы
        $str = trim($str);
        return $str;
    }

     /**
     * @param $post your !JSON! array for validate
     * @return bool|mixed return false if feel php code else return $post - associated array
     */

    static function filterArr($post) //TODO: plugins/DataValidator filterArr(method)
    {
        $post = (json_decode($post, true, 5, 0));
        $post = str_replace(' ', '', $post);
        foreach ($post as &$value) {
            $value = trim($value, " \t\n\r\0\x0B");
//            $value = preg_replace('~[^.-A-Za-z0-9_]+~u', '',$value);
            $value = strip_tags($value);
            $value = htmlspecialchars($value);
            if (strripos($value, '<?', 0) !== false) {
                return false;
            }
            unset($value);
        }
        return $post;
    }
}