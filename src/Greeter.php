<?php
/**
 * Created by PhpStorm.
 * User: valentin
 * Date: 3/02/18
 * Time: 10:40
 */

namespace Kata;


class Greeter
{
    const UNKNOWN_FRIEND   = 'my friend';
    const SALUTATION       = "Hello, %s.";
    const SHOUT_SALUTATION = "HELLO %s!";

    /**
     * @param $name
     * @return string
     */
    public function greet($name): string
    {
        return sprintf($this->getSalutation($name), $this->getSaluted($name));
    }

    /**
     * @param $name
     * @return string
     */
    private function getSalutation($name): string
    {
        return ctype_upper($name) ? self::SHOUT_SALUTATION : self::SALUTATION;
    }

    /**
     * @param $name
     * @return string
     */
    private function getSaluted($name): string
    {
        if (is_array($name)) {
            if (sizeof($name) < 3) {
                $name = implode(' and ', $name);
            } else {
                $lastName = array_pop($name);
                $name     = implode(', ', $name);
                $name    .= ', and ' . $lastName;
            }
        }

        return $name ?? self::UNKNOWN_FRIEND;
    }

}