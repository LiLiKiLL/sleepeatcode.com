@extends('common.front_layout')
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

    <div class="chapter work">
        <h2>工作经历</h2>
            <h4>上海容**电子商务有限公司<small>2016年6月-至今</small></h4>
            <ul>
                <li>职位：PHP开发工程师</li>
                <li>工作内容：
                    <ul>
                        <li>商家后台、运营后台开发</li>
                        <li>广告投放系统开发</li>
                        <li>资产管理系统开发</li>
                        <li>微信营销活动开发</li>
                        <li>技术栈：PHP/Laravel/MySQL/Redis/Git/Linux/Bootstrap/jQuery/Workerman/CodeIngniter/JavaScript/HTML/CSS...</li>
                    </ul>
                </li>
            </ul>

            <h4>苏州奇**网络科技有限公司<small>2015年10月-2016年6月</small></h4>
            <ul>
                <li>职位：软件工程师</li>
                <li>工作内容：
                    <ul>
                        <li>公司官网开发</li>
                        <li>web定制语音对话内容管理系统</li>
                        <li>语音对话系统知识库开发维护</li>
                        <li>客户技术支持</li>
                        <li>系统性能测试与完善，改进系统稳定性与可靠性</li>
                        <li>技术栈：C/Lua/SVN/Linux/MySQL/jQuery/JavaScript/HTML/CSS</li>
                    </ul>
                </li>
            </ul>

            <!-- <h4>纬**通（昆山）有限公司<small>2014年7月-2015年7月</small></h4>
            <ul>
                <li>职位：产品工程师</li>
                <li>工作内容：
                    <ul>
                        <li>新产品的接收、导入及转移</li>
                        <li>分析、解决生产过程中的质量与工程问题</li>
                        <li>协助改善生产测试流程</li>
                        <li>量产阶段不良品分析以及对策提出, 协助提升产线良率</li>
                    </ul>
                </li>
            </ul> -->
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
    <p>我是陈旭，一只知道编程的猴子。我的格言是“吃饭睡觉写代码”，嘎嘎。</p>
</div>
@endsection