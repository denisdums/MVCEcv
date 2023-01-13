<?php

namespace routes\base;

class Middleware
{
    static function Add(array $condition, $callback): void
    {
        if (!call_user_func_array([$condition[0],$condition[1]], [])) {
            return;
        }

        if (is_callable($callback)) {
            $callback();
        }else {
            call_user_func_array($callback[0], $callback[1]);
        }
    }
}
