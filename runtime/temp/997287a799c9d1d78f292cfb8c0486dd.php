<?php /*a:2:{s:73:"E:\phpStudy\PHPTutorial\WWW\hisiphp\application\stock\view\out\index.html";i:1588827782;s:76:"E:\phpStudy\PHPTutorial\WWW\hisiphp\application\system\view\block\layui.html";i:1588348082;}*/ ?>
<form class="layui-form layui-form-pane" lay-filter='dataTable' method="get" id="hisi-table-search">
    <div class="layui-form-item">
        <div class="layui-form-item layui-form-pane">
            <label class="layui-form-label">编码</label>
            <div class="layui-input-inline">
                <input type="text" id="number" name="number" lay-verify="" placeholder="输入编码搜索" class="layui-input">
            </div>
            <label class="layui-form-label">系列</label>
            <div class="layui-input-inline">
                <select name="series_id" id="series_id" lay-verify="required" lay-filter="class_select">
                    <option value="">请选择系列</option>
                    <?php if(is_array($series_list) || $series_list instanceof \think\Collection || $series_list instanceof \think\Paginator): $i = 0; $__LIST__ = $series_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo htmlentities($item['id']); ?>"><?php echo htmlentities($item['name']); ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <label class="layui-form-label">折射率</label>
            <div class="layui-input-inline">
                <select name="refraction_id" id="refraction_id" lay-verify="required" lay-filter="class_select">
                    <option value="">请选择折射率</option>
                    <?php if(is_array($refraction_list) || $refraction_list instanceof \think\Collection || $refraction_list instanceof \think\Paginator): $i = 0; $__LIST__ = $refraction_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo htmlentities($item['id']); ?>"><?php echo htmlentities($item['value']); ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
        <div class="layui-form-item layui-form-pane">
            <label class="layui-form-label">度数</label>
            <div class="layui-input-inline">
                <select name="degree_id" id="degree_id" lay-verify="required" lay-filter="class_select">
                    <option value="">请选择度数</option>
                    <?php if(is_array($degree_list) || $degree_list instanceof \think\Collection || $degree_list instanceof \think\Paginator): $i = 0; $__LIST__ = $degree_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo htmlentities($item['id']); ?>"><?php echo htmlentities($item['value']); ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <label class="layui-form-label">散光</label>
            <div class="layui-input-inline">
                <select name="astigmatism_id" id="astigmatism_id" lay-verify="required" lay-filter="class_select">
                    <option value="">请选择散光</option>
                    <?php if(is_array($astigmatism_list) || $astigmatism_list instanceof \think\Collection || $astigmatism_list instanceof \think\Paginator): $i = 0; $__LIST__ = $astigmatism_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo htmlentities($item['id']); ?>"><?php echo htmlentities($item['value']); ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>

            <label class="layui-form-label">数量</label>
            <div class="layui-input-inline">
                <input type="text" id="num" name="num" lay-verify="" placeholder="输入搜索小于该数量的镜片" class="layui-input">
            </div>

            <div class="layui-input-inline">
                <button class="layui-btn layui-btn-primary layui-btn-normal" type="button" onclick="search()">查询
                </button>
            </div>
        </div>
    </div>
</form>
<table id="dataTable"></table>

