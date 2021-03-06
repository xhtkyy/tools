<?php

namespace KyyTools\Language;

use App\Languages\Language;
use Illuminate\Support\Facades\Lang;
use KyyTools\Constants\TransClass;
use KyyTools\Constants\TransType;
use KyyTools\Language\src\MatchTrans;
use KyyTools\Language\src\OpenCCTrans;

class Translate {

    /**
     * @var TransInterface
     */
    protected $translator;

    public function __construct() {
        if (function_exists("opencc_open")) {
            $this->translator = new OpenCCTrans();
        } else {
            $this->translator = new MatchTrans();
        }
    }

    private function getLocale($type = null) {
        if (!$type) {
            $type = Lang::getLocale(); //从全局获取
            if (strstr($type, "zh-")) {
                $type = strtolower(explode("-", $type)[1] ?? "tw");
            }
        } else if (is_int($type)) {
            $type = strtolower(TransType::key($type));
        }
        return $type;
    }

    /**
     * @param string|array|object $input
     * @param string|int|null $type
     * @return string|array
     */
    public function trans($input, $type = null) {
        $type = $this->getLocale($type);
        if (method_exists($this->translator, $type)) {
            return call_user_func([$this->translator, $type], $input);
        }
        return $input;
    }

    /**
     * 转繁体
     * @param string|array|object $input
     * @return string|array
     */
    public function trans2tw($input) {
        if (method_exists($this->translator, TransType::ZH_TW)) {
            return call_user_func([$this->translator, TransType::ZH_TW], $input);
        }
        return $input;
    }

    /**
     * 转简体
     * @param string|array|object $input
     * @return string|array
     */
    public function trans2cn($input) {
        if (method_exists($this->translator, TransType::ZH_CN)) {
            return call_user_func([$this->translator, TransType::ZH_CN], $input);
        }
        return $input;
    }

    /**
     * 获取转化类
     * @param int|null $class
     * @return TransInterface
     */
    public function getTranslator(int $class = null): TransInterface {
        if (!$class || $class == $this->translator->getType()) {
            return $this->translator;
        }
        switch ($class) {
            case TransClass::OPENCC:
                return new OpenCCTrans();
            default:
                return new MatchTrans();
        }
    }

}
