<?php

namespace KyyTools\Language\src;

use Illuminate\Contracts\Support\Arrayable;
use KyyTools\Constants\TransClass;
use KyyTools\Language\TransInterface;

class OpenCCTrans implements TransInterface {


    public function cn($input) {
        return $this->convert("hk2s.json", $input);
    }

    public function tw($input) {
        return $this->convert("s2tw.json", $input);
    }

    /**
     *
     * @param $json
     * @param $input
     * @return mixed
     */
    private function convert($json, $input) {
        if (!function_exists("opencc_open") || !function_exists("opencc_convert") || !function_exists("opencc_close")) {
            return $input;
        }
        $od = opencc_open($json);
        if (is_string($input)) {
            $input = opencc_convert($input, $od);
            opencc_close($od);
            return $input;
        }
        array_walk_recursive($input, function (&$value) use ($od) {
            if ($value instanceof Arrayable) {
                $value = $value->toArray();
            }
            if (is_string($value)) {
                $value = opencc_convert($value, $od);
            }
        });
        opencc_close($od);
        return $input;
    }

    public function getType(): int {
        return TransClass::OPENCC;
    }
}
