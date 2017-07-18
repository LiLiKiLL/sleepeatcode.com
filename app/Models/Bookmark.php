<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Schema;
use App\Services\Lib;

class Bookmark extends Model
{
    protected $table = 'bookmark';
    public $timestamps = false;
    public $columns;

    const STATUS_NORMAL = 1;// 状态-正常
    const STATUS_DELETED = 2;// 状态-删除

    public function __construct()
    {
        $this->columns = Schema::getColumnListing($this->table);
    }

    public function add($data)
    {
        $data = array_only($data, ['dir_id', 'name', 'url', 'desc', 'icon']);
        $data['create_at'] = $data['update_at'] = time();
        $data['status'] = self::STATUS_NORMAL;
        $id = self::insertGetId($data);
        self::where('id', $id)->update(['weight' => $id]);

        return $id;
    }

    public function getList($conds = array(), $page = 1, $pageSize = 10)
    {
        $result = self::select('bookmark.*', 'bookmark_dir.name as dir_name');
        $result->where('bookmark.status', self::STATUS_NORMAL)->orderBy('create_at', 'desc')->leftJoin('bookmark_dir', 'bookmark.dir_id', '=', 'bookmark_dir.id');
        $pagination = $result->paginate($pageSize, '*', 'page', $page)->toArray();
        if ($pagination['data']) {
            foreach ($pagination['data'] as $k => &$v) {
                $this->_filterInfo($v);
            }
        }

        return array(
            'total' => $pagination['total'],
            'total_page' => $pagination['last_page'],
            'page' => $pagination['current_page'],
            'page_size' => $pageSize,
            'data' => $pagination['data']
        );
    }

    public function del($id)
    {
        $data = [
            'status' => self::STATUS_DELETED,
            'update_at' => time(),
        ];

        return self::where('id', $id)->update($data);
    }

    public function info($id)
    {
        $result = self::where('id', $id)->first();
        $result = empty($result) ? array() : $result->toArray();
        $this->_filterInfo($result);

        return $result;
    }

    public function edit($id, $data)
    {
        $data = array_only($data, ['dir_id', 'name', 'url', 'desc', 'icon']);
        $data['update_at'] = time();
        $result = self::where('id', $id)->update($data);

        return $result;
    }

    protected function _filterInfo(&$data)
    {
        Lib::timestampsFormat($data, ['create_at', 'update_at'], 'Y-m-d H:i:s');
    }
}