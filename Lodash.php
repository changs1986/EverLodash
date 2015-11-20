<?php 
/**
 * Lodash for PHP
 * Ryan 2015.11.20
 */
namespace Ever;
Class Lodash {
    const LEFT = 'left';
    const RIGHT = 'right'; 
    /**
     * 获取数组的维度
     */
    public static function deep($array = array()) {
        if(!is_array($array)){
            return 0;
        }
        $deep = 0;
        foreach($array as $val) {
            $tmp = self::deep($val);
            if ($tmp > $deep){
                $deep = $tmp;
            }
        }
        return $deep + 1;
    }
    /**
     * 获取多维数组的第二维字段集合
     */
    public static function pluck($array = array(), $key = '') {
        if (function_exists('array_column')) {
            // PHP5 PHP_VERSION >= 5.5.0 || PHP7
            return array_column($array, $key);
        } else {
            $result = array();
            foreach ($array as $val) {
                if (is_array($val) && isset($val[$key])) {
                    $result[] = $val[$key];
                }
            }
            return $result;
        }
    }
    /**
     * 对数组去重, 只支持一 & 二维数组
     */
    public static function uniq($array = array(), $key = '') {
        $result = array();
        switch (self::deep($array)) {
            case 0 :
                break;
            case 1 :
                $result = array_unique($array);
                break;
            default :
                $i = 0;
                $tmp = array();
                foreach ($array as $val) {
                    if (!in_array($val[$key], $tmp)) {
                        $tmp[$i] = $val[$key];
                        $result[$i] = $val;
                    }
                    $i++;
                }
                break;
        }
        return $result;
    }
    /**
     * 查找字段索引值
     */
    public static function indexOf($array, $val) {
        $result = -1;
        if (self::deep($array) == 1) {
            $result = array_search($val, $array);
        }
        return $result;
    }
    /**
     * 分割数组
     */
    public static function chunk($array, $chunkNum) {
        return array_chunk($array, $chunkNum);
    }
    /**
     * 找出数组间的差异, 基于第一个元素, 找出第二个元素所没有
     */
    public static function diff($arrayA, $arrayB) {
        return array_diff($arrayB, $arrayA);
    }
    /**
     * 找出数组间的差异, 基于第一个元素, 找出第二个元素所没有
     */
    public static function same($arrayA, $arrayB) {
        return array_intersect($arrayB, $arrayA);
    }
    /**
     * 从数组中删除元素, 一维数组
     */
    public static function pull($array, $val) {
        $key = self::indexOf($array, $val);
        if ($key != -1) {
            array_splice($array, $key, 1);
        }
        return $array;
    }
    /**
     * 向数组中添加元素
     */
    public static function push($array, $val) {
        array_push($array, $val);
        return $array;
    }
    /**
     * 数组过滤
     */
    public static function filter($array, $callback) {
        foreach ($array as $val) {
            if (!$callback($val)) {
                $array = self::pull($array, $val);
            }
        }
        return $array;
    }
    /**
     * 返回数组索引之前切割的新数组
     */
    public static function slice($array, $start, $end) {
        return array_slice($array, $start, $end - $start);
    }
    /**
     * 合并数组并去重
     */
    public static function union($arrayA, $arrayB) {
        $result = array_merge($arrayA, $arrayB);
        return self::uniq($result);
    }

    /**
     * 删除数组从头开始的元素
     */
    public static function drop($array, $num, $direction = self::RIGHT) {
        for ($i = 0; $i < $n; $i++) {
            $direction == self::RIGHT ? array_pop($array) : array_shift($array);
        }
        return $array;
    }
    /**
     * 获取数组第一个元素
     */
    public static function first($array) {
        return array_shift($array);
    }
    /**
     * 获取数组最后一个元素
     */
    public static function last($array) {
        return array_pop($array);
    }
}
