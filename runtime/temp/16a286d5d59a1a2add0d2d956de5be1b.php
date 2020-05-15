<?php /*a:3:{s:77:"E:\phpStudy\PHPTutorial\WWW\hisiphp\application\install\view\index\step2.html";i:1588348082;s:76:"E:\phpStudy\PHPTutorial\WWW\hisiphp\application\install\view\index\head.html";i:1588348082;s:76:"E:\phpStudy\PHPTutorial\WWW\hisiphp\application\install\view\index\foot.html";i:1588348082;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title> 系统安装 - Powered by HisiPHP</title>
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <link rel="stylesheet" href="/static/js/layui/css/layui.css">
    <link rel="stylesheet" href="/static/system/css/style.css">
    <link rel="stylesheet" href="/static/system/css/install.css">
    <script src="/static/js/layui/layui.js"></script>
    <script>
    layui.config({
      base: '/static/system/js/',
      version: '<?php echo time(); ?>'
    }).use('global');
    </script>
</head>
<body>
<div class="header">
    <h1>感谢您选择HisiPHP</h1>
</div>
<style type="text/css">
.layui-table td, .layui-table th{text-align:left;}
.layui-table tbody tr.no{background-color:#f00;color:#fff;}
</style>
<div class="install-box">
    <fieldset class="layui-elem-field layui-field-title">
        <legend>运行环境检测</legend>
    </fieldset>
    <table class="layui-table" lay-skin="line">
        <thead>
            <tr>
                <th>环境名称</th>
                <th>当前配置</th>
                <th>所需配置</th>
            </tr> 
        </thead>
        <tbody>
            <?php if(is_array($data['env']) || $data['env'] instanceof \think\Collection || $data['env'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['env'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr class="<?php echo htmlentities($vo[4]); ?>">
                <td><?php echo htmlentities($vo[0]); ?></td>
                <td><?php echo htmlentities($vo[3]); ?></td>
                <td><?php echo htmlentities($vo[2]); ?></td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <table class="layui-table" lay-skin="line">
        <thead>
            <tr>
                <th>目录/文件</th>
                <th>所需权限</th>
                <th>当前权限</th>
            </tr> 
        </thead>
        <tbody>
            <?php if(is_array($data['dir']) || $data['dir'] instanceof \think\Collection || $data['dir'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['dir'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr class="<?php echo htmlentities($vo[5]); ?>">
                <td><?php echo htmlentities($vo[2]); ?></td>
                <td><?php echo htmlentities($vo[3]); ?></td>
                <td><?php echo htmlentities($vo[4]); ?></td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <table class="layui-table" lay-skin="line">
        <thead>
            <tr>
                <th>函数/扩展</th>
                <th>类型</th>
                <th>结果</th>
            </tr> 
        </thead>
        <tbody>
            <?php if(is_array($data['func']) || $data['func'] instanceof \think\Collection || $data['func'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['func'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr class="<?php echo htmlentities($vo[2]); ?>">
                <td><?php echo htmlentities($vo[0]); ?></td>
                <td><?php echo htmlentities($vo[3]); ?></td>
                <td><?php echo htmlentities($vo[1]); ?></td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <div class="step-btns">
        <a href="/" class="layui-btn layui-btn-primary layui-btn-big fl">返回上一步</a>
        <a href="?step=3" class="layui-btn layui-btn-big layui-btn-normal fr">进行下一步</a>
    </div>
</div>
<div class="copyright">
    © 2017-2018 <a href="<?php echo config('hisiphp.url'); ?>" target="_blank"><?php echo config('hisiphp.copyright'); ?></a> All Rights Reserved.
</div>
</body>
</html>