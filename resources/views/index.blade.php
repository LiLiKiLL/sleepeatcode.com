@extends('common.layout')
@section('css')
<style>
body {
    background-image: url('images/bg02.jpeg');
    background-position: top left;
    background-repeat: no-repeat;
}
#portrait {
    width: 100px;
    height: 100px;
    border-radius: 999px;
}
.white-color {
    color: white;
}
.gray-color {
    color: gray;
}
a.btn-lg {
    /*background:rgba(255,255,255,0.1);*/
    opacity: 0.8;
    color:black;
    border:1px;
    border-color:gray;
    border-radius: 30px;
}
.contact {
    margin-top:150px;
}
.contact a {
    margin:0 10px;
}

#wechat {
    position: relative;
}

#wechat #wechat-qrcode {
  position: absolute;
  z-index: 99;
  top: -135px;
  right: -35px;
  width: 120px;
  max-width: none;
  height: 120px;
  transform: scale(0);
  transform-origin: middle middle;
  opacity: 0.8;
  border: .3125rem solid #0085ba;
  border-radius: .25rem;
  -webkit-transition: all .4s ease-in-out;
  -o-transition: all .4s ease-in-out;
  transition: all .4s ease-in-out;
}

#wechat:hover #wechat-qrcode {
    transform: scale(1);
    opacity: 1;
}

</style>
@endsection
@section('content')
<div class="container">
    <div class="row" style="margin-top:50px;">
        <div class="col-md-12 text-center">
            <img src="/images/portrait.gif" alt="头像" id="portrait">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class=" white-color">陈旭</h1>
            <h3 class="gray-color">越努力，越幸运。</h3>
        </div>
    </div>
    <hr style="width:30%;background-color:gray;height:1px;border:0;">
    <div class="row">
        <div class="col-md-12 text-center">
            <a href="/blog" class="btn btn-default btn-lg">博客</a>
            <a href="/resume" class="btn btn-default btn-lg">关于我</a>
        </div>
    </div>
    <div class="row contact">
        <div class="col-md-12 text-center">
            <a href="http://weibo.com/u/2080783863" title="微博-小鹿在湖水之畔"><img src="/images/weibo.png" alt="微博"></a>
            <a href="javascript:void(0)" title="微信-嘘！" id="wechat"><img src="/images/wechat.png" alt="微信"><img src="/images/wechat-qrcode.png" alt="陈旭的微信二维码"  id="wechat-qrcode"></a>
            <a href="mailto:chrisx0909@gmail.com" title="Gmail邮箱"><img src="/images/mail.png" alt="邮箱"></a>
            <a href="javascript:void(0)" title="手机号：150-6265-8814"><img src="/images/phone.png" alt="手机"></a>
        </div>
    </div>
</div>
@endsection