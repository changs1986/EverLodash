<?php 
/**
 * Lodash for PHP
 * Ryan 2015.11.22
 */
namespace Ever;
Class Lodash {
    ### Conf Begin
    /**
     * 变量类型配置
     */
    protected static $typeConf = array(
        'boolean' => 'boolean',
        'integer' => 'integer',
        'double' => 'double',
        'string' => 'string',
        'array' => 'array',
        'object' => 'object',
        'resoure' => 'resoure',
        'null' => 'null',
    );
    const LEFT = 'left';
    const RIGHT = 'right'; 
    const ASC = 'asc'; 
    const DESC = 'desc'; 
    ### Conf End

    ## Basic function Begin
    /**
     * 获取变量的类型; 缺省参数为判断是否为该类型
     */
    public static function type($object, $type = '') {
        $objType = strtolower(gettype($object));
        if ($type) {
            return $objType == $type ? true : false;
        }
        return $objType;
    }
    /**
     * 获取数组的维度
     */
    public static function deep($array = array()) {
        if(!self::type($array, self::$typeConf['array'])){
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
    ## Basic function End


    ## Lodash function Begin
    /**
     * 过滤数组中所有为 false 的值
     */
    public static function compact($array) {
        return array_filter($array, function($item) {
            return $item;
        });
    }
    /**
     * 基于第一个数组, 找出第二个数组中所没有的值
     */
    public static function diff($arrayA, $arrayB) {
        return array_diff($arrayB, $arrayA);
    }
    /**
     * 获取数组第一个元素
     */
    public static function first($array) {
        return array_shift($array);
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
     * 获取数组最后一个元素
     */
    public static function last($array) {
        return array_pop($array);
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
     * 建立一个包含指定范围单元的数组
     */
    public static function range($start, $end, $split = 1) {
        return array_range($start, $end, $split);
    }
    /**
     * 过滤数组中回调函数结果为 true 的值
     */
    public static function remove($array, $callback) {
        return array_diff($array, array_filter($array, $callback));
    }
    /**
     * 删除数组从头开始的元素
     */
    public static function rest($array, $num, $direction = self::RIGHT) {
        for ($i = 0; $i < $n; $i++) {
            $direction == self::RIGHT ? array_pop($array) : array_shift($array);
        }
        return $array;
    }
    /**
     * 合并数组并去重
     */
    public static function union($arrayA, $arrayB) {
        $result = array_merge($arrayA, $arrayB);
        return self::uniq($result);
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
                    if (isset($val[$key]) && !in_array($val[$key], $tmp)) {
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
     * 找出两具数组间的补集合并
     */
    public static function exor($arrayA, $arrayB) {
        return self::uniq(array_merge(array_diff($arrayA, $arrayB), array_diff($arrayB, $arrayA)));
    }
    /**
     * 过滤数组中回调函数结果为 false 的值
     */
    public static function filter($array, $callback) {
        return array_filter($array, $callback);
    }
    /**
     * 对数组中元素执行回调函数
     */
    public static function map($array, $callback) {
        return array_map($array, $callback);
    }
    /**
     * 返回数组中的最大值
     */
    public static function max($array) {
        return array_max($array);
    }
    /**
     * 返回数组中的最小值
     */
    public static function min($array) {
        return array_min($array);
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
     * 随机打乱数组
     */
    public static function shuffle($array) {
        return array_shuffle($array);
    }
    /**
     * 返回数组的长度
     */
    public static function size($array) {
        return count($array);
    }
    /**
     * 返回数组中是否有某元素
     */
    public static function has($array, $val) {
        return in_array($val, array_values($array));
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
    public static function same($arrayA, $arrayB) {
        return array_intersect($arrayB, $arrayA);
    }
    /**
     * 返回数组索引之前切割的新数组
     */
    public static function slice($array, $start, $end) {
        return array_slice($array, $start, $end - $start);
    }
    /**
     * 合并数组
     */
    public static function merge($arrayA, $arrayB) {
        return array_merge($arrayA, $arrayB);
    }
    /**
     * 二维数据排序
     */
    public static function sort($array, $key, $direction = self::DESC) {
        if (self::deep($array) == 1) {
            sort($array);
            return $array;
        } else if (self::deep($array) == 2) {
            $tmp = array();
            $direct = $direction == self::ASC ? SORT_ASC : SORT_DESC;
            foreach ($array as $tmpKey => $val) {
                $tmp[$tmpKey] = $val[$key];
            }
            array_multisort($tmp, $direct, $array);
            return $array;
        }
    }
    ## Lodash function End
}
