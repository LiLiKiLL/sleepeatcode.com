<?php
namespace App\Http\Controllers\End;

use App\Http\Controllers\EndBaseController;
use Request, Input;
use App\Models\BookmarkDir;
use App\Models\Bookmark;

class BookmarkController extends EndBaseController
{
    protected $viewPrefix = 'end/bookmark/';

    public function addDir()
    {
        $bookmarkdir = new BookmarkDir();
        if (Request::isMethod('get')) {
            $firstLevelDirList = $bookmarkdir->getFirstLevelList();
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
        $bookmarkdir = new BookmarkDir();
        $bookmark = new Bookmark();
        if (Request::isMethod('get')) {
            $dirList = $bookmarkdir->getList();
            $data = [
                'dir_list' => $dirList,
            ];

            return view($this->viewPrefix . 'add', $data);
        } else {
            $rules = [
                'dir_id' => 'required',
                'name' => 'required',
                'url' => 'required',
                'desc' => 'string',
            ];
            if (true === $this->_checkParams($rules)) {
                $params = Input::all();
                $id = $bookmark->add($params);

                return redirect(route('bookmark_list'));
            }

            return $this->_jsonOutput();
        }
    }

    public function getList()
    {
        $page = Input::get('page', 1);
        $pageSize = Input::get('page_size', 10);
        $bookmark = new Bookmark();
        $bookmarkList = $bookmark->getList(array(), $page, $pageSize);
        $data = [
            'bookmark_list' => $bookmarkList,
        ];

        return view($this->viewPrefix . 'list', $data);
    }

}