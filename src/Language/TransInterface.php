<?php

namespace KyyTools\Language;

interface TransInterface {

    public function getType(): int;

    /**
     * @param string|array $input
     * @return string|array
     */
    public function cn($input);

    /**
     * @param string|array $input
     * @return string|array
     */
    public function tw($input);
}
