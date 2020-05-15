<?php

namespace app\stock\admin;

use app\brand\model\Astigmatism;
use app\brand\model\Degree;
use app\brand\model\Film;
use app\brand\model\Kind;
use app\brand\model\Refraction;
use app\stock\model\Stock;
use app\system\admin\Admin;

class Index extends Admin
{
    public $tabData = [];
    protected $hisiTable = 'Stock';

    public function index()
    {
        $obj = new Stock();
        if ($this->request->isAjax()) {
            $where = $data = [];
            $page = $this->request->param('page/d', 1);
            $limit = $this->request->param('limit/d', 15);
            $number = $this->request->param('number');
            $series_id = $this->request->param('series_id');
            $refraction_id = $this->request->param('refraction_id');
            $degree_id = $this->request->param('degree_id');
            $astigmatism_id = $this->request->param('astigmatism_id');
            $num = $this->request->param('num');
            if (!empty($number)) {
                $where[] = ['sdyz_stock.number', '=', $number];
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
            if (!empty($num)) {
                $where[] = ['sdyz_stock.num', '<=', $num];
            }
            $data['data'] = Stock::join('sdyz_kind', 'sdyz_kind.id=sdyz_stock.kind_id', 'inner')
                ->join('sdyz_brand', 'sdyz_brand.id=sdyz_kind.brand_id', 'inner')
                ->join('sdyz_series', 'sdyz_series.id=sdyz_kind.series_id', 'inner')
                ->join('sdyz_refraction', 'sdyz_refraction.id=sdyz_kind.refraction_id', 'inner')
                ->join('sdyz_degree', 'sdyz_degree.id=sdyz_kind.degree_id', 'inner')
                ->join('sdyz_astigmatism', 'sdyz_astigmatism.id=sdyz_kind.astigmatism_id', 'inner')
                ->join('sdyz_film', 'sdyz_film.id=sdyz_kind.film_id', 'inner')
                ->field(['sdyz_stock.*', 'sdyz_brand.brand_name', 'sdyz_series.name' => 'series_name', 'sdyz_refraction.value' => 'refraction_value', 'sdyz_degree.value' => 'degree_value', 'sdyz_astigmatism.value' => 'astigmatism_value', 'sdyz_film.name' => 'film_name', 'sdyz_kind.plus', 'sdyz_kind.ball', 'sdyz_kind.eye'])
                ->where($where)->page($page)->limit($limit)->select();
            $data['count'] = $obj->count('id');
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
                $stock_obj->where('kind_id', '=', $kind_info['id'])->setInc('num', $data['num']);
            } else {
                $stock_obj->insert(['kind_id' => $kind_info['id'], 'number' => $kind_info['number'], 'num' => $data['num'], 'ctime' => time(), 'mtime' => time()]);
            }
            $this->success('添加成功', 'index');
        }
        return $this->fetch('add');
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
                $stock_obj->where('kind_id', '=', $kind_info['id'])->setInc('num', 1);
            } else {
                $stock_obj->insert(['kind_id' => $kind_info['id'], 'number' => $kind_info['number'], 'num' => 1, 'ctime' => time(), 'mtime' => time()]);
            }
            $this->success('添加成功');
        }
        return $this->fetch('import');
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


    public function edit($id = 0)
    {
        $stock_obj = new Stock();
        if ($this->request->isAjax()) {
            $data = $this->request->param();
            $result = $stock_obj->save(['num' => $data['num']], ['id' => $data['id']]);
            if ($result !== false) {
                $this->success('修改成功', 'index');
            }
            $this->error('修改失败');
        }
        $this->assign('formData', $stock_obj->where('id', '=', $id)->find());
        return $this->fetch();
    }

    public function change($id = 0)
    {
        $stock_obj = new Stock();
        if ($this->request->isAjax()) {
            $data = $this->request->param();
            $result = $stock_obj->save(['num' => $data['num']], ['id' => $data['id']]);
            if ($result !== false) {
                $this->success('修改成功', 'index');
            }
            $this->error('修改失败');
        }
        $this->assign('formData', $stock_obj->where('id', '=', $id)->find());
        return $this->fetch();
    }

    public function detail()
    {
        //注释更新,注释更新,注释更新,注释更新
        if ($this->request->isAjax()) {
            $data = [];
            $series_id = $this->request->param('series_id');
            $refraction_id = $this->request->param('refraction_id');
            $film_id = $this->request->param('film_id');
            $ball = $this->request->param('ball');
            if (empty($series_id)) {
                $this->error('请选择系列');
            }
            if (empty($refraction_id)) {
                $this->error('请选择折射率');
            }
            if (empty($film_id)) {
                $this->error('请选择膜层');
            }
            if ($ball == '') {
                $this->error($ball);
            }
            session('series_id', $series_id);
            session('refraction_id', $refraction_id);
            session('film_id', $film_id);
            session('ball', $ball);
            $degree_obj = new Degree();
            $degree = $degree_obj->where('status', '=', 1)->field(['id', 'value'])->select();
            $astigmatism_obj = new Astigmatism();
            $astigmatism = $astigmatism_obj->where('status', '=', 1)->column('id');
            $result = array();
            $kind_obj = new Kind();
            $stock_obj = new Stock();
            $all_sum = 0;
            $v1_sum = 0;
            $v2_sum = 0;
            $v3_sum = 0;
            $v4_sum = 0;
            $v5_sum = 0;
            $v6_sum = 0;
            $v7_sum = 0;
            $v8_sum = 0;
            $v9_sum = 0;
            foreach ($degree as &$item) {
                $v = 1;
                $arr = array();
                $arr['degree'] = '-' . $item['value'];
                $sum = 0;
                foreach ($astigmatism as &$as) {
                    $kind_info = $kind_obj->where(['series_id' => $series_id, 'refraction_id' => $refraction_id, 'film_id' => $film_id, 'degree_id' => $item['id'], 'astigmatism_id' => $as, 'plus' => 0])->find();
                    if (!$kind_info) {
                        $arr['v' . $v] = 0;
                        $v++;
                        continue;
                    } else {
                        $stock_info = $stock_obj->where('kind_id', '=', $kind_info['id'])->find();
                        if (!$stock_info) {
                            $arr['v' . $v] = 0;
                            $v++;
                            continue;
                        } else {
                            $sum += $stock_info['num'];
                            switch ($v) {
                                case 1:
                                    $v1_sum += $stock_info['num'];
                                    break;
                                case 2:
                                    $v2_sum += $stock_info['num'];
                                    break;
                                case 3:
                                    $v3_sum += $stock_info['num'];
                                    break;
                                case 4:
                                    $v4_sum += $stock_info['num'];
                                    break;
                                case 5:
                                    $v5_sum += $stock_info['num'];
                                    break;
                                case 6:
                                    $v6_sum += $stock_info['num'];
                                    break;
                                case 7:
                                    $v7_sum += $stock_info['num'];
                                    break;
                                case 8:
                                    $v8_sum += $stock_info['num'];
                                    break;
                                case 9:
                                    $v9_sum += $stock_info['num'];
                                    break;
                            }
                            $all_sum += $stock_info['num'];
                            $arr['v' . $v] = "<a style='color:blue' class='layui-btn layui-btn-primary layui-btn-sm layui-icon hisi-iframe' href='change?id=" . $stock_info['id'] . "'>" . $stock_info['num'] . "</a>";
                            $v++;
                            continue;
                        }
                    }
                }
                $arr['sum'] = $sum;
                array_push($result, $arr);
            }
            array_push($result, ['degree' => '总和', 'v1' => $v1_sum, 'v2' => $v2_sum, 'v3' => $v3_sum, 'v4' => $v4_sum, 'v5' => $v5_sum, 'v6' => $v6_sum, 'v7' => $v7_sum, 'v8' => $v8_sum, 'v9' => $v9_sum, 'sum' => $all_sum]);
//            foreach ($degree as &$item) {
//                $v = 1;
//                $arr = array();
//                $arr['degree'] = '+' . $item['value'];
//                $sum = 0;
//                foreach ($astigmatism as &$as) {
//                    $kind_info = $kind_obj->where(['series_id' => $series_id, 'refraction_id' => $refraction_id, 'film_id' => $film_id, 'degree_id' => $item['id'], 'astigmatism_id' => $as, 'plus' => 1])->find();
//                    if (!$kind_info) {
//                        $arr['v' . $v] = 0;
//                        $v++;
//                        continue;
//                    } else {
//                        $stock_info = $stock_obj->where('kind_id', '=', $kind_info['id'])->find();
//                        if (!$stock_info) {
//                            $arr['v' . $v] = 0;
//                            $v++;
//                            continue;
//                        } else {
//                            $sum+=$stock_info['num'];
//                            $arr['v' . $v] = $stock_info['num'];
//                            $v++;
//                            continue;
//                        }
//                    }
//                }
//                $arr['sum'] = $sum;
//                array_push($result,$arr);
//            }
            $data['count'] = 98;
            $data['code'] = 0;
            $data['msg'] = '';
            $data['data'] = $result;
            return json($data);
        }
        $this->data_assign();
        $this->assign('hisiTabData', $this->tabData);
        return $this->fetch();
    }
}