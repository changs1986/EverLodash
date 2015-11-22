<?php
/**
 * EverLodash Test
 */
require_once './Lodash.php';
use Ever\Lodash as _;

/**
 * ). type
 */
var_dump('--- type ---');
$val = '1';
$type = 'integer';
var_dump(_::type($val));
/*
    string 'string' (length=6)
 */
var_dump(_::type($val, $type)); 
/*
    boolean false
 */


/**
 * ). deep
 */
var_dump('--- deep ---');
$val = array(
    array(
    )
);
var_dump(_::deep($val));
/*
    int 2
 */


/**
 * ). compact
 */
var_dump('--- compact ---');
$array = array(
    '1', '0', 0, '', null, false, 1
);
var_dump(_::compact($array));
/*
    array (size=2)
      0 => string '1' (length=1)
      6 => int 1
 */


/**
 * ). diff
 */
var_dump('--- diff ---');
$arrayA = array(1, 2, 3);
$arrayB = array(1, 2, 4);
var_dump(_::diff($arrayA, $arrayB));
/*
    array (size=1)
      2 => int 4
 */


/**
 * ). union
 */
var_dump('--- union ---');
$arrayA = array(1);
$arrayB = array(1, 2);
var_dump(_::union($arrayA, $arrayB));
/*
    array (size=2)
      0 => int 1
      2 => int 2
 */

/**
 * uniq
 */
var_dump('--- uniq ---');
$arrayA = array(1, 2, 1);
$arrayB = array(
    array(
        'name' => 'ryan',
    ),
    array(
        'name' => 'ryanA',
    ),
    array(
        'name' => 'ryan',
    ),
);
var_dump(_::uniq($arrayA));
/*
    array (size=2)
      0 => int 1
      1 => int 2
 */
var_dump(_::uniq($arrayB, 'name'));
/*
    array (size=2)
      0 => 
        array (size=1)
          'name' => string 'ryan' (length=4)
      1 => 
        array (size=1)
          'name' => string 'ryanA' (length=5)
 */


/**
 * ). pluck
 */
var_dump('--- pluck ---');
$array = array(
    array(
        'name' => 'ryan',
    ),
    array(
        'name' => 'ryanA',
    ),
    array(
        'name' => 'ryan',
    ),
);
var_dump(_::pluck($array, 'name'));
/*
    array (size=3)
      0 => string 'ryan' (length=4)
      1 => string 'ryanA' (length=5)
      2 => string 'ryan' (length=4)
 */


/**
 * ). sort
 */
var_dump('--- sort ---');
$array = array(
    array(
        'id' => '3',
        'name' => 'ryanC',
    ),
    array(
        'id' => '2',
        'name' => 'ryanA',
    ),
    array(
        'id' => '1',
        'name' => 'ryanB',
    ),
);
var_dump(_::sort($array, 'name', 'desc'));
/*
    array (size=3)
      0 => 
        array (size=2)
          'id' => string '3' (length=1)
          'name' => string 'ryanC' (length=5)
      1 => 
        array (size=2)
          'id' => string '1' (length=1)
          'name' => string 'ryanB' (length=5)
      2 => 
        array (size=2)
          'id' => string '2' (length=1)
          'name' => string 'ryanA' (length=5)
 */










