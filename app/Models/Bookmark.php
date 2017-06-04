<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Schema;

class Bookmark extends Model
{
    protected $table = 'bookmark';
    public $timestamps = false;
    public $columns;

    public function __construct()
    {
        $this->columns = Schema::getColumnListing($this->table);
    }
}