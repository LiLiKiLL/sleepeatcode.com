<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Schema, DB;
use App\Services\Lib;

class BookmarkDir extends Model
{
    protected $table = 'bookmark_dir';
    public $timestamps = false;
    public $columns;

    const ROOT_DIR_PID = 0;// 根目录文件夹PID
    const LEVEL_FIRST = 1;// 一级文件夹
    const LEVEL_SECOND = 2;// 二级文件夹
    const STATUS_NORMAL = 1;// 状态-正常
    const STATUS_DELETED = 2;// 状态-删除

    public function __construct()
    {
        $this->columns = Schema::getColumnListing($this->table);
    }

    public function add($pid, $name)
    {
        $id = 0;
        $data = [
            'pid' => $pid,
            'name' => $name,
            'status' => self::STATUS_NORMAL,
            'create_at' =>time(),
            'update_at' => time(),
        ];
        if ($pid == self::ROOT_DIR_PID) {
            $data['level'] = self::LEVEL_FIRST;
        } else {
            $data['level'] = self::LEVEL_SECOND;
        }
        $id = self::insertGetId($data);
        self::where('id', $id)->update(['weight' => $id]);

        return $id;
    }

    public function getFirstLevelList()
    {
        $where = [
            'pid' => self::ROOT_DIR_PID,
            'level' => self::LEVEL_FIRST,
            'status' => self::STATUS_NORMAL,
        ];
        $list = self::where($where)->orderBy('weight', 'asc')->get();
        $list = empty($list) ? array() : $list->toArray();
        foreach ($list as $k => &$v) {
            $this->_filterInfo($v);
        }

        return $list;
    }

    public function getChildren($pid)
    {
        $where = [
            'pid' => $pid,
            'status' => self::STATUS_NORMAL,
        ];
        $children = self::where($where)->orderBy('weight', 'asc')->get();
        $children = empty($children) ? array() : $children->toArray();
        foreach ($children as $k => &$v) {
            $this->_filterInfo($v);
        }

        return $children;
    }

    public function getList()
    {
        $result = $this->getFirstLevelList();
        foreach ($result as $k => &$v) {
            $children = $this->getChildren($v['id']);
            $v['children'] = $children;
        }

        return $result;
    }

    protected function _filterInfo(&$data)
    {
        Lib::timestampsFormat($data, ['create_at', 'update_at'], 'Y-m-d H:i:s');
    }
}