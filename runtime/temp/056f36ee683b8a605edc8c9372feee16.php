<?php /*a:6:{s:73:"/Applications/MAMP/htdocs/hisiphp/application/stock/view/index/index.html";i:1588827782;s:69:"/Applications/MAMP/htdocs/hisiphp/application/system/view/layout.html";i:1588348082;s:75:"/Applications/MAMP/htdocs/hisiphp/application/system/view/block/header.html";i:1588348082;s:73:"/Applications/MAMP/htdocs/hisiphp/application/system/view/block/menu.html";i:1588348082;s:74:"/Applications/MAMP/htdocs/hisiphp/application/system/view/block/layui.html";i:1588348082;s:75:"/Applications/MAMP/htdocs/hisiphp/application/system/view/block/footer.html";i:1588348082;}*/ ?>
<?php if(input('param.hisi_iframe') || cookie('hisi_iframe')): ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlentities($hisiCurMenu['title']); ?> -  Powered by <?php echo config('hisiphp.name'); ?></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link rel="stylesheet" href="/static/js/layui/css/layui.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/static/system/css/theme.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/static/system/css/style.css?v=<?php echo config('hisiphp.version'); ?>" media="all">
    <link rel="stylesheet" href="/static/fonts/typicons/min.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/static/fonts/font-awesome/min.css?v=<?php echo config('hisiphp.version'); ?>">
    <?php echo $hisiHead; ?>
</head>
<body class="hisi-theme-<?php echo cookie('hisi_admin_theme'); ?> pb50">
<?php else: ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php if($hisiCurMenu['url'] == 'system/index/index'): ?>管理控制台<?php else: ?><?php echo htmlentities($hisiCurMenu['title']); ?><?php endif; ?> -  Powered by <?php echo config('hisiphp.name'); ?></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link rel="stylesheet" href="/static/js/layui/css/layui.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/static/system/css/theme.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/static/system/css/style.css?v=<?php echo config('hisiphp.version'); ?>" media="all">
    <link rel="stylesheet" href="/static/fonts/typicons/min.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/static/fonts/font-awesome/min.css?v=<?php echo config('hisiphp.version'); ?>">
    <?php echo $hisiHead; ?>
</head>
<body class="layui-layout-body hisi-theme-<?php echo cookie('hisi_admin_theme'); ?>">
<?php 
$ca = strtolower(request()->controller().'/'.request()->action());
 ?>
<div class="layui-layout layui-layout-admin">
    <div class="layui-header" style="z-index:999!important;">
    <div class="fl header-logo">后台管理中心</div>
    <div class="fl header-fold"><a href="javascript:;" title="打开/关闭左侧导航" class="aicon ai-shouqicaidan" id="foldSwitch"></a></div>
    <ul class="layui-nav fl nobg main-nav">
        <?php if(is_array($hisiMenus) || $hisiMenus instanceof \think\Collection || $hisiMenus instanceof \think\Paginator): $i = 0; $__LIST__ = $hisiMenus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(($hisiCurParents['pid'] == $vo['id'] and $ca != 'plugins/run') or ($ca == 'plugins/run' and $vo['id'] == 3)): ?>
           <li class="layui-nav-item layui-this">
            <?php else: ?>
            <li class="layui-nav-item">
            <?php endif; ?> 
            <a href="javascript:;"><?php echo htmlentities($vo['title']); ?></a></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <ul class="layui-nav fr nobg head-info">
        <li class="layui-nav-item">
            <a href="/" target="_blank" class="aicon ai-ai-home" title="前台"></a>
        </li>
        <li class="layui-nav-item">
            <a href="javascript:void(0);" class="aicon ai-qingchu" id="hisi-clear-cache" title="清缓存"></a>
        </li>
        <li class="layui-nav-item">
            <a href="javascript:void(0);" class="aicon ai-suo" id="lockScreen" title="锁屏"></a>
        </li>
        <li class="layui-nav-item">
            <a href="<?php echo url('system/user/setTheme'); ?>" id="hisi-theme-setting" class="aicon ai-theme"></a>
        </li>
        <li class="layui-nav-item hisi-lang">
            <a href="javascript:void(0);"><i class="layui-icon layui-icon-website"></i></a>
            <dl class="layui-nav-child">
                <?php if(is_array($languages) || $languages instanceof \think\Collection || $languages instanceof \think\Paginator): $i = 0; $__LIST__ = $languages;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['pack']): ?>
                    <dd><a href="<?php echo url('system/index/index'); ?>?lang=<?php echo htmlentities($vo['code']); ?>"><?php echo htmlentities($vo['name']); ?></a></dd>
                    <?php endif; ?>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <dd>
                    <a data-id="000" class="admin-nav-item top-nav-item" href="<?php echo url('system/language/index'); ?>">语言包管理</a>
                </dd>
            </dl>
        </li>
        <li class="layui-nav-item">
            <a href="javascript:void(0);"><?php echo htmlentities($login['nick']); ?>&nbsp;&nbsp;</a>
            <dl class="layui-nav-child">
                <dd>
                    <a data-id="00" class="admin-nav-item top-nav-item" href="<?php echo url('system/user/info'); ?>">个人设置</a>
                </dd>
                <dd>
                    <a href="<?php echo url('system/user/iframe'); ?>" class="hisi-ajax" refresh="true"><?php echo input('cookie.hisi_iframe') ? '单页布局' : '框架布局'; ?></a>
                </dd>
                <dd>
                    <a href="<?php echo url('system/publics/logout'); ?>">退出登陆</a>
                </dd>
            </dl>
        </li>
    </ul>
