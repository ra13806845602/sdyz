<?php /*a:2:{s:75:"E:\phpStudy\PHPTutorial\WWW\hisiphp\application\stock\view\index\index.html";i:1588823710;s:76:"E:\phpStudy\PHPTutorial\WWW\hisiphp\application\system\view\block\layui.html";i:1588348082;}*/ ?>
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
    <a href="<?php echo url('del'); ?>?id={{ d.id }}" class="layui-btn layui-btn-xs layui-btn-danger j-tr-del">删除</a>
</script>

<script type="text/html" id="toolbar">
    <div class="layui-btn-group fl">
        <a href="<?php echo url('add'); ?>"
           class="layui-btn layui-btn-primary layui-btn-sm layui-icon layui-icon-add-circle-fine">&nbsp;添加</a>
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
                        return d.brand.brand_name;
                    }
                }
                , {
                    field: 'series', title: '系列', templet: function (d) {
                        return d.series.name;
                    }
                }
                , {
                    field: 'refraction', title: '折射率', templet: function (d) {
                        return d.refraction.value;
                    }
                }
                , {
                    field: 'degree', title: '度数', templet: function (d) {
                        return d.degree.value;
                    }
                }
                , {
                    field: 'astigmatism', title: '散光', templet: function (d) {
                        return d.astigmatism.value;
                    }
                }
                , {
                    field: 'film', title: '膜层', templet: function (d) {
                        return d.film.name;
                    }
                }
                , {
                    field: 'plus', title: '正/负', templet: function (d) {
                        return d.plus==1?'正':'负';
                    }
                }
                , {
                    field: 'ball', title: '球/非球', templet: function (d) {
                        return d.ball==1?'球':'非球';
                    }
                }
                , {
                    field: 'eye', title: '左/右眼', templet: function (d) {
                        return d.eye==0?'无需区分':(d.eye==1)?'左眼':'右眼';
                    }
                }
                // , {field: 'ctime', title: '创建时间'}
                , {title: '操作', templet: '#buttonTpl', width: 110}
            ]]
        });
    });
</script>