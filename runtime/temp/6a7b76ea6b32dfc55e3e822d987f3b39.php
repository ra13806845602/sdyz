<?php /*a:2:{s:78:"E:\phpStudy\PHPTutorial\WWW\hisiphp\application\system\view\publics\index.html";i:1588348082;s:76:"E:\phpStudy\PHPTutorial\WWW\hisiphp\application\system\view\block\layui.html";i:1588348082;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>后台管理登录 -  Powered by <?php echo config('hisiphp.name'); ?></title>
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/js/layui/css/layui.css">
    <style type="text/css">
        body{background:radial-gradient(200% 100% at bottom center,#0070aa,#0b2570,#000035,#000);background:radial-gradient(220% 105% at top center,#000 10%,#000035 40%,#0b2570 65%,#0070aa);background-attachment:fixed;overflow:hidden;background-color:#0b2570;}
        @keyframes rotate{0%{transform:perspective(400px) rotateZ(20deg) rotateX(-40deg) rotateY(0)}100%{transform:perspective(400px) rotateZ(20deg) rotateX(-40deg) rotateY(-360deg)}}
        #particles-js {position: absolute;width: 100%;height: 100%;}
        .login-box{padding:15px 30px;border:1px solid #aaa;border-radius:5px;background-color:rgba(255,255,255, 0.2);width:260px;position:fixed;left:50%;top:50%;z-index:999;margin:-200px 0 0 -160px;}
        .layui-form-pane .layui-form-label{width:50px;background-color:rgba(255,255,255, 0.5);color:#fff;}
        .layui-form-pane .layui-input-block{margin-left:50px;}
        .login-box .layui-input{font-size:18px;font-weight:400;background-color:rgba(255,255,255, 0.5);color:#fff;display:inline-block;}
        .login-box input[name="password"]{letter-spacing:5px;font-weight:800}
        .login-box input[type="submit"]{letter-spacing:5px;}
        .login-box input[name="captcha"]{width:75px;}
        .captcha{float:right;border-radius:3px;width:120px;height:38px;overflow:hidden;}
        .login-box .layui-btn{width:100%;}
        .login-box .copyright{text-align:center;height:50px;line-height:50px;font-size:12px;color:#aaa}
        .login-box .copyright a{color:#aaa;}
        @media only screen and (min-width:750px){
            .login-box{width:350px;margin:-200px 0 0 -205px!important}
            .login-box input[name="captcha"]{width:165px;}
        }
    </style>
</head>
<body>
<div id="particles-js">
    <div class="login-box">
        <form action="<?php echo url(); ?>" method="post" class="layui-form layui-form-pane">
            <fieldset class="layui-elem-field layui-field-title">
                <legend style="color:#fff;">管理后台登录</legend>
            </fieldset>
            <div class="layui-form-item">
                <label class="layui-form-label"><i class="layui-icon layui-icon-username"></i></label>
                <div class="layui-input-block">
                    <input type="text" name="username" class="layui-input" lay-verify="required" placeholder="登录账号" autofocus="autofocus" />
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"><i class="layui-icon layui-icon-password"></i></label>
                <div class="layui-input-block">
                    <input type="password" name="password" class="layui-input" lay-verify="required" placeholder="登录密码" />
                </div>
            </div>
            <div class="layui-form-item" <?php if(($loginError < 3)): ?>style="display:none;"<?php endif; ?>>
                <label class="layui-form-label"><i class="layui-icon layui-icon-vercode"></i></label>
                <div class="layui-input-block">
                    <input type="text" name="captcha" class="layui-input" placeholder="验证码" /><a href="javascript:;" class="captcha"><img <?php if(($loginError >= 3)): ?>src="<?php echo captcha_src(); ?>"<?php endif; ?> height="38" width="120" id="captchaImg" alt="验证码" /></a>
                </div>
            </div>
            
            <?php echo token(); ?>
            <input type="submit" value="登录" lay-submit="" lay-filter="formLogin" class="layui-btn layui-btn-normal">
        </form>
        <div class="copyright">
            © 2018-2020 <a href="<?php echo config('hisiphp.url'); ?>" target="_blank"><?php echo config('hisiphp.copyright'); ?></a> All Rights Reserved.
        </div>
    </div>
</div>
<script src="/static/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo htmlentities($_SERVER['SCRIPT_NAME']); ?>", LAYUI_OFFSET = 60;
    layui.config({
    	base: '/static/system/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script src="/static/js/particles.min.js"></script>
<script type="text/javascript">
window.sessionStorage.clear();
layui.use(['form', 'layer', 'jquery', 'md5'], function() {
    var $ = layui.jquery, layer = layui.layer, form = layui.form, md5 = layui.md5, captchaUrl = '<?php echo captcha_src(); ?>';
    form.on('submit(formLogin)', function(data) {
        var that = $(this), _form = that.parents('form'),
            account = $('input[name="username"]').val(),
            pwd = $('input[name="password"]').val(),
            token = $('input[name="__token__"]').val(),
            captcha = $('input[name="captcha"]').val();

        layer.msg('数据提交中...',{time:500000});
        that.prop('disabled', true);
        
        $.ajax({
            type: "POST",
            url: _form.attr('action'),
            data: {'username': account, 'password': md5.exec(pwd), '__token__' : token, captcha: captcha},
            success: function(res) {
                if (res.data.captcha) {
                    $('#captchaImg').attr('src', res.data.captcha).parents('.layui-form-item').show();
                }

                if (res.data.token) {
                    $('input[name="__token__"]').val(res.data.token);
                }

                layer.msg(res.msg, {}, function() {
                    if (res.code == 1) {
                        location.href = res.url;
                    } else {
                        that.prop('disabled', false);
                    }
                });

            }
        });
        return false;
    });

    $(document).on('click', '#captchaImg', function(){
        $(this).attr('src', captchaUrl+'#rand='+Math.random());
    });
});
particlesJS("particles-js",{"particles":{"number":{"value":50,"density":{"enable":true,"value_area":800}},"color":{"value":"#ffffff"},"opacity":{"value":0.2,"random":false,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":3,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":true,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":6,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"grab"},"onclick":{"enable":true,"mode":"push"},"resize":true},"modes":{"grab":{"distance":140,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true});
</script>
</body>
</html>