<?php
namespace App\Services;

class Lib {
    /**
     * 将数据库中的数字表示的字段，添加一个中文描述字段，方便debug和查看接口信息
     * 比如：数据库中status字段用1表示正常，2表示已删除，则可以通过本函数，给数据添加一个status_desc的中文描述字段
     * 原$data ：['status' => 1]
     * 处理后$data：['status' => 1, 'status_desc' => '正常']
     * 调用示例：Lib::getDesc(['status' => 1], 'status', [1 => '正常', 2 => '已删除'])
     * @param  array &$data      要转换的数据
     * @param  string $originKey  要添加中文描述的原始key
     * @param  string $newDescKey 描述字段名
     * @param  array $descMap    数字描述map数组
     * @return [type]             [description]
     */
    public static function getDesc(&$data, $originKey, $descMap) {
        $newDescKey = $originKey . '_desc';
        if (isset($data[$originKey])) {
            $data[$newDescKey] = isset($descMap[$data[$originKey]]) ? $descMap[$data[$originKey]] : '';
        }
    }

    /**
     * 格式化时间戳
     * 调用示例：Lib::timestampFormat(['create_at' => 1122991787, 'update_at' => 126767899], ['create_at', 'update_at'], 'Y-m-d H:i:s')
     * @param  array &$data      要格式化的数据
     * @param  array $keys       要格式化的字段
     * @param  string $format    格式
     * @return [type]             [description]
     */
    public static function timestampsFormat(&$data, $keys = ['create_at', 'update_at', 'start_time', 'end_time'], $format = 'Y-m-d H:i:s') {
        foreach ($keys as $key) {
            if (isset($data[$key])) {
                $data[$key] = date($format, $data[$key]);
            }
        }
    }

    /**
     * 根据一个起始时间和一个结束时间，获取这两个时间之间的日期列表
     * @param  string $startTime [description]
     * @param  string $endTime   [description]
     * @return [type]            [description]
     */
    public static function getDateListOfPeriod($startTime, $endTime) {
        $startTimeStamp = strtotime($startTime);
        $endTimeStamp = strtotime($endTime);
        $dateList = array();// 存储开始时间到结束时间的所有日期，日期格式：YYYY-MM-DD
        if ($startTimeStamp <= $endTimeStamp) {
            $startTimeDate = date('Y-m-d', $startTimeStamp);
            $endTimeDate = date('Y-m-d', $endTimeStamp);
            $tmpDate = $startTimeDate;
            while (strtotime($tmpDate) <= $endTimeStamp) {
                $dateList[] = $tmpDate;
                $tmpDate = date('Y-m-d', strtotime("$tmpDate +1 day"));
            }
        }

        return $dateList;
    }
}