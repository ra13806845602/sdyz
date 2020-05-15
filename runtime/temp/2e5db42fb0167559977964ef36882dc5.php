<?php /*a:6:{s:79:"E:\phpStudy\PHPTutorial\WWW\hisiphp\application\system\view\plugins\design.html";i:1588348082;s:71:"E:\phpStudy\PHPTutorial\WWW\hisiphp\application\system\view\layout.html";i:1588348082;s:77:"E:\phpStudy\PHPTutorial\WWW\hisiphp\application\system\view\block\header.html";i:1588348082;s:75:"E:\phpStudy\PHPTutorial\WWW\hisiphp\application\system\view\block\menu.html";i:1588348082;s:76:"E:\phpStudy\PHPTutorial\WWW\hisiphp\application\system\view\block\layui.html";i:1588348082;s:77:"E:\phpStudy\PHPTutorial\WWW\hisiphp\application\system\view\block\footer.html";i:1588348082;}*/ ?>
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
                        <form class="layui-form" action="<?php echo url(); ?>" method="post">
<div class="layui-tab-item layui-show">
        <div class="layui-form-item">
            <label class="layui-form-label">插件名</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input" name="name" lay-verify="required" autocomplete="off" placeholder="请输入插件名">
            </div>
            <div class="layui-form-mid layui-word-aux">插件名称只能为字母</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">插件标题</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input" name="title" lay-verify="required" autocomplete="off" placeholder="请输入插件标题">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">插件标识</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input" name="identifier" lay-verify="required" autocomplete="off" placeholder="请输入插件标识">
            </div>
            <div class="layui-form-mid layui-word-aux">格式：插件名(只能为字母).开发者标识.plugins</div>
        </div>
<!--         <div class="layui-form-item">
            <label class="layui-form-label">插件图标</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" id="input-icon" name="icon" lay-verify="" autocomplete="off" placeholder="可自定义或使用系统图标">
            </div>
            <i class="" id="form-icon-preview"></i>
            <a href="<?php echo url('publics/icon?input=input-icon&show=form-icon-preview'); ?>" class="layui-btn layui-btn-primary j-iframe-pop fl">选择图标</a>
        </div> -->
        <div class="layui-form-item">
            <label class="layui-form-label">插件描述</label>
            <div class="layui-input-inline w300">
                <textarea  class="layui-textarea" name="intro" lay-verify="" autocomplete="off" placeholder="请填写插件描述"></textarea>
            </div>
            <div class="layui-form-mid layui-word-aux"></div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">开发者</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input" name="author" lay-verify="" autocomplete="off" placeholder="请输入开发者">
            </div>
            <div class="layui-form-mid layui-word-aux">建议填写</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">开发者网址</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input" name="url" lay-verify="" autocomplete="off" placeholder="请输入开发者网址">
            </div>
            <div class="layui-form-mid layui-word-aux">建议填写</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">版本号</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input" name="version" value="1.0.0" lay-verify="required" autocomplete="off" placeholder="请输入版本号">
            </div>
            <div class="layui-form-mid layui-word-aux">版本号格式采用三段式：主版本号.次版本号.修订版本号</div>
        </div>
        <fieldset class="layui-elem-field layui-field-title">
          <legend>快速生成插件目录结构</legend>
        </fieldset>
        <div class="layui-form-item">
            <label class="layui-form-label">插件目录</label>
            <div class="layui-input-inline w300">
                <textarea rows="8"  class="layui-textarea" name="dir" lay-verify="" autocomplete="off">admin
home
model
sql
validate
view
</textarea>
            </div>
            <div class="layui-form-mid layui-word-aux">[可选]admin(后台模块)<br>[可选]home(前台模块)<br>[可选]model(模型层)<br>[可选]sql(数据库文件)<br>[可选]vaidate(验证规则)<br>[可选]view(视图)<br><span class="red">如果您的插件需要分前后台，我们建议您以独立模块方式来扩展</span></div>
        </div>
