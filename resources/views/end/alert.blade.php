<?php
$type = 'info';
$visibleClass = 'hide';
$errno = 0;
$msg = '';
if (isset($api)) {
    $visibleClass = 'show';
    $errno = $api['meta']['errno'];
    $msg = $api['meta']['msg'];
    $redirect = $api['meta']['redirect'];
    // 得到alert类型:success,info,warning,danger
    if (0 == $errno) {
        $type = 'success';
    } else {
        $type = 'warning';
    }
}
?>
<div id="alert-div" class="row {{ $visibleClass}}">
    <div class="col-md-12">
        <div class="alert alert-{{ $type }} alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                &times;
            </button>
            <span id="msg">{{ $msg }}</span>
        </div>
    </div>
</div>

<?php
    if (isset($redirect)) {
        // 不为空跳转
        if (!empty($redirect)) {
            return redirect($redirect);
        }
    }
?>
