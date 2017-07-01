<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\Lib;

class Article extends Model
{
    protected $table = 'article';
    public $timestamps = false;

    public $allowKeys = ['title', 'abstract', 'tag', 'content'];

    public function add($data)
    {
        $data = array_only($data, $this->allowKeys);
        // 替换标签中的英文逗号为中文
        $data['tag'] = str_replace(',', '，', $data['tag']);
        $data['create_at'] = $data['update_at'] = time();
        $id = self::insertGetId($data);

        return $id;
    }

    public function getList($conds = array(), $page = 1, $pageSize = 10)
    {
        $result = self::select('*');
        $result->orderBy('create_at', 'desc');
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

    public function info($id)
    {
        $result = self::where('id', $id)->first();
        $result = empty($result) ? array() : $result->toArray();
        $this->_filterInfo($result);

        return $result;
    }

    public function edit($id, $data)
    {
        $data = array_only($data, $this->allowKeys);
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