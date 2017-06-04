<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Schema;

class Test extends Model
{
    protected $table = '';
    public $timestamps = false;
    public $columns;

    public function __construct()
    {
        $this->columns = Schema::getColumnListing($this->table);
    }
}