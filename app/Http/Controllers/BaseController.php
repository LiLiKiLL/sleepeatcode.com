<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ErrMapping;
use Validator, Input, Log, Request;

class BaseController extends Controller
{
    protected $_errno = 0;
    protected $_msg = '';
    protected $_result;

    /**
     * 校验参数合法性。验证通过返回true，失败返回validator对象
     * @param array $rules
     * @return object on fail | bool on success
     */
    protected function _checkParams($rules = array())
    {
        $result = true;
        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()) {
            $this->_errno = ErrMapping::ERR_BAD_PARAMETERS;
            $this->_msg = $validator->errors()->all();
            $this->_msg = is_array($this->_msg) ? implode(' ', $this->_msg) : $this->_msg;

            $result = $validator;
        }

        return $result;
    }

    /**
     * 将Api的json返回统一输出
     */
    protected function _jsonOutput($headers = array())
    {
        $result = $this->getResult();
        Log::info(sprintf('ip[%s] url[%s] request[%s] result[%s]', Request::getClientIp(), Request::url(), json_encode(Input::all()), json_encode($result)));

        $response = response()->json($this->_filterReturn($result));
        if ($headers) {
            foreach ($headers as $k => $v) {
                $response->header($k, $v);
            }
        }

        return $response;
    }

    protected function _jsonOutputWithCrossDomain()
    {
        return $this->_jsonOutput(array('Access-Control-Allow-Origin' => '*'));
    }

    /**
     * 递归去除null数值
     * @param array $data
     * @return array
     */
    protected function _filterReturn($data)
    {
        // 不是数组，直接返回
        if(! is_array($data)) {
            return $data;
        }
        foreach ($data as $k => &$val) {
            if(is_array($val)) {
                $val = $this->_filterReturn($val);
            }
            elseif(is_null($val)) {
                $val = '';
            }
        }

        return $data;
    }

    /**
     * 将php中空数组，并更为对象
     * @param array $arr
     */
    public function tranEmptyArrToObject(&$arr)
    {
        if (is_array($arr)) {
            if (empty($arr)) {
                $arr = new \StdClass();
            }
            else {
                foreach ($arr as &$val) {
                    if (is_array($val)) {
                        $this->tranEmptyArrToObject($val);
                    }
                }
            }
        }
    }

    protected function getResult()
    {
        if($this->_errno && empty($this->_msg)) {
            $this->_msg = ErrMapping::getMessage($this->_errno);
        }
        $result = [
            'meta' => [
                'errno' => $this->_errno,
                'msg' => $this->_msg,
            ],
            'result' => empty($this->_result) ? new \StdClass() : $this->_result,
        ];

        return $result;
    }
}