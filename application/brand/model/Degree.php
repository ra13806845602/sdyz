<?php

namespace app\brand\model;

use think\Model;

class Degree extends Model
{
    //
    protected $createTime = 'ctime';
    protected $updateTime = 'mtime';
    protected $autoWriteTimestamp = true;

    public function get_all()
    {
        return self::where('status', '=', 1)->select();
    }
}
