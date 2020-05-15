<?php

namespace app\stock\model;

use think\Model;

class Out extends Model
{
    //
    protected $createTime = 'ctime';
    protected $updateTime = 'mtime';
    protected $autoWriteTimestamp = true;
}