</div>
<div class="layui-tab-item">
    <div class="layui-form-item layui-form">
        <table class="layui-table" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th>排序</th>
                    <th>配置名称[必填]</th>
                    <th>配置变量名[必填]</th>
                    <th>配置类型[必填]</th>
                    <th>配置选项[选填]</th>
                    <th>默认值[选填]</th>
                    <th>配置提示[选填]</th>
                    <th width="50">操作</th>
                </tr> 
            </thead>
            <tbody>
<!--                 <tr class="config-tr">
                    <td><input type="text" name="config[100][sort]" class="layui-input w50" value="100"></td>
                    <td><input type="text" name="config[100][title]" class="layui-input" lay-verify="required"></td>
                    <td><input type="text" name="config[100][name]" class="layui-input" lay-verify="required"></td>
                    <td>
                        <select name="config[100][type]" class="field-type" type="select">
                        <?php $_result=form_type();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo htmlentities($key); ?>">[<?php echo htmlentities($key); ?>]<?php echo htmlentities($v); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                    <td><textarea name="config[100][options]" class="layui-textarea" style="min-height:20px;padding:0;" placeholder="选项值:选项名"></textarea></td>
                    <td><input type="text" name="config[100][value]" class="layui-input"></td>
                    <td><input type="text" name="config[100][tips]" class="layui-input"></td>
                    <td><a href="javascript:;" class="config-tr-del">删除</a></td>
                </tr> -->
                <tr>
                    <td colspan="8" style="background-color:#f8f8f8">
                        <a class="layui-btn layui-btn-sm layui-btn-normal" id="addConfig">添加配置</a>
                        <span class="layui-word-aux">提示：当配置类型为单选按钮、多选框、下拉框、开关的时候，配置选项为必填，参考格式：选项值:选项名，多个选项请换行。</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn layui-btn-normal" lay-submit="" lay-filter="formSubmit">提交</button>
        <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
    </div>
</div>
</form>
<script type="text/html" id="configTr">
    <tr class="config-tr">
        <td><input type="text" name="config[{i}][sort]" class="layui-input w50" value="{i}"></td>
        <td><input type="text" name="config[{i}][title]" class="layui-input" lay-verify="required"></td>
        <td><input type="text" name="config[{i}][name]" class="layui-input" lay-verify="required"></td>
        <td>
            <select name="config[{i}][type]" class="field-type" type="select">
            <?php $_result=form_type();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo htmlentities($key); ?>">[<?php echo htmlentities($key); ?>]<?php echo htmlentities($v); ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </td>
        <td><textarea name="config[{i}][options]" class="layui-textarea" style="min-height:20px;padding:0;" placeholder="选项值:选项名"></textarea></td>
        <td><input type="text" name="config[{i}][value]" class="layui-input"></td>
        <td><input type="text" name="config[{i}][tips]" class="layui-input"></td>
        <td><a href="javascript:;" class="config-tr-del">删除</a></td>
    </tr>
