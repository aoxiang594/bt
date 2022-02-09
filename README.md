# bt

首先感谢`dawangzaishang`写的轮子。

来源于`https://gitee.com/dawangzaishang/bt/tree/master/src`
因为有部分错误，且部分需求没有实现，所以 clone 过来改了一下。

#### 介绍
宝塔面板API

#### 使用说明

```php

    $bt = new System('http://127.0.0.1:8888', 'Key');
    $bt->getSystemTotal();

```