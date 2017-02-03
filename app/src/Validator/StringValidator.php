<?php

namespace App\Validator;

class StringValidator
{
    /**
     * @param $data
     *
     * @return bool
     */
    public static function validate($data)
    {
        $data = strip_tags($data);

        if (is_string($data) && preg_match("`^([a-zéèàùûêâôë])(?:[\s\'-]?(?1))*$`i", $data)) {
            return true;
        }

        return false;
    }
}
