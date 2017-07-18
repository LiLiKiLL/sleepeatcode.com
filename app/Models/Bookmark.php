<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Schema;

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
}