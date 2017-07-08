<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\Lib;

class Motto extends Model
{
    protected $table = 'motto';
    public $timestamps = false;

    public $allowKeys = ['content', 'author'];

    public function add($content, $author)
    {
        $time = time();
        $data = [
            'content' => $content,
            'author' => $author,
            'create_at' => $time,
            'update_at' => $time,
        ];
        $id = self::insertGetId($data);

        return $id;
    }

    public function edit($id, $content, $author)
    {
        $data = [
            'content' => $content,
            'author' => $author,
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

    public function getList($conds = array(), $page = 1, $pageSize = 10)
    {
        $result = self::select('*')->orderBy('create_at', 'desc');
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

    public function random()
    {
        $total = self::count();
        $rand = ceil(rand(1, $total));
        $result = self::where('id', '<=', $rand)->first();
        $result = empty($result) ? array() : $result->toArray();
        $this->_filterInfo($result);

        return $result;
    }

    protected function _filterInfo(&$data)
    {
        Lib::timestampsFormat($data, ['create_at', 'update_at'], 'Y-m-d H:i:s');
    }
}