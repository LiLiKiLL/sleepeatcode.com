@extends('common.front_layout')

@section('title', 'About me-')

@section('css')
<style>
    .resume {
        padding:50px;
        /*font-size: 1.1em;*/
        word-break: break-all;
    }
    .resume .th {
        background-color:#F8F8F8;
    }
</style>
@endsection
@section('main_content')
<div class="resume">
    <h1>做一个靠谱的人</h1>
    <div class="chapter me">
        <h2>我是谁</h2>
        <ul>
            <li>姓名：陈旭</li>
            <li>性别：男</li>
            <li>出生：1993年9月</li>
            <li>籍贯：江西赣州</li>
            <li>民族：汉</li>
        </ul>
    </div>

    <div class="chapter skill">
        <h2>个人能力</h2>
            <h4>Tech</h4>
            <ul>
                <li>PHP/Laravel/Lumen/ThinkPHP/CodeIngniter</li>
                <li>MySQL</li>
                <li>Redis</li>
                <li>Git</li>
                <li>Linux/Shell</li>
                <li>Bootstrap/jQuery/JavaScript/Node.js</li>
                <li>html/css</li>
                <li>Nginx/Apache/HTTP</li>
                <li>Regex</li>
                <li>Wechat dev</li>
            </ul>
            <h4>Other</h4>
            <ul>
                <li>CET-6</li>
            </ul>
    </div>

    <div class="chapter edutication">
        <h2>教育经历</h2>
            <h4>南京航空航天大学<small>2010年9月-2014年6月</small></h4>
            <ul>
                <li>学历：本科</li>
                <li>专业：自动化</li>
            </ul>
    </div>
    <div class="chapter contact-me">
        <h2>联系我</h2>
            <ul>
                <li>QQ/微信：541817418</li>
                <li>邮箱：<a href="mailto:chrisx0909@gmail.com">chrisx0909@gmail.com</a></li>
            </ul>
    </div>
    <p>Someone who loves to program and enjoys being clever about it.</p>
    <!-- <p>我是陈旭，一只知道编程的猴子。我的格言是“吃饭睡觉写代码”，嘎嘎。</p> -->
</div>
@endsection
