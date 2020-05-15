<?php

namespace app\brand\admin;

use app\brand\model\Astigmatism;
use app\brand\model\Degree;
use app\system\admin\Admin;
use think\Controller;
use think\Request;
use app\brand\model\Series as SeriesModel;

class Series extends Admin
{
    public $tabData = [];
    protected $hisiTable = 'Series';

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        $obj = new SeriesModel();
        if ($this->request->isAjax()) {
            $where = $data = [];
            $page = $this->request->param('page/d', 1);
            $limit = $this->request->param('limit/d', 15);
            $where[] = ['sdyz_series.status', '=', 1];
            $data['data'] = $obj->withJoin('brand')->where($where)->page($page)->limit($limit)->select();
            $data['count'] = $obj->where($where)->count('id');
            $data['code'] = 0;
            $data['msg'] = '';
            return json($data);
        }
        $this->assign('hisiTabData', $this->tabData);
        return $this->fetch('index');
    }

    public function add()
    {
        $obj = new SeriesModel();
        if ($this->request->isAjax()) {
            $data = $this->request->param();
            $validate = new \app\brand\validate\Series();
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $add = $obj->insert($data);
            if ($add !== false) {
                $this->success('添加成功', 'index');
            }
            $this->error('添加失败');
        }
        $brand_obj = new \app\brand\model\Brand();
        $brand_list = $brand_obj->where('status', '=', 1)->select();
        $this->assign('brand_list', $brand_list);
        return $this->fetch('add');
    }


    public function edit($id = 0)
    {
        $row = SeriesModel::where('id', '=', $id)->find();
        $obj = new SeriesModel();
        if ($this->request->isAjax()) {
            $data = $this->request->param();
            $validate = new \app\brand\validate\Series();
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $add = $obj->save($data, ['id' => $id]);
            if ($add !== false) {
                $this->success('修改成功', 'index');
            }
            $this->error('修改失败');
        }
        $this->assign('formData', $row);
        $brand_obj = new \app\brand\model\Brand();
        $brand_list = $brand_obj->where('status', '=', 1)->select();
        $this->assign('brand_list', $brand_list);
        return $this->fetch('edit');
    }

}
