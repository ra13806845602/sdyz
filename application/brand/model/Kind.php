<?php

namespace app\brand\model;

use think\Model;

class Kind extends Model
{
    protected $createTime = 'ctime';
    protected $updateTime = 'mtime';
    protected $autoWriteTimestamp = true;

    //
    public function brand()
    {
        return $this->hasOne('Brand', 'id', 'brand_id');
    }

    public function series()
    {
        return $this->hasOne('Series', 'id', 'series_id');
    }

    public function refraction()
    {
        return $this->hasOne('Refraction', 'id', 'refraction_id');
    }

    public function degree()
    {
        return $this->hasOne('Degree', 'id', 'degree_id');
    }

    public function astigmatism()
    {
        return $this->hasOne('Astigmatism', 'id', 'astigmatism_id');
    }

    public function film()
    {
        return $this->hasOne('Film', 'id', 'film_id');
    }
}
