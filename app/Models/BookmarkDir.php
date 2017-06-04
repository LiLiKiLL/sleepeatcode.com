<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Schema;

class BookmarkDir extends Model
{
    protected $table = 'bookmark_dir';
    public $timestamps = false;
    public $columns;

    public function __construct()
    {
        $this->columns = Schema::getColumnListing($this->table);
    }

    public function add()
    {

    }
}