</script>
<script src="/static/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo htmlentities($_SERVER['SCRIPT_NAME']); ?>", LAYUI_OFFSET = 60;
    layui.config({
    	base: '/static/system/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script type="text/javascript">
    layui.use(['jquery', 'form'], function(){
        var $ = layui.jquery, form = layui.form;
        $('#addConfig').click(function(){
            var that = $(this), tpl = $('#configTr').html(), len = $('.config-tr').length;
            that.parents('tr').before(tpl.replace(/{i}/g, len+100));
            form.render();
        });

        $(document).on('click', '.config-tr-del', function(){
            $(this).parents('.config-tr').remove();
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
                    <form class="layui-form" action="<?php echo url(); ?>" method="post">
<div class="layui-tab-item layui-show">
        <div class="layui-form-item">
            <label class="layui-form-label">插件名</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input" name="name" lay-verify="required" autocomplete="off" placeholder="请输入插件名">
            </div>
            <div class="layui-form-mid layui-word-aux">插件名称只能为字母</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">插件标题</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input" name="title" lay-verify="required" autocomplete="off" placeholder="请输入插件标题">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">插件标识</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input" name="identifier" lay-verify="required" autocomplete="off" placeholder="请输入插件标识">
            </div>
            <div class="layui-form-mid layui-word-aux">格式：插件名(只能为字母).开发者标识.plugins</div>
        </div>
<!--         <div class="layui-form-item">
            <label class="layui-form-label">插件图标</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" id="input-icon" name="icon" lay-verify="" autocomplete="off" placeholder="可自定义或使用系统图标">
            </div>
            <i class="" id="form-icon-preview"></i>
            <a href="<?php echo url('publics/icon?input=input-icon&show=form-icon-preview'); ?>" class="layui-btn layui-btn-primary j-iframe-pop fl">选择图标</a>
        </div> -->
        <div class="layui-form-item">
            <label class="layui-form-label">插件描述</label>
            <div class="layui-input-inline w300">
                <textarea  class="layui-textarea" name="intro" lay-verify="" autocomplete="off" placeholder="请填写插件描述"></textarea>
            </div>
            <div class="layui-form-mid layui-word-aux"></div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">开发者</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input" name="author" lay-verify="" autocomplete="off" placeholder="请输入开发者">
            </div>
            <div class="layui-form-mid layui-word-aux">建议填写</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">开发者网址</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input" name="url" lay-verify="" autocomplete="off" placeholder="请输入开发者网址">
            </div>
            <div class="layui-form-mid layui-word-aux">建议填写</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">版本号</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input" name="version" value="1.0.0" lay-verify="required" autocomplete="off" placeholder="请输入版本号">
            </div>
            <div class="layui-form-mid layui-word-aux">版本号格式采用三段式：主版本号.次版本号.修订版本号</div>
        </div>
        <fieldset class="layui-elem-field layui-field-title">
          <legend>快速生成插件目录结构</legend>
        </fieldset>
        <div class="layui-form-item">
            <label class="layui-form-label">插件目录</label>
            <div class="layui-input-inline w300">
                <textarea rows="8"  class="layui-textarea" name="dir" lay-verify="" autocomplete="off">admin
home
model
sql
validate
view
</textarea>
            </div>
            <div class="layui-form-mid layui-word-aux">[可选]admin(后台模块)<br>[可选]home(前台模块)<br>[可选]model(模型层)<br>[可选]sql(数据库文件)<br>[可选]vaidate(验证规则)<br>[可选]view(视图)<br><span class="red">如果您的插件需要分前后台，我们建议您以独立模块方式来扩展</span></div>
        </div>
</div>
<div class="layui-tab-item">
    <div class="layui-form-item layui-form">
        <table class="layui-table" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th>排序</th>
                    <th>配置名称[必填]</th>
                    <th>配置变量名[必填]</th>
                    <th>配置类型[必填]</th>
                    <th>配置选项[选填]</th>
                    <th>默认值[选填]</th>
                    <th>配置提示[选填]</th>
                    <th width="50">操作</th>
                </tr> 
            </thead>
            <tbody>
<!--                 <tr class="config-tr">
                    <td><input type="text" name="config[100][sort]" class="layui-input w50" value="100"></td>
                    <td><input type="text" name="config[100][title]" class="layui-input" lay-verify="required"></td>
                    <td><input type="text" name="config[100][name]" class="layui-input" lay-verify="required"></td>
                    <td>
                        <select name="config[100][type]" class="field-type" type="select">
                        <?php $_result=form_type();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo htmlentities($key); ?>">[<?php echo htmlentities($key); ?>]<?php echo htmlentities($v); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                    <td><textarea name="config[100][options]" class="layui-textarea" style="min-height:20px;padding:0;" placeholder="选项值:选项名"></textarea></td>
                    <td><input type="text" name="config[100][value]" class="layui-input"></td>
                    <td><input type="text" name="config[100][tips]" class="layui-input"></td>
                    <td><a href="javascript:;" class="config-tr-del">删除</a></td>
                </tr> -->
                <tr>
                    <td colspan="8" style="background-color:#f8f8f8">
                        <a class="layui-btn layui-btn-sm layui-btn-normal" id="addConfig">添加配置</a>
                        <span class="layui-word-aux">提示：当配置类型为单选按钮、多选框、下拉框、开关的时候，配置选项为必填，参考格式：选项值:选项名，多个选项请换行。</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn layui-btn-normal" lay-submit="" lay-filter="formSubmit">提交</button>
        <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
    </div>
</div>
</form>
<script type="text/html" id="configTr">
    <tr class="config-tr">
        <td><input type="text" name="config[{i}][sort]" class="layui-input w50" value="{i}"></td>
        <td><input type="text" name="config[{i}][title]" class="layui-input" lay-verify="required"></td>
        <td><input type="text" name="config[{i}][name]" class="layui-input" lay-verify="required"></td>
        <td>
            <select name="config[{i}][type]" class="field-type" type="select">
            <?php $_result=form_type();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo htmlentities($key); ?>">[<?php echo htmlentities($key); ?>]<?php echo htmlentities($v); ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </td>
        <td><textarea name="config[{i}][options]" class="layui-textarea" style="min-height:20px;padding:0;" placeholder="选项值:选项名"></textarea></td>
        <td><input type="text" name="config[{i}][value]" class="layui-input"></td>
        <td><input type="text" name="config[{i}][tips]" class="layui-input"></td>
        <td><a href="javascript:;" class="config-tr-del">删除</a></td>
    </tr>
</script>
<script src="/static/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo htmlentities($_SERVER['SCRIPT_NAME']); ?>", LAYUI_OFFSET = 60;
    layui.config({
    	base: '/static/system/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script type="text/javascript">
    layui.use(['jquery', 'form'], function(){
        var $ = layui.jquery, form = layui.form;
        $('#addConfig').click(function(){
            var that = $(this), tpl = $('#configTr').html(), len = $('.config-tr').length;
            that.parents('tr').before(tpl.replace(/{i}/g, len+100));
            form.render();
        });

        $(document).on('click', '.config-tr-del', function(){
            $(this).parents('.config-tr').remove();
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
                        <form class="layui-form" action="<?php echo url(); ?>" method="post">
<div class="layui-tab-item layui-show">
        <div class="layui-form-item">
            <label class="layui-form-label">插件名</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input" name="name" lay-verify="required" autocomplete="off" placeholder="请输入插件名">
            </div>
            <div class="layui-form-mid layui-word-aux">插件名称只能为字母</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">插件标题</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input" name="title" lay-verify="required" autocomplete="off" placeholder="请输入插件标题">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">插件标识</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input" name="identifier" lay-verify="required" autocomplete="off" placeholder="请输入插件标识">
            </div>
            <div class="layui-form-mid layui-word-aux">格式：插件名(只能为字母).开发者标识.plugins</div>
        </div>
<!--         <div class="layui-form-item">
            <label class="layui-form-label">插件图标</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" id="input-icon" name="icon" lay-verify="" autocomplete="off" placeholder="可自定义或使用系统图标">
            </div>
            <i class="" id="form-icon-preview"></i>
            <a href="<?php echo url('publics/icon?input=input-icon&show=form-icon-preview'); ?>" class="layui-btn layui-btn-primary j-iframe-pop fl">选择图标</a>
        </div> -->
        <div class="layui-form-item">
            <label class="layui-form-label">插件描述</label>
            <div class="layui-input-inline w300">
                <textarea  class="layui-textarea" name="intro" lay-verify="" autocomplete="off" placeholder="请填写插件描述"></textarea>
            </div>
            <div class="layui-form-mid layui-word-aux"></div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">开发者</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input" name="author" lay-verify="" autocomplete="off" placeholder="请输入开发者">
            </div>
            <div class="layui-form-mid layui-word-aux">建议填写</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">开发者网址</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input" name="url" lay-verify="" autocomplete="off" placeholder="请输入开发者网址">
            </div>
            <div class="layui-form-mid layui-word-aux">建议填写</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">版本号</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input" name="version" value="1.0.0" lay-verify="required" autocomplete="off" placeholder="请输入版本号">
            </div>
            <div class="layui-form-mid layui-word-aux">版本号格式采用三段式：主版本号.次版本号.修订版本号</div>
        </div>
        <fieldset class="layui-elem-field layui-field-title">
          <legend>快速生成插件目录结构</legend>
        </fieldset>
        <div class="layui-form-item">
            <label class="layui-form-label">插件目录</label>
            <div class="layui-input-inline w300">
                <textarea rows="8"  class="layui-textarea" name="dir" lay-verify="" autocomplete="off">admin
home
model
sql
validate
view
</textarea>
            </div>
            <div class="layui-form-mid layui-word-aux">[可选]admin(后台模块)<br>[可选]home(前台模块)<br>[可选]model(模型层)<br>[可选]sql(数据库文件)<br>[可选]vaidate(验证规则)<br>[可选]view(视图)<br><span class="red">如果您的插件需要分前后台，我们建议您以独立模块方式来扩展</span></div>
        </div>
</div>
<div class="layui-tab-item">
    <div class="layui-form-item layui-form">
        <table class="layui-table" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th>排序</th>
                    <th>配置名称[必填]</th>
                    <th>配置变量名[必填]</th>
                    <th>配置类型[必填]</th>
                    <th>配置选项[选填]</th>
                    <th>默认值[选填]</th>
                    <th>配置提示[选填]</th>
                    <th width="50">操作</th>
                </tr> 
            </thead>
            <tbody>
<!--                 <tr class="config-tr">
                    <td><input type="text" name="config[100][sort]" class="layui-input w50" value="100"></td>
                    <td><input type="text" name="config[100][title]" class="layui-input" lay-verify="required"></td>
                    <td><input type="text" name="config[100][name]" class="layui-input" lay-verify="required"></td>
                    <td>
                        <select name="config[100][type]" class="field-type" type="select">
                        <?php $_result=form_type();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo htmlentities($key); ?>">[<?php echo htmlentities($key); ?>]<?php echo htmlentities($v); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                    <td><textarea name="config[100][options]" class="layui-textarea" style="min-height:20px;padding:0;" placeholder="选项值:选项名"></textarea></td>
                    <td><input type="text" name="config[100][value]" class="layui-input"></td>
                    <td><input type="text" name="config[100][tips]" class="layui-input"></td>
                    <td><a href="javascript:;" class="config-tr-del">删除</a></td>
                </tr> -->
                <tr>
                    <td colspan="8" style="background-color:#f8f8f8">
                        <a class="layui-btn layui-btn-sm layui-btn-normal" id="addConfig">添加配置</a>
                        <span class="layui-word-aux">提示：当配置类型为单选按钮、多选框、下拉框、开关的时候，配置选项为必填，参考格式：选项值:选项名，多个选项请换行。</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn layui-btn-normal" lay-submit="" lay-filter="formSubmit">提交</button>
        <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
    </div>
</div>
</form>
<script type="text/html" id="configTr">
    <tr class="config-tr">
        <td><input type="text" name="config[{i}][sort]" class="layui-input w50" value="{i}"></td>
        <td><input type="text" name="config[{i}][title]" class="layui-input" lay-verify="required"></td>
        <td><input type="text" name="config[{i}][name]" class="layui-input" lay-verify="required"></td>
        <td>
            <select name="config[{i}][type]" class="field-type" type="select">
            <?php $_result=form_type();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo htmlentities($key); ?>">[<?php echo htmlentities($key); ?>]<?php echo htmlentities($v); ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </td>
        <td><textarea name="config[{i}][options]" class="layui-textarea" style="min-height:20px;padding:0;" placeholder="选项值:选项名"></textarea></td>
        <td><input type="text" name="config[{i}][value]" class="layui-input"></td>
        <td><input type="text" name="config[{i}][tips]" class="layui-input"></td>
        <td><a href="javascript:;" class="config-tr-del">删除</a></td>
    </tr>
</script>
<script src="/static/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo htmlentities($_SERVER['SCRIPT_NAME']); ?>", LAYUI_OFFSET = 60;
    layui.config({
    	base: '/static/system/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script type="text/javascript">
    layui.use(['jquery', 'form'], function(){
        var $ = layui.jquery, form = layui.form;
        $('#addConfig').click(function(){
            var that = $(this), tpl = $('#configTr').html(), len = $('.config-tr').length;
            that.parents('tr').before(tpl.replace(/{i}/g, len+100));
            form.render();
        });

        $(document).on('click', '.config-tr-del', function(){
            $(this).parents('.config-tr').remove();
        });
    });
</script>
                    </div>
                </div>
            </div>
        </div>
    <?php break; default: ?>
        
        <div class="page-tab-content">
            <form class="layui-form" action="<?php echo url(); ?>" method="post">
<div class="layui-tab-item layui-show">
        <div class="layui-form-item">
            <label class="layui-form-label">插件名</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input" name="name" lay-verify="required" autocomplete="off" placeholder="请输入插件名">
            </div>
            <div class="layui-form-mid layui-word-aux">插件名称只能为字母</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">插件标题</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input" name="title" lay-verify="required" autocomplete="off" placeholder="请输入插件标题">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">插件标识</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input" name="identifier" lay-verify="required" autocomplete="off" placeholder="请输入插件标识">
            </div>
            <div class="layui-form-mid layui-word-aux">格式：插件名(只能为字母).开发者标识.plugins</div>
        </div>
<!--         <div class="layui-form-item">
            <label class="layui-form-label">插件图标</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" id="input-icon" name="icon" lay-verify="" autocomplete="off" placeholder="可自定义或使用系统图标">
            </div>
            <i class="" id="form-icon-preview"></i>
            <a href="<?php echo url('publics/icon?input=input-icon&show=form-icon-preview'); ?>" class="layui-btn layui-btn-primary j-iframe-pop fl">选择图标</a>
        </div> -->
        <div class="layui-form-item">
            <label class="layui-form-label">插件描述</label>
            <div class="layui-input-inline w300">
                <textarea  class="layui-textarea" name="intro" lay-verify="" autocomplete="off" placeholder="请填写插件描述"></textarea>
            </div>
            <div class="layui-form-mid layui-word-aux"></div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">开发者</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input" name="author" lay-verify="" autocomplete="off" placeholder="请输入开发者">
            </div>
            <div class="layui-form-mid layui-word-aux">建议填写</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">开发者网址</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input" name="url" lay-verify="" autocomplete="off" placeholder="请输入开发者网址">
            </div>
            <div class="layui-form-mid layui-word-aux">建议填写</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">版本号</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input" name="version" value="1.0.0" lay-verify="required" autocomplete="off" placeholder="请输入版本号">
            </div>
            <div class="layui-form-mid layui-word-aux">版本号格式采用三段式：主版本号.次版本号.修订版本号</div>
        </div>
        <fieldset class="layui-elem-field layui-field-title">
          <legend>快速生成插件目录结构</legend>
        </fieldset>
        <div class="layui-form-item">
            <label class="layui-form-label">插件目录</label>
            <div class="layui-input-inline w300">
                <textarea rows="8"  class="layui-textarea" name="dir" lay-verify="" autocomplete="off">admin
home
model
sql
validate
view
</textarea>
            </div>
            <div class="layui-form-mid layui-word-aux">[可选]admin(后台模块)<br>[可选]home(前台模块)<br>[可选]model(模型层)<br>[可选]sql(数据库文件)<br>[可选]vaidate(验证规则)<br>[可选]view(视图)<br><span class="red">如果您的插件需要分前后台，我们建议您以独立模块方式来扩展</span></div>
        </div>
</div>
<div class="layui-tab-item">
    <div class="layui-form-item layui-form">
        <table class="layui-table" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th>排序</th>
                    <th>配置名称[必填]</th>
                    <th>配置变量名[必填]</th>
                    <th>配置类型[必填]</th>
                    <th>配置选项[选填]</th>
                    <th>默认值[选填]</th>
                    <th>配置提示[选填]</th>
                    <th width="50">操作</th>
                </tr> 
            </thead>
            <tbody>
<!--                 <tr class="config-tr">
                    <td><input type="text" name="config[100][sort]" class="layui-input w50" value="100"></td>
                    <td><input type="text" name="config[100][title]" class="layui-input" lay-verify="required"></td>
                    <td><input type="text" name="config[100][name]" class="layui-input" lay-verify="required"></td>
                    <td>
                        <select name="config[100][type]" class="field-type" type="select">
                        <?php $_result=form_type();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo htmlentities($key); ?>">[<?php echo htmlentities($key); ?>]<?php echo htmlentities($v); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                    <td><textarea name="config[100][options]" class="layui-textarea" style="min-height:20px;padding:0;" placeholder="选项值:选项名"></textarea></td>
                    <td><input type="text" name="config[100][value]" class="layui-input"></td>
                    <td><input type="text" name="config[100][tips]" class="layui-input"></td>
                    <td><a href="javascript:;" class="config-tr-del">删除</a></td>
                </tr> -->
                <tr>
                    <td colspan="8" style="background-color:#f8f8f8">
                        <a class="layui-btn layui-btn-sm layui-btn-normal" id="addConfig">添加配置</a>
                        <span class="layui-word-aux">提示：当配置类型为单选按钮、多选框、下拉框、开关的时候，配置选项为必填，参考格式：选项值:选项名，多个选项请换行。</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn layui-btn-normal" lay-submit="" lay-filter="formSubmit">提交</button>
        <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
    </div>
</div>
</form>
<script type="text/html" id="configTr">
    <tr class="config-tr">
        <td><input type="text" name="config[{i}][sort]" class="layui-input w50" value="{i}"></td>
        <td><input type="text" name="config[{i}][title]" class="layui-input" lay-verify="required"></td>
        <td><input type="text" name="config[{i}][name]" class="layui-input" lay-verify="required"></td>
        <td>
            <select name="config[{i}][type]" class="field-type" type="select">
            <?php $_result=form_type();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo htmlentities($key); ?>">[<?php echo htmlentities($key); ?>]<?php echo htmlentities($v); ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </td>
        <td><textarea name="config[{i}][options]" class="layui-textarea" style="min-height:20px;padding:0;" placeholder="选项值:选项名"></textarea></td>
        <td><input type="text" name="config[{i}][value]" class="layui-input"></td>
        <td><input type="text" name="config[{i}][tips]" class="layui-input"></td>
        <td><a href="javascript:;" class="config-tr-del">删除</a></td>
    </tr>
</script>
<script src="/static/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo htmlentities($_SERVER['SCRIPT_NAME']); ?>", LAYUI_OFFSET = 60;
    layui.config({
    	base: '/static/system/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script type="text/javascript">
    layui.use(['jquery', 'form'], function(){
        var $ = layui.jquery, form = layui.form;
        $('#addConfig').click(function(){
            var that = $(this), tpl = $('#configTr').html(), len = $('.config-tr').length;
            that.parents('tr').before(tpl.replace(/{i}/g, len+100));
            form.render();
        });

        $(document).on('click', '.config-tr-del', function(){
            $(this).parents('.config-tr').remove();
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