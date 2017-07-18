<?php
namespace App\Http\Controllers\End;

use App\Http\Controllers\EndBaseController;
use Request, Input;
use App\Models\BookmarkDir;

class BookmarkController extends EndBaseController
{
    protected $viewPrefix = 'end/bookmark/';

    public function addDir()
    {
        $bookmarkdir = new BookmarkDir();
        if (Request::isMethod('get')) {
            $firstLevelDirList = $bookmarkdir->firstLevelList();
            $data = [
                'first_level_dir_list' => $firstLevelDirList,
            ];

            return view($this->viewPrefix . 'addDir', $data);
        } else {
            $rules = [
                'pid' => 'required',
                'name' => 'required',
            ];
            if (true === $this->_checkParams($rules)) {
                $pid = Input::get('pid');
                $name = Input::get('name');
                $id = $bookmarkdir->add($pid, $name);

                return redirect(route('bookmark_list'));
            }

            return $this->_jsonOutput();
        }
    }

    public function add()
    {
        return view($this->viewPrefix . 'add');
    }

    public function getList()
    {
        return view($this->viewPrefix . 'list');
    }
}