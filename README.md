[<img src="https://travis-ci.org/alairock/lodash-php.svg">](https://travis-ci.org/alairock/lodash-php)
# EverLodash

> Ryan 2015.11.22   
> GitHub : https://github.com/everCyan/EverLodash   
> Composer : https://packagist.org/packages/ever/lodash   

---

- ). 如果有在使用 Composer 包管理的话


		{
			"require": {
				"ever/lodash": "*@dev"
		    }
		}


	然后 

		composer update

- ). 如果直接 Github 下载源码, 引入使用


- ). 使用示例


		use Ever\Lodash as _;
		var_dump(_::uniq(array(1, 2, 1)));

---

以前在写 NodeJS 时用过一个很好用的工具 [lodash](https://lodash.com), 封装了一套对于 (数组|集合|字典|JSON对象) 的操作.

后来回到写 PHP, 发现蛮多类似的需求官方却没有技术支持.

举个例子, 二维数组去重, 在 lodash 中, 直接 _.uniq(obj, 'id') 就可以搞定的事, PHP 中却只有简单的一维数组去重函数 array_uniq().

再比如拿到二维数组某个字段组成一维数组集合时, lodash 中直接 _.pluck(obj, 'name'). 而 PHP 官方的函数库直到 (PHP 5 >= 5.5.0, PHP 7)时, 才出了一个 array_column().

而此时, 很多线上的PHP版本还停留在 5.3(就像我们公司的PHP版本), 就直接跪了.

### 然后

想着直接把一些 lodash 中好用的函数去 PHP 重写一套吧.

### 于是乎

包里有个 test 文件, 把一些我觉得有必要示例的函数作了个 DEMO, 其余一些函数建议自己去读源码吧~

就这样吧.

---

以上

---
