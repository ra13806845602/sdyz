<?php

namespace app\brand\model;

use think\Model;

class Series extends Model
{
    //
    protected $createTime = 'ctime';
    protected $updateTime = 'mtime';
    protected $autoWriteTimestamp = true;

    public function brand()
    {
        return $this->hasOne('Brand', 'id', 'brand_id');
    }

    public function get_all()
    {
        return self::where('status', '=', 1)->select();
    }
}
