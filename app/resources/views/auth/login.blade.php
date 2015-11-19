<!DOCTYPE html>
<html><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>牛客网—登录—专业IT笔试面试备考平台</title>
    <script>
        var _czc = _czc || [];
        _czc.push(["_setAccount", "1253353781"]);
    </script>
    <link rel="stylesheet" href="{{ asset('css/regLogin.css')}}">

<body>
@extends('app')
@section('content')
    <div class="nk-main clearfix">
        <div class="wrapper">
            <div class="tabbed">
                <ul class="clearfix">
                    <li class="tab-selected"><a href="{{ url('auth/login') }}"><span class="tab-login"></span>登录</a></li>
                    <li><a href="register.htm"><span class="{{ url('auth/register') }}"></span>注册</a></li>
                </ul>
            </div>
            <div class="wrapper-content clearfix">
                <div class="input-section">
                    {!! Form::open(['url'=>'/auth/login']) !!}
                    <div class="form-group">
                        {!! Form::label('邮箱',null,['class'=>'control-label']) !!}
                        <div class="control-group">
                            {!! Form::email('email',null,['id'=>'emailIpt','placeholder'=>'请输入邮箱']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('密码',null,['class'=>'control-label']) !!}
                        <div class="control-group">
                            {!! Form::password('password',['id'=>'passwordIpt','placeholder'=>'请输入密码']) !!}
                        </div>
                    </div>
                    <div class="form-group about-pwd">
                        <div class="keep-pwd">
                            <label>
                                <input type="checkbox" id="remLoginChk" checked> 记住登录
                            </label>
                        </div>
                        <a href="forgot-pwd" class="forget-pwd"> 忘记密码？</a>
                    </div>
                    <div class="form-group">
                        <div class="col-input-login">
                            {!! Form::submit('立即登录',['class'=>'btn btn-primary btn-block','id'=>'registerBtn']) !!}
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
                <div class="other-login-way">
                    <span class="separate-line">或</span>
                    <div class="login-way">
                        <a href="javascript:void(0);" data-href="https://graph.qq.com/oauth2.0/authorize?client_id=101003590&amp;response_type=code&amp;redirect_uri=http://www.nowcoder.com/oauth2/qqconfig&amp;state=web&amp;scope=get_user_info" class="nc-js-action-oauth login-qq">QQ账号登录</a>
                        <a href="javascript:void(0);" data-href="https://api.weibo.com/oauth2/authorize?client_id=3023520088&amp;response_type=code&amp;redirect_uri=http://www.nowcoder.com/oauth2/sinaconfig&amp;state=web&amp;scope=follow_app_official_microblog" class="nc-js-action-oauth login-wb">微博账号登录</a>
                        <a href="javascript:void(0);" data-href="https://open.weixin.qq.com/connect/qrconnect?appid=wxfee0340998de6ab1&amp;redirect_uri=http%3A%2F%2Fwww.nowcoder.com%2Foauth2%2Flogin%2Fweixin?&amp;response_type=code&amp;scope=snsapi_login&amp;state=11" class="nc-js-action-oauth login-wx">微信账号登录</a>
                        <div class="login-fold">
                            <a href="javascript:void(0);" class="login-more">更多三方账号</a>
                            <div class="login-unfold-icons">
                                <a href="javascript:void(0);" data-href="https://github.com/login/oauth/authorize?client_id=1c539827b9400016d0c9&amp;response_type=code&amp;redirect_uri=http://www.nowcoder.com/oauth2/gitconfig&amp;state=web&amp;scope=user:email" class="nc-js-action-oauth login-git"></a>
                                <a href="javascript:void(0);" data-href="https://www.douban.com/service/auth2/auth?client_id=075c6b46242f18c8161541d26c8d4a58&amp;response_type=code&amp;redirect_uri=http://www.nowcoder.com/oauth2/dbconfig&amp;state=web" class="nc-js-action-oauth login-db"></a>
                                <a href="javascript:void(0);" data-href="https://graph.renren.com/oauth/authorize?client_id=33356a41ddac4028a9ad64925e68c0e0&amp;response_type=code&amp;redirect_uri=http://www.nowcoder.com/oauth2/rrconfig&amp;state=web" class="nc-js-action-oauth login-rr"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="display: block; bottom: 294px;" class="fixed-menu">
        <ul>
            <li>
                <a href="#top" class="gotop" title="回到顶部" id="gotop"></a>
            </li>
            <li>
                <a class="fixed-wb" target="_blank" href="http://www.weibo.com/nowcoder"></a>
            </li>
            <li>
                <a href="tencent://groupwpa/?subcmd=all&amp;param=7B2267726F757055696E223A3135373539343730352C2274696D655374616D70223A313431333130373737387D0A" class="qq" title="QQ"></a>
            </li>
            <li>
                <a href="javascript:void(0);" class="wx"></a>
                <div class="wx-qrcode">
                    <img src="{{ asset('img/wx-rcode.jpg')}}" alt="二维码">
                    <p>扫描二维码，关注牛客网</p>
                </div>
            </li>
            <li>
                <a href="http://www.nowcoder.com/discuss/30" class="feedback" title="意见反馈"></a>
                <a href="http://www.nowcoder.com/discuss/30" class="feedback-letter">意见反馈</a>
            </li>
            <li>
                <a href="javascript:void(0);" class="qrcode"></a>
                <div class="wx-qrcode">
                    <img src="{{ asset('img/app.png')}}" alt="二维码">
                    <p>下载牛客APP，随时随地刷题</p>
                </div>
            </li>
        </ul>
        <div class="phone-qrcode" style="">
            <a href="javascript:void(0);" class="qrcode-close">x</a>
            <img src="{{ asset('img/app.png')}}" alt="二维码" style="width:70px;height:70px;">
            <p>扫一扫下载牛客APP</p>
        </div>
    </div>
    <div class="fixed-foot clearfix js-fixed-foot" style="display:none;">
        <div class="fixed-foot-main">
            <div class="fixed-foot-tip">刷真题、补算法、看面经、得内推</div>
            <div class="fixed-foot-login">
                <span>使用第三方账号直接登录使用吧：</span>
                <a href="javascript:void(0);" data-href="https://api.weibo.com/oauth2/authorize?client_id=3023520088&amp;redirect_uri=http%3A%2F%2Fwww.nowcoder.com%2Foauth2%2Fsinaconfig&amp;response_type=code&amp;state=web&amp;scope=follow_app_official_microblog" class="ft-login-item ft-login-wb nc-js-action-oauth" title="登录微博"></a>
                <a href="javascript:void(0);" data-href="https://graph.qq.com/oauth2.0/authorize?client_id=101003590&amp;redirect_uri=http%3A%2F%2Fwww.nowcoder.com%2Foauth2%2Fqqconfig&amp;response_type=code&amp;state=web" class="ft-login-item ft-login-qz nc-js-action-oauth" title="登录Qzone"></a>
                <a href="javascript:void(0);" data-href="https://open.weixin.qq.com/connect/qrconnect?appid=wxfee0340998de6ab1&amp;redirect_uri=http%3A%2F%2Fwww.nowcoder.com%2Foauth2%2Flogin%2Fweixin&amp;response_type=code&amp;scope=snsapi_login&amp;state=11" class="ft-login-item ft-login-wx nc-js-action-oauth" title="登录微信"></a>
                <a href="javascript:void(0);" data-href="https://github.com/login/oauth/authorize?client_id=1c539827b9400016d0c9&amp;scope=user:email&amp;redirect_uri=http%3A%2F%2Fwww.nowcoder.com%2Foauth2%2Fgitconfig&amp;response_type=code&amp;state=web" class="ft-login-item ft-login-git nc-js-action-oauth" title="登录git"></a>
                <a href="javascript:void(0);" class="more-login nc-req-auth">更多</a>
            </div>
        </div>
    </div>


</div>
@stop
<script src="{{ asset('/sea.js')}}" type="text/javascript"></script>
<script src="{{ asset('/base.js')}}"></script>
<script type="text/javascript">
    seajs.use('nowcoder/1.2.356/javascripts/site/common/index');
    seajs.use('nowcoder/1.2.356/javascripts/site/common/nav');
</script>
<span id="cnzz_stat_icon_1253353781" style="display:none;"></span>
<script type="text/javascript">
    seajs.use('nowcoder/1.2.356/javascripts/site/login/login');
</script>


<script src="{{ asset('js/stat.php')}}" type="text/javascript"></script></body></html>