<?php
namespace App\Http;

use Illuminate\Contracts\Support\Jsonable;

class JsonResponse implements Jsonable
{

    public $message = null;
    public $success = false;

    public function __construct($success, $message)
    {
        $this->success = $success;
        $this->message = $message;
    }

    public function toJson($options = 0)
    {
        return json_encode($this);
    }

}