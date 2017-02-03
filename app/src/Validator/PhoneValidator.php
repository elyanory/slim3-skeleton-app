<?php

namespace App\Validator;

class PhoneValidator
{
    /**
     * @param $data
     *
     * @return bool
     */
    public static function validate($data)
    {
        $data = strip_tags($data);

        if (is_string($data) && preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $data)) {
            return true;
        }

        return false;
    }
}
