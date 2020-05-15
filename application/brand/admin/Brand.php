<?php

namespace app\brand\admin;

use app\system\admin\Admin;
use think\Controller;
use think\Request;
use app\brand\model\Brand as BrandModel;


class Brand extends Admin
{
    public $tabData = [];
    protected $hisiTable = 'Brand';

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        $obj = new BrandModel();
        if ($this->request->isAjax()) {
            $where = $data = [];
            $page = $this->request->param('page/d', 1);
            $limit = $this->request->param('limit/d', 15);
            $where[] = ['status', '=', 1];
            $data['data'] = $obj->where($where)->page($page)->limit($limit)->select();
            $data['count'] = $obj->where($where)->count('id');
            $data['code'] = 0;
            $data['msg'] = '';
            return json($data);
        }
        $this->assign('hisiTabData', $this->tabData);
        return $this->fetch('index');
    }
}
