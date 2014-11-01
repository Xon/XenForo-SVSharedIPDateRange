<?php

class SV_SharedIPDateRange_Listener
{
    public static function load_class($class, &$extend)
    {
        switch ($class)
        {
            case 'XenForo_Model_User':
                $extend[] = 'SV_SharedIPDateRange_XenForo_ControllerPublic_Member';
        }
    }
}
