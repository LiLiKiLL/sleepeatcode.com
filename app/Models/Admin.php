<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    public $timestamps = false;

    public function register($nickname, $email, $password)
    {
        $data = [
            'nickname' => $nickname,
            'email' => $email,
            'password' => md5($password),
        ];

        return self::insertGetId($data);
    }

    public function login($nickname, $password)
    {
        $params = [
            'nickname' => $nickname,
            'password' => md5($password),
        ];

        return self::where($params)->first();
    }
}