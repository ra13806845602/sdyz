<?php

namespace app\brand\admin;

use app\brand\model\Astigmatism;
use app\brand\model\Degree;
use app\brand\model\Film;
use app\brand\model\Refraction;
use app\brand\validate\Kind;
use app\system\admin\Admin;
use think\Controller;
use think\Request;
use app\brand\model\Kind as KindModel;

class Type extends Admin
{
    public $tabData = [];
    protected $hisiTable = 'Kind';

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        $obj = new KindModel();
        if ($this->request->isAjax()) {
            $where = $data = [];
            $page = $this->request->param('page/d', 1);
            $limit = $this->request->param('limit/d', 15);
            $where[] = ['sdyz_kind.status', '=', 1];
            $number = $this->request->param('number');
            $series_id = $this->request->param('series_id');
            $refraction_id = $this->request->param('refraction_id');
            $degree_id = $this->request->param('degree_id');
            $astigmatism_id = $this->request->param('astigmatism_id');
            if (!empty($number)) {
                $where[] = ['sdyz_kind.number', '=', $number];
            }
            if (!empty($series_id)) {
                $where[] = ['sdyz_kind.series_id', '=', $series_id];
            }
            if (!empty($refraction_id)) {
                $where[] = ['sdyz_kind.refraction_id', '=', $refraction_id];
            }
            if (!empty($degree_id)) {
                $where[] = ['sdyz_kind.degree_id', '=', $degree_id];
            }
            if (!empty($astigmatism_id)) {
                $where[] = ['sdyz_kind.astigmatism_id', '=', $astigmatism_id];
            }
            $data['data'] = $obj->with(['brand', 'series', 'refraction', 'degree', 'astigmatism', 'film'])
                ->where($where)->page($page)->limit($limit)->select();
            $data['count'] = $obj->where($where)->count('id');
            $data['code'] = 0;
            $data['msg'] = '';
            return json($data);
        }
        $this->data_assign();
        $this->assign('hisiTabData', $this->tabData);
        return $this->fetch('index');
    }

    public function add()
    {
        $obj = new KindModel();
        if ($this->request->isAjax()) {
            $data = $this->request->param();
            $validate = new Kind();
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $data['brand_id'] = \app\brand\model\Series::where('id', '=', $data['series_id'])->value('brand_id');
            $add = $obj->insert($data);
            if ($add !== false) {
                $this->success('添加成功', 'index');
            }
            $this->error('添加失败');
        }
        $this->data_assign();
        return $this->fetch('add');
    }


    public function edit($id = 0)
    {
        $obj = new KindModel();
        $row = $obj->where("id", '=', $id)->find();
        if ($this->request->isAjax()) {
            $data = $this->request->param();
            $validate = new Kind();
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $data['brand_id'] = \app\brand\model\Series::where('id', '=', $data['series_id'])->value('brand_id');
            $add = $obj->save($data, ['id' => $id]);
            if ($add !== false) {
                $this->success('修改成功', 'index');
            }
            $this->error('修改失败');
        }
        $this->assign('formData', $row);
        $this->data_assign();
        return $this->fetch('edit');
    }


    public function data_assign()
    {
        $series_obj = new \app\brand\model\Series();
        $this->assign('series_list', $series_obj->get_all());

        $refraction_obj = new Refraction();
        $this->assign('refraction_list', $refraction_obj->get_all());

        $degree_obj = new Degree();
        $this->assign('degree_list', $degree_obj->get_all());

        $astigmatism_obj = new Astigmatism();
        $this->assign('astigmatism_list', $astigmatism_obj->get_all());

        $film_obj = new Film();
        $this->assign('film_list', $film_obj->get_all());
    }
}
