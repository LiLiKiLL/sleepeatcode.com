<?php
namespace App\Http\Controllers\Bookmark;

use App\Http\Controllers\BaseController;
use App\Models\Bookmark;
use App\Models\BookmarkDir;

class BookmarkController extends BaseController
{
    public $bookmark, $bookmarkDir;

    public function __construct()
    {
        $this->bookmark = new Bookmark();
        $this->bookmarkDir = new BookmarkDir();
    }

    public function addDir ()
    {
        $rules = [
            'name' => 'required',
            'level' => 'status',
        ];
        if (true === $this->_checkParams($rules)) {
            dd($this->bookmarkDir->columns);exit;
        }

        return $this->_jsonOutput();
    }
}