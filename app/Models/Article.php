<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\Lib;

class Article extends Model
{
    protected $table = 'article';
    public $timestamps = false;

    public function add($data)
    {
        $data = array_only($data, ['title', 'content']);
        $data['create_at'] = $data['update_at'] = time();
        $id = self::insertGetId($data);

        return $id;
    }

    public function getList()
    {
        $result = self::select('*')->orderBy('create_at', 'desc')->get();
        $result = empty($result) ? array() : $result->toArray();
        foreach ($result as $k => &$v) {
            $this->_filterInfo($v);
        }

        return $result;
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
        $data = array_only($data, ['title', 'content']);
        $data['update_at'] = time();
        $result = self::where('id', $id)->update($data);

        return $result;
    }

    public function del($id)
    {
        $result = self::where('id', $id)->delete();

        return $result;
    }

    protected function _filterInfo(&$data)
    {
        Lib::timestampsFormat($data, ['create_at', 'update_at'], 'Y-m-d H:i:s');
    }
}