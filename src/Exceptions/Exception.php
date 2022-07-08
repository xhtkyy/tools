<?php

namespace KyyTools\Exceptions;

use Illuminate\Contracts\Support\Arrayable;

class Exception extends \Exception implements Arrayable {
    public function toArray() {
        return [
            "code"    => $this->getCode(),
            "message" => $this->getMessage(),
            "line"    => $this->getFile() . ":" . $this->getLine()
        ];
    }
}