<script src="/static/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo htmlentities($_SERVER['SCRIPT_NAME']); ?>", LAYUI_OFFSET = 60;
    layui.config({
    	base: '/static/system/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>

<script type="text/html" id="statusTpl">
    <input type="checkbox" name="status" value="{{ d.status }}" lay-skin="switch" lay-filter="switchStatus"
           lay-text="正常|关闭" {{ d.status== 1
           ? 'checked' : '' }} data-href="<?php echo url('status'); ?>?table=admin_user&id={{ d.id }}">
</script>

<script type="text/html" title="操作按钮模板" id="buttonTpl">
    <a href="<?php echo url('edit'); ?>?id={{ d.id }}" class="layui-btn layui-btn-xs layui-btn-normal" title="修改管理员">修改</a>
<!--    <a href="<?php echo url('del'); ?>?id={{ d.id }}" class="layui-btn layui-btn-xs layui-btn-danger j-tr-del">删除</a>-->
</script>

<script type="text/html" id="toolbar">
    <div class="layui-btn-group fl">
        <a href="<?php echo url('add'); ?>"
           class="layui-btn layui-btn-primary layui-btn-sm layui-icon layui-icon-add-circle-fine">&nbsp;添加</a>
        <a href="<?php echo url('import'); ?>"
           class="layui-btn layui-btn-primary layui-btn-sm layui-icon layui-icon-add-circle-fine">&nbsp;扫描添加</a>
        <!--        <a data-href="<?php echo url('status?val=1'); ?>"-->
        <!--           class="layui-btn layui-btn-primary layui-btn-sm j-page-btns layui-icon layui-icon-play"-->
        <!--           data-table="dataTable">&nbsp;启用</a>-->
        <!--        <a data-href="<?php echo url('status?val=0'); ?>"-->
        <!--           class="layui-btn layui-btn-primary layui-btn-sm j-page-btns layui-icon layui-icon-pause"-->
        <!--           data-table="dataTable">&nbsp;禁用</a>-->
        <!--                <a data-href="<?php echo url('del'); ?>"-->
        <!--                   class="layui-btn layui-btn-primary layui-btn-sm j-page-btns confirm layui-icon layui-icon-close red">&nbsp;删除</a>-->
    </div>
</script>

<script type="text/javascript" src="/static/js/jquery.2.1.4.min.js"></script>
<script type="text/javascript">
    layui.use(['table'], function () {
        var table = layui.table;
        table.render({
            elem: '#dataTable'
            , url: '<?php echo url(); ?>' //数据接口
            , page: true //开启分页
            , skin: 'row'
            , even: true
            , limit: 20
            , text: {
                none: '暂无相关数据'
            }
            , toolbar: '#toolbar'
            , defaultToolbar: ['filter']
            , cols: [[ //表头
                {type: 'checkbox'}
                , {field: 'number', title: '编码'}
                , {
                    field: 'brand_name', title: '品牌', templet: function (d) {
                        return d.brand_name;
                    }
                }
                , {
                    field: 'series', title: '系列', templet: function (d) {
                        return d.series_name;
                    }
                }
                , {
                    field: 'refraction', title: '折射率', templet: function (d) {
                        return d.refraction_value;
                    }
                }
                , {
                    field: 'degree', title: '度数', templet: function (d) {
                        return d.degree_value;
                    }
                }
                , {
                    field: 'astigmatism', title: '散光', templet: function (d) {
                        return d.astigmatism_value;
                    }
                }
                , {
                    field: 'film', title: '膜层', templet: function (d) {
                        return d.film_name;
                    }
                }
                , {
                    field: 'plus', title: '正/负', templet: function (d) {
                        return d.plus == 1 ? '正' : '负';
                    }
                }
                , {
                    field: 'ball', title: '球/非球', templet: function (d) {
                        return d.ball == 1 ? '球' : '非球';
                    }
                }
                , {
                    field: 'eye', title: '左/右眼', templet: function (d) {
                        return d.eye == 0 ? '无需区分' : (d.eye == 1) ? '左眼' : '右眼';
                    }
                }
                , {
                    field: 'num', title: '支数', templet: function (d) {
                        return d.num;
                    }
                }
                // , {field: 'ctime', title: '创建时间'}
                , {title: '操作', templet: '#buttonTpl', width: 110}
            ]]
        });
    });

    function search() {
        var table = layui.table;
        // 获取参数
        var number = $('#number').val();
        var series_id = $('#series_id').val();
        var refraction_id = $('#refraction_id').val();
        var degree_id = $('#degree_id').val();
        var astigmatism_id = $('#astigmatism_id').val();
        var num = $('#num').val();
        table.reload('dataTable', {
            where: { //设定异步数据接口的额外参数，任意设
                number: number,
                series_id: series_id,
                refraction_id: refraction_id,
                degree_id: degree_id,
                astigmatism_id: astigmatism_id,
                num: num,
            }
            , page: {
                curr: 1 //重新从第 1 页开始
            }
        });
    }
</script>