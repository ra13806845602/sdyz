<?php /*a:6:{s:74:"/Applications/MAMP/htdocs/hisiphp/application/stock/view/index/change.html";i:1589554229;s:69:"/Applications/MAMP/htdocs/hisiphp/application/system/view/layout.html";i:1588348082;s:75:"/Applications/MAMP/htdocs/hisiphp/application/system/view/block/header.html";i:1588348082;s:73:"/Applications/MAMP/htdocs/hisiphp/application/system/view/block/menu.html";i:1588348082;s:74:"/Applications/MAMP/htdocs/hisiphp/application/system/view/block/layui.html";i:1588348082;s:75:"/Applications/MAMP/htdocs/hisiphp/application/system/view/block/footer.html";i:1588348082;}*/ ?>
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
                        <form class="layui-form" action="<?php echo url(); ?>" method="post" id="editForm">

    <div class="layui-form-item layui-form-pane" style="position: relative;z-index: 10000;">
        <label class="layui-form-label">数量</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-num" name="num" lay-verify="required" placeholder="请输入数量">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <?php echo token(); ?>
            <input type="hidden" class="field-id" name="id">
        </div>
    </div>
    <div class="pop-bottom-bar">
        <button type="submit" class="layui-btn layui-btn-normal" lay-submit="" lay-filter="formSubmit" hisi-data="{pop: true, refresh: true}">提交保存</button>
        <a href="javascript:parent.layui.layer.closeAll();" class="layui-btn layui-btn-primary ml10">取消</a>
    </div>
</form>
<script src="/static/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo htmlentities($_SERVER['SCRIPT_NAME']); ?>", LAYUI_OFFSET = 60;
    layui.config({
    	base: '/static/system/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script>
    // window.onload = function(){
    //     var oInput = document.getElementById("number");
    //     oInput.focus();
    // }

    layui.use(['upload', 'func'], function () {
        var $ = layui.jquery, layer = layui.layer, upload = layui.upload, func = layui.func, form = layui.form;
        var formSelects = layui.formSelects;
        // 编辑模式下表单自动赋值
        func.assign(<?php echo json_encode($formData); ?>);

        form.on('select(class_select)', function (data) {
            var class_id = data.value;
            $.ajax({
                type: 'POST',
                url: '<?php echo url('getSort'); ?>',
                data: {class_id: class_id},
                dataType: 'json',
                success: function (data) {
                    $("#sort_id").html("<option value=''>请选择下级菜单</option>");
                    $.each(data, function (key, val) {
                        var option1 = $("<option>").val(val.id).text(val.name);
                        $("#sort_id").append(option1);
                        form.render('select');
                    });
                }
            });
        });

        upload.render({
            elem: '.layui-upload-video'
            , url: '<?php echo url("system/annex/upload?water=&thumb=&from=&group="); ?>'
            , method: 'post'
            , before: function (input) {
                layer.msg('文件上传中...', {time: 3000000});
            }, done: function (res, index, upload) {
                console.log(res);
                var obj = this.item;
                if (res.code == 0) {
                    layer.msg(res.msg);
                    return false;
                }
                layer.closeAll();
                $("#video_tip").html(res.data.name + '已上传成功');
                $("input[name='video']").attr('value', res.data.file);
            }
        });


        upload.render({
            elem: '.layui-upload-zip'
            , url: '<?php echo url("system/annex/upload?water=&thumb=&from=&group="); ?>'
            , method: 'post'
            , before: function (input) {
                layer.msg('文件上传中...', {time: 3000000});
            }, done: function (res, index, upload) {
                console.log(res);
                var obj = this.item;
                if (res.code == 0) {
                    layer.msg(res.msg);
                    return false;
                }
                layer.closeAll();
                $("#zip_tip").html(res.data.name + '已上传成功');
                $("input[name='zip']").attr('value', res.data.file);
            }
        });
        /**
         * 附件上传url参数说明
         * @param string $from 来源
         * @param string $group 附件分组,默认sys[系统]，模块格式：m_模块名，插件：p_插件名
         * @param string $water 水印，参数为空默认调用系统配置，no直接关闭水印，image 图片水印，text文字水印
         * @param string $thumb 缩略图，参数为空默认调用系统配置，no直接关闭缩略图，如需生成 500x500 的缩略图，则 500x500多个规格请用";"隔开
         * @param string $thumb_type 缩略图方式
         * @param string $input 文件表单字段名
         */
        upload.render({
            elem: '.layui-upload'
            , url: '<?php echo url("system/annex/upload?water=&thumb=&from=&group="); ?>'
            , method: 'post'
            , before: function (input) {
                layer.msg('文件上传中...', {time: 3000000});
            }, done: function (res, index, upload) {
                var obj = this.item;
                if (res.code == 0) {
                    layer.msg(res.msg);
                    return false;
                }
                layer.closeAll();
                var input = $(obj).parents('.upload').find('.upload-input');
                if ($(obj).attr('lay-type') == 'image') {
                    input.siblings('img').attr('src', res.data.file).show();
                }
                input.val(res.data.file);
            }
        });


        upload.render({
            elem: '#test2'
            , url: '<?php echo url("system/annex/upload?water=&thumb=&from=&group="); ?>'
            , multiple: true
            , before: function (obj) {
                //预读本地文件示例，不支持ie8
                obj.preview(function (index, file, result) {

                });
            }
            , done: function (res) {
                //上传完毕
                $('#pic').append('<div style="display: inline"><a href="' + res.data.file + '" target="_blank">' +
                    '<img src="' + res.data.file + '" class="layui-upload-img" style="width: 50px;height: 50px;"></a>' +
                    '<input type="hidden" name="photo[]" value="' + res.data.file + '">' +
                    '<span class="remove fa fa-times-circle click" data-type="remove"></span></div>');
                console.log(res);
            }
        });


        //事件
        var active = {
            remove: function () {
                console.log($(this).parent());
                $(this).parent().remove();
            },
        };

        $('.layui-form').on('click', '.click', function () {
            console.log(1);
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });
    });
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
                    <form class="layui-form" action="<?php echo url(); ?>" method="post" id="editForm">

    <div class="layui-form-item layui-form-pane" style="position: relative;z-index: 10000;">
        <label class="layui-form-label">数量</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-num" name="num" lay-verify="required" placeholder="请输入数量">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <?php echo token(); ?>
            <input type="hidden" class="field-id" name="id">
        </div>
    </div>
    <div class="pop-bottom-bar">
        <button type="submit" class="layui-btn layui-btn-normal" lay-submit="" lay-filter="formSubmit" hisi-data="{pop: true, refresh: true}">提交保存</button>
        <a href="javascript:parent.layui.layer.closeAll();" class="layui-btn layui-btn-primary ml10">取消</a>
    </div>
</form>
<script src="/static/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo htmlentities($_SERVER['SCRIPT_NAME']); ?>", LAYUI_OFFSET = 60;
    layui.config({
    	base: '/static/system/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script>
    // window.onload = function(){
    //     var oInput = document.getElementById("number");
    //     oInput.focus();
    // }

    layui.use(['upload', 'func'], function () {
        var $ = layui.jquery, layer = layui.layer, upload = layui.upload, func = layui.func, form = layui.form;
        var formSelects = layui.formSelects;
        // 编辑模式下表单自动赋值
        func.assign(<?php echo json_encode($formData); ?>);

        form.on('select(class_select)', function (data) {
            var class_id = data.value;
            $.ajax({
                type: 'POST',
                url: '<?php echo url('getSort'); ?>',
                data: {class_id: class_id},
                dataType: 'json',
                success: function (data) {
                    $("#sort_id").html("<option value=''>请选择下级菜单</option>");
                    $.each(data, function (key, val) {
                        var option1 = $("<option>").val(val.id).text(val.name);
                        $("#sort_id").append(option1);
                        form.render('select');
                    });
                }
            });
        });

        upload.render({
            elem: '.layui-upload-video'
            , url: '<?php echo url("system/annex/upload?water=&thumb=&from=&group="); ?>'
            , method: 'post'
            , before: function (input) {
                layer.msg('文件上传中...', {time: 3000000});
            }, done: function (res, index, upload) {
                console.log(res);
                var obj = this.item;
                if (res.code == 0) {
                    layer.msg(res.msg);
                    return false;
                }
                layer.closeAll();
                $("#video_tip").html(res.data.name + '已上传成功');
                $("input[name='video']").attr('value', res.data.file);
            }
        });


        upload.render({
            elem: '.layui-upload-zip'
            , url: '<?php echo url("system/annex/upload?water=&thumb=&from=&group="); ?>'
            , method: 'post'
            , before: function (input) {
                layer.msg('文件上传中...', {time: 3000000});
            }, done: function (res, index, upload) {
                console.log(res);
                var obj = this.item;
                if (res.code == 0) {
                    layer.msg(res.msg);
                    return false;
                }
                layer.closeAll();
                $("#zip_tip").html(res.data.name + '已上传成功');
                $("input[name='zip']").attr('value', res.data.file);
            }
        });
        /**
         * 附件上传url参数说明
         * @param string $from 来源
         * @param string $group 附件分组,默认sys[系统]，模块格式：m_模块名，插件：p_插件名
         * @param string $water 水印，参数为空默认调用系统配置，no直接关闭水印，image 图片水印，text文字水印
         * @param string $thumb 缩略图，参数为空默认调用系统配置，no直接关闭缩略图，如需生成 500x500 的缩略图，则 500x500多个规格请用";"隔开
         * @param string $thumb_type 缩略图方式
         * @param string $input 文件表单字段名
         */
        upload.render({
            elem: '.layui-upload'
            , url: '<?php echo url("system/annex/upload?water=&thumb=&from=&group="); ?>'
            , method: 'post'
            , before: function (input) {
                layer.msg('文件上传中...', {time: 3000000});
            }, done: function (res, index, upload) {
                var obj = this.item;
                if (res.code == 0) {
                    layer.msg(res.msg);
                    return false;
                }
                layer.closeAll();
                var input = $(obj).parents('.upload').find('.upload-input');
                if ($(obj).attr('lay-type') == 'image') {
                    input.siblings('img').attr('src', res.data.file).show();
                }
                input.val(res.data.file);
            }
        });


        upload.render({
            elem: '#test2'
            , url: '<?php echo url("system/annex/upload?water=&thumb=&from=&group="); ?>'
            , multiple: true
            , before: function (obj) {
                //预读本地文件示例，不支持ie8
                obj.preview(function (index, file, result) {

                });
            }
            , done: function (res) {
                //上传完毕
                $('#pic').append('<div style="display: inline"><a href="' + res.data.file + '" target="_blank">' +
                    '<img src="' + res.data.file + '" class="layui-upload-img" style="width: 50px;height: 50px;"></a>' +
                    '<input type="hidden" name="photo[]" value="' + res.data.file + '">' +
                    '<span class="remove fa fa-times-circle click" data-type="remove"></span></div>');
                console.log(res);
            }
        });


        //事件
        var active = {
            remove: function () {
                console.log($(this).parent());
                $(this).parent().remove();
            },
        };

        $('.layui-form').on('click', '.click', function () {
            console.log(1);
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });
    });
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
                        <form class="layui-form" action="<?php echo url(); ?>" method="post" id="editForm">

    <div class="layui-form-item layui-form-pane" style="position: relative;z-index: 10000;">
        <label class="layui-form-label">数量</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-num" name="num" lay-verify="required" placeholder="请输入数量">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <?php echo token(); ?>
            <input type="hidden" class="field-id" name="id">
        </div>
    </div>
    <div class="pop-bottom-bar">
        <button type="submit" class="layui-btn layui-btn-normal" lay-submit="" lay-filter="formSubmit" hisi-data="{pop: true, refresh: true}">提交保存</button>
        <a href="javascript:parent.layui.layer.closeAll();" class="layui-btn layui-btn-primary ml10">取消</a>
    </div>
</form>
<script src="/static/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo htmlentities($_SERVER['SCRIPT_NAME']); ?>", LAYUI_OFFSET = 60;
    layui.config({
    	base: '/static/system/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script>
    // window.onload = function(){
    //     var oInput = document.getElementById("number");
    //     oInput.focus();
    // }

    layui.use(['upload', 'func'], function () {
        var $ = layui.jquery, layer = layui.layer, upload = layui.upload, func = layui.func, form = layui.form;
        var formSelects = layui.formSelects;
        // 编辑模式下表单自动赋值
        func.assign(<?php echo json_encode($formData); ?>);

        form.on('select(class_select)', function (data) {
            var class_id = data.value;
            $.ajax({
                type: 'POST',
                url: '<?php echo url('getSort'); ?>',
                data: {class_id: class_id},
                dataType: 'json',
                success: function (data) {
                    $("#sort_id").html("<option value=''>请选择下级菜单</option>");
                    $.each(data, function (key, val) {
                        var option1 = $("<option>").val(val.id).text(val.name);
                        $("#sort_id").append(option1);
                        form.render('select');
                    });
                }
            });
        });

        upload.render({
            elem: '.layui-upload-video'
            , url: '<?php echo url("system/annex/upload?water=&thumb=&from=&group="); ?>'
            , method: 'post'
            , before: function (input) {
                layer.msg('文件上传中...', {time: 3000000});
            }, done: function (res, index, upload) {
                console.log(res);
                var obj = this.item;
                if (res.code == 0) {
                    layer.msg(res.msg);
                    return false;
                }
                layer.closeAll();
                $("#video_tip").html(res.data.name + '已上传成功');
                $("input[name='video']").attr('value', res.data.file);
            }
        });


        upload.render({
            elem: '.layui-upload-zip'
            , url: '<?php echo url("system/annex/upload?water=&thumb=&from=&group="); ?>'
            , method: 'post'
            , before: function (input) {
                layer.msg('文件上传中...', {time: 3000000});
            }, done: function (res, index, upload) {
                console.log(res);
                var obj = this.item;
                if (res.code == 0) {
                    layer.msg(res.msg);
                    return false;
                }
                layer.closeAll();
                $("#zip_tip").html(res.data.name + '已上传成功');
                $("input[name='zip']").attr('value', res.data.file);
            }
        });
        /**
         * 附件上传url参数说明
         * @param string $from 来源
         * @param string $group 附件分组,默认sys[系统]，模块格式：m_模块名，插件：p_插件名
         * @param string $water 水印，参数为空默认调用系统配置，no直接关闭水印，image 图片水印，text文字水印
         * @param string $thumb 缩略图，参数为空默认调用系统配置，no直接关闭缩略图，如需生成 500x500 的缩略图，则 500x500多个规格请用";"隔开
         * @param string $thumb_type 缩略图方式
         * @param string $input 文件表单字段名
         */
        upload.render({
            elem: '.layui-upload'
            , url: '<?php echo url("system/annex/upload?water=&thumb=&from=&group="); ?>'
            , method: 'post'
            , before: function (input) {
                layer.msg('文件上传中...', {time: 3000000});
            }, done: function (res, index, upload) {
                var obj = this.item;
                if (res.code == 0) {
                    layer.msg(res.msg);
                    return false;
                }
                layer.closeAll();
                var input = $(obj).parents('.upload').find('.upload-input');
                if ($(obj).attr('lay-type') == 'image') {
                    input.siblings('img').attr('src', res.data.file).show();
                }
                input.val(res.data.file);
            }
        });


        upload.render({
            elem: '#test2'
            , url: '<?php echo url("system/annex/upload?water=&thumb=&from=&group="); ?>'
            , multiple: true
            , before: function (obj) {
                //预读本地文件示例，不支持ie8
                obj.preview(function (index, file, result) {

                });
            }
            , done: function (res) {
                //上传完毕
                $('#pic').append('<div style="display: inline"><a href="' + res.data.file + '" target="_blank">' +
                    '<img src="' + res.data.file + '" class="layui-upload-img" style="width: 50px;height: 50px;"></a>' +
                    '<input type="hidden" name="photo[]" value="' + res.data.file + '">' +
                    '<span class="remove fa fa-times-circle click" data-type="remove"></span></div>');
                console.log(res);
            }
        });


        //事件
        var active = {
            remove: function () {
                console.log($(this).parent());
                $(this).parent().remove();
            },
        };

        $('.layui-form').on('click', '.click', function () {
            console.log(1);
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });
    });
</script>

                    </div>
                </div>
            </div>
        </div>
    <?php break; default: ?>
        
        <div class="page-tab-content">
            <form class="layui-form" action="<?php echo url(); ?>" method="post" id="editForm">

    <div class="layui-form-item layui-form-pane" style="position: relative;z-index: 10000;">
        <label class="layui-form-label">数量</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-num" name="num" lay-verify="required" placeholder="请输入数量">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <?php echo token(); ?>
            <input type="hidden" class="field-id" name="id">
        </div>
    </div>
    <div class="pop-bottom-bar">
        <button type="submit" class="layui-btn layui-btn-normal" lay-submit="" lay-filter="formSubmit" hisi-data="{pop: true, refresh: true}">提交保存</button>
        <a href="javascript:parent.layui.layer.closeAll();" class="layui-btn layui-btn-primary ml10">取消</a>
    </div>
</form>
<script src="/static/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo htmlentities($_SERVER['SCRIPT_NAME']); ?>", LAYUI_OFFSET = 60;
    layui.config({
    	base: '/static/system/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script>
    // window.onload = function(){
    //     var oInput = document.getElementById("number");
    //     oInput.focus();
    // }

    layui.use(['upload', 'func'], function () {
        var $ = layui.jquery, layer = layui.layer, upload = layui.upload, func = layui.func, form = layui.form;
        var formSelects = layui.formSelects;
        // 编辑模式下表单自动赋值
        func.assign(<?php echo json_encode($formData); ?>);

        form.on('select(class_select)', function (data) {
            var class_id = data.value;
            $.ajax({
                type: 'POST',
                url: '<?php echo url('getSort'); ?>',
                data: {class_id: class_id},
                dataType: 'json',
                success: function (data) {
                    $("#sort_id").html("<option value=''>请选择下级菜单</option>");
                    $.each(data, function (key, val) {
                        var option1 = $("<option>").val(val.id).text(val.name);
                        $("#sort_id").append(option1);
                        form.render('select');
                    });
                }
            });
        });

        upload.render({
            elem: '.layui-upload-video'
            , url: '<?php echo url("system/annex/upload?water=&thumb=&from=&group="); ?>'
            , method: 'post'
            , before: function (input) {
                layer.msg('文件上传中...', {time: 3000000});
            }, done: function (res, index, upload) {
                console.log(res);
                var obj = this.item;
                if (res.code == 0) {
                    layer.msg(res.msg);
                    return false;
                }
                layer.closeAll();
                $("#video_tip").html(res.data.name + '已上传成功');
                $("input[name='video']").attr('value', res.data.file);
            }
        });


        upload.render({
            elem: '.layui-upload-zip'
            , url: '<?php echo url("system/annex/upload?water=&thumb=&from=&group="); ?>'
            , method: 'post'
            , before: function (input) {
                layer.msg('文件上传中...', {time: 3000000});
            }, done: function (res, index, upload) {
                console.log(res);
                var obj = this.item;
                if (res.code == 0) {
                    layer.msg(res.msg);
                    return false;
                }
                layer.closeAll();
                $("#zip_tip").html(res.data.name + '已上传成功');
                $("input[name='zip']").attr('value', res.data.file);
            }
        });
        /**
         * 附件上传url参数说明
         * @param string $from 来源
         * @param string $group 附件分组,默认sys[系统]，模块格式：m_模块名，插件：p_插件名
         * @param string $water 水印，参数为空默认调用系统配置，no直接关闭水印，image 图片水印，text文字水印
         * @param string $thumb 缩略图，参数为空默认调用系统配置，no直接关闭缩略图，如需生成 500x500 的缩略图，则 500x500多个规格请用";"隔开
         * @param string $thumb_type 缩略图方式
         * @param string $input 文件表单字段名
         */
        upload.render({
            elem: '.layui-upload'
            , url: '<?php echo url("system/annex/upload?water=&thumb=&from=&group="); ?>'
            , method: 'post'
            , before: function (input) {
                layer.msg('文件上传中...', {time: 3000000});
            }, done: function (res, index, upload) {
                var obj = this.item;
                if (res.code == 0) {
                    layer.msg(res.msg);
                    return false;
                }
                layer.closeAll();
                var input = $(obj).parents('.upload').find('.upload-input');
                if ($(obj).attr('lay-type') == 'image') {
                    input.siblings('img').attr('src', res.data.file).show();
                }
                input.val(res.data.file);
            }
        });


        upload.render({
            elem: '#test2'
            , url: '<?php echo url("system/annex/upload?water=&thumb=&from=&group="); ?>'
            , multiple: true
            , before: function (obj) {
                //预读本地文件示例，不支持ie8
                obj.preview(function (index, file, result) {

                });
            }
            , done: function (res) {
                //上传完毕
                $('#pic').append('<div style="display: inline"><a href="' + res.data.file + '" target="_blank">' +
                    '<img src="' + res.data.file + '" class="layui-upload-img" style="width: 50px;height: 50px;"></a>' +
                    '<input type="hidden" name="photo[]" value="' + res.data.file + '">' +
                    '<span class="remove fa fa-times-circle click" data-type="remove"></span></div>');
                console.log(res);
            }
        });


        //事件
        var active = {
            remove: function () {
                console.log($(this).parent());
                $(this).parent().remove();
            },
        };

        $('.layui-form').on('click', '.click', function () {
            console.log(1);
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });
    });
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