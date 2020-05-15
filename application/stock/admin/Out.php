<?php

namespace app\stock\admin;

use app\brand\model\Astigmatism;
use app\brand\model\Degree;
use app\brand\model\Film;
use app\brand\model\Kind;
use app\brand\model\Refraction;
use app\stock\model\Stock;
use app\system\admin\Admin;
use think\Controller;
use think\Request;
use app\stock\model\Out as OutModel;

class Out extends Admin
{
    public $tabData = [];
    protected $hisiTable = 'Stock';

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        $obj = new OutModel();
        if ($this->request->isAjax()) {
            $where = $data = [];
            $page = $this->request->param('page/d', 1);
            $limit = $this->request->param('limit/d', 15);
            $number = $this->request->param('number');
            $series_id = $this->request->param('series_id');
            $refraction_id = $this->request->param('refraction_id');
            $degree_id = $this->request->param('degree_id');
            $astigmatism_id = $this->request->param('astigmatism_id');
            if (!empty($number)) {
                $where[] = ['sdyz_out.number', '=', $number];
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
            $data['data'] = OutModel::join('sdyz_kind', 'sdyz_kind.id=sdyz_out.kind_id', 'inner')
                ->join('sdyz_brand', 'sdyz_brand.id=sdyz_kind.brand_id', 'inner')
                ->join('sdyz_series', 'sdyz_series.id=sdyz_kind.series_id', 'inner')
                ->join('sdyz_refraction', 'sdyz_refraction.id=sdyz_kind.refraction_id', 'inner')
                ->join('sdyz_degree', 'sdyz_degree.id=sdyz_kind.degree_id', 'inner')
                ->join('sdyz_astigmatism', 'sdyz_astigmatism.id=sdyz_kind.astigmatism_id', 'inner')
                ->join('sdyz_film', 'sdyz_film.id=sdyz_kind.film_id', 'inner')
                ->field(['sdyz_out.*', 'sdyz_brand.brand_name', 'sdyz_series.name' => 'series_name', 'sdyz_refraction.value' => 'refraction_value', 'sdyz_degree.value' => 'degree_value', 'sdyz_astigmatism.value' => 'astigmatism_value', 'sdyz_film.name' => 'film_name', 'sdyz_kind.plus', 'sdyz_kind.ball', 'sdyz_kind.eye'])
                ->where($where)->order('sdyz_out.ctime', 'desc')->page($page)->limit($limit)->select();
            $data['count'] = $obj->count('id');
            $data['code'] = 0;
            $data['msg'] = '';
            return json($data);
        }
        $this->data_assign();
        $this->assign('hisiTabData', $this->tabData);
        return $this->fetch('index');
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


    public function import()
    {
        $kind_obj = new Kind();
        if ($this->request->isAjax()) {
            $data = $this->request->param();
            $kind_info = $kind_obj->where('number', '=', $data['number'])->find();
            if (!$kind_info) {
                $this->error('该编码未存在，请先导入');
            }
            $stock_obj = new Stock();
            $stock_info = $stock_obj->where('kind_id', '=', $kind_info['id'])->find();
            if ($stock_info) {
                if ($stock_info['num'] > 0) {
                    $stock_obj->where('kind_id', '=', $kind_info['id'])->setDec('num', 1);
                    OutModel::create(['kind_id' => $kind_info['id'], 'number' => $kind_info['number'], 'ctime' => time(), 'mtime' => time()]);
                    $this->success('出库成功');
                } else {
                    $this->error('暂无库存');
                }
            } else {
                $this->error('暂无库存');
            }
            $this->success('出库成功');
        }
        return $this->fetch('import');
    }


    public function del($id = 0)
    {
        $out_obj = new OutModel();
        $out_info = $out_obj->where('id', '=', $id)->find();
        $stock_obj = new Stock();
        $stock_obj->where('kind_id', '=', $out_info['kind_id'])->setInc('num', 1);
        $result = $out_obj->where('id', '=', $id)->delete();
        if ($result !== false) {
            $this->success('删除成功');
        }
        $this->error('删除失败');
    }
}
