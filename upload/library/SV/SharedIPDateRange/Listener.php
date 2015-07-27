<?php

class SV_SharedIPDateRange_Listener
{
    public static function load_class($class, &$extend)
    {
        $extend[] = 'SV_SharedIPDateRange_' . $class;
    }
}