</div>
<div class="layui-side layui-bg-black" id="switchNav">
    <div class="layui-side-scroll">
        <?php if(is_array($hisiMenus) || $hisiMenus instanceof \think\Collection || $hisiMenus instanceof \think\Paginator): $i = 0; $__LIST__ = $hisiMenus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if(($hisiCurParents['pid'] == $v['id'] and $ca != 'plugins/run') or ($ca == 'plugins/run' and $v['id'] == 3)): ?>
        <ul class="layui-nav layui-nav-tree">
        <?php else: ?>
        <ul class="layui-nav layui-nav-tree" style="display:none;">
        <?php endif; if((isset($v['childs']))): if(is_array($v['childs']) || $v['childs'] instanceof \think\Collection || $v['childs'] instanceof \think\Paginator): $kk = 0; $__LIST__ = $v['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?>
            <li class="layui-nav-item <?php if($kk == 1): ?>layui-nav-itemed<?php endif; ?>">
                <a href="javascript:;"><i class="<?php echo htmlentities($vv['icon']); ?>"></i><?php echo htmlentities($vv['title']); ?><span class="layui-nav-more"></span></a>
                <dl class="layui-nav-child">
                    <?php if($vv['title'] == '快捷菜单'): ?>
                        <dd>
                            <a class="admin-nav-item" data-id="0" href="<?php echo input('cookie.hisi_iframe') ? url('system/index/welcome') : url('system/index/index'); ?>"><i class="aicon ai-shouye"></i> 后台首页</a>
                        </dd>
                        <?php if((isset($vv['childs']))): if(is_array($vv['childs']) || $vv['childs'] instanceof \think\Collection || $vv['childs'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($i % 2 );++$i;?>
                        <dd>
                            <a class="admin-nav-item" data-id="<?php echo htmlentities($vvv['id']); ?>" href="<?php if(strpos('http', $vvv['url']) === false): ?><?php echo url($vvv['url'], $vvv['param']); else: ?><?php echo htmlentities($vvv['url']); ?><?php endif; ?>"><?php if(file_exists('.'.$vvv['icon'])): ?><img src="<?php echo htmlentities($vvv['icon']); ?>" width="16" height="16" /><?php else: ?><i class="<?php echo htmlentities($vvv['icon']); ?>"></i><?php endif; ?> <?php echo htmlentities($vvv['title']); ?></a><i data-href="<?php echo url('system/menu/del?id='.$vvv['id']); ?>" class="layui-icon j-del-menu">&#xe640;</i>
                        </dd>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php endif; else: if((isset($vv['childs']))): if(is_array($vv['childs']) || $vv['childs'] instanceof \think\Collection || $vv['childs'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($i % 2 );++$i;?>
                        <dd>
                            <a class="admin-nav-item" data-id="<?php echo htmlentities($vvv['id']); ?>" href="<?php if(strpos('http', $vvv['url']) === false): ?><?php echo url($vvv['url'], $vvv['param']); else: ?><?php echo htmlentities($vvv['url']); ?><?php endif; ?>"><?php if(file_exists('.'.$vvv['icon'])): ?><img src="<?php echo htmlentities($vvv['icon']); ?>" width="16" height="16" /><?php else: ?><i class="<?php echo htmlentities($vvv['icon']); ?>"></i><?php endif; ?> <?php echo htmlentities($vvv['title']); ?></a>
                        </dd>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </dl>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        <?php endif; ?>
        </ul>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
<script type="text/html" id="hisi-theme-tpl">
    <ul class="hisi-themes">
        <?php $_result=session('hisi_admin_themes');if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <li data-theme="<?php echo htmlentities($vo); ?>" class="hisi-theme-item-<?php echo htmlentities($vo); ?>"></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</script>
<script type="text/html" id="hisi-clear-cache-tpl">
    <form class="layui-form" style="padding:10px 0 0 30px;" action="<?php echo url('system/index/clear'); ?>" method="post">
        <div class="layui-form-item">
            <input type="checkbox" name="cache" value="1" title="数据缓存" />
        </div>
        <div class="layui-form-item">
            <input type="checkbox" name="log" value="1" title="日志缓存" />
        </div>
        <div class="layui-form-item">
            <input type="checkbox" name="temp" value="1" title="模板缓存" />
        </div>
        <div class="layui-form-item">
            <button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="formSubmit">执行删除</button>
        </div>
    </form>
</script>
    <div class="layui-body" id="switchBody">
        <ul class="bread-crumbs">
            <?php if(is_array($hisiBreadcrumb) || $hisiBreadcrumb instanceof \think\Collection || $hisiBreadcrumb instanceof \think\Paginator): $i = 0; $__LIST__ = $hisiBreadcrumb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if($key > 0 && $i != count($hisiBreadcrumb)): ?>
                    <li>></li>
                    <li><a href="<?php echo url($v['url'].'?'.$v['param']); ?>"><?php echo htmlentities($v['title']); ?></a></li>
                <?php elseif($i == count($hisiBreadcrumb)): ?>
                    <li>></li>
                    <li><a href="javascript:void(0);"><?php echo htmlentities($v['title']); ?></a></li>
                <?php else: ?>
                    <li><a href="javascript:void(0);"><?php echo htmlentities($v['title']); ?></a></li>
                <?php endif; ?>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <li><a href="<?php echo url('system/menu/quick?id='.$hisiCurMenu['id']); ?>" title="添加到首页快捷菜单" class="j-ajax">[+]</a></li>
        </ul>
        <div style="padding:0 10px;" class="mcolor"><?php echo runhook('system_admin_tips'); ?></div>
            <div class="page-body">
<?php endif; switch($hisiTabType): case "1": ?>
        
        <div class="layui-card">
            <div class="layui-tab layui-tab-brief">
                <ul class="layui-tab-title">
                    <li class="layui-this">
                        <a href="javascript:;" id="curTitle"><?php echo $hisiCurMenu['title']; ?></a>
                    </li>
                </ul>
                <div class="layui-tab-content page-tab-content">
                    <div class="layui-tab-item layui-show">
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
                    </div>
                </div>
            </div>
        </div>
    <?php break; case "2": ?>
        
        <div class="layui-card">
            <div class="layui-tab layui-tab-brief">
                <ul class="layui-tab-title">
                    <?php if(is_array($hisiTabData['menu']) || $hisiTabData['menu'] instanceof \think\Collection || $hisiTabData['menu'] instanceof \think\Paginator): $k = 0; $__LIST__ = $hisiTabData['menu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;if(($k == 1)): ?>
                            <li class="layui-this">
                        <?php else: ?>
                            <li>
                        <?php endif; ?>
                            <a href="javascript:;" class="<?php if((isset($vo['class']))): ?><?php echo htmlentities($vo['class']); ?><?php endif; ?>" id="<?php if((isset($vo['id']))): ?><?php echo htmlentities($vo['id']); ?><?php endif; ?>"><?php echo $vo['title']; ?></a>
                        </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <div class="layui-tab-content page-tab-content">
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
                </div>
            </div>
        </div>
    <?php break; case "3": ?>
        
        <div class="layui-card">
            <div class="layui-tab layui-tab-brief">
                <ul class="layui-tab-title">
                    <?php if(is_array($hisiTabData['menu']) || $hisiTabData['menu'] instanceof \think\Collection || $hisiTabData['menu'] instanceof \think\Paginator): $i = 0; $__LIST__ = $hisiTabData['menu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;
                            $hisiTabData['current'] = isset($hisiTabData['current']) ? $hisiTabData['current'] : '';
                         if(($vo['url'] == $hisiCurMenu['url'] or (url($vo['url']) == $hisiTabData['current']))): ?>
                            <li class="layui-this">
                        <?php else: ?>
                            <li>
                        <?php endif; if((strpos($vo['url'], 'http'))): ?>
                                <a href="<?php echo htmlentities($vo['url']); ?>" target="_blank"><?php echo $vo['title']; ?></a>
                            <?php elseif((strpos($vo['url'], config('sys.admin_path')) !== false)): ?>
                                <a href="<?php echo htmlentities($vo['url']); ?>" id="<?php if((isset($vo['id']))): ?><?php echo htmlentities($vo['id']); ?><?php endif; ?>" class="<?php if((isset($vo['class']))): ?><?php echo htmlentities($vo['class']); ?><?php endif; ?>"><?php echo $vo['title']; ?></a>
                            <?php else: ?>
                                <a href="<?php echo url($vo['url']); ?>" class="<?php if((isset($vo['class']))): ?><?php echo htmlentities($vo['class']); ?><?php endif; ?>" id="<?php if((isset($vo['id']))): ?><?php echo htmlentities($vo['id']); ?><?php endif; ?>"><?php echo $vo['title']; ?></a>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <div class="layui-tab-content page-tab-content">
                    <div class="layui-tab-item layui-show">
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
                    </div>
                </div>
            </div>
        </div>
    <?php break; default: ?>
        
        <div class="page-tab-content">
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
        </div>
<?php endswitch; if(input('param.hisi_iframe') || cookie('hisi_iframe')): ?>
</body>
</html>
<?php else: ?>
        </div>
    </div>
    <div class="layui-footer footer">
        <span class="fl">Powered by <a href="<?php echo config('hisiphp.url'); ?>" target="_blank"><?php echo config('hisiphp.name'); ?></a> v<?php echo config('hisiphp.version'); ?></span>
        <span class="fr"> © 2018-2020 <a href="<?php echo config('hisiphp.url'); ?>" target="_blank"><?php echo config('hisiphp.copyright'); ?></a> All Rights Reserved.</span>
    </div>
</div>
</body>
</html>
<?php endif; ?>