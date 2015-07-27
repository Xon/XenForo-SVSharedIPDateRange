<?php

class SV_SharedIPDateRange_XenForo_ControllerPublic_Member extends XFCP_SV_SharedIPDateRange_XenForo_ControllerPublic_Member
{
    public function actionSharedIps()
    {
        $userId = $this->_input->filterSingle('user_id', XenForo_Input::UINT);
        $user = $this->getHelper('UserProfile')->getUserOrError($userId);

        if (!$this->_getUserModel()->canViewIps())
        {
            return $this->responseNoPermission();
        }

        /** @var XenForo_Model_Ip $ipModel */
        $ipModel = $this->getModelFromCache('XenForo_Model_Ip');
        $users = $ipModel->getSharedIpUsers($user['user_id'], XenForo_Application::get('options')->spamCheckIpsDaysLimit);

        $viewParams = array(
            'profileUser' => $user,
            'users' => $users,
        );

        return $this->responseView(
            'XenForo_ViewPublic_Member_SharedIps',
            'member_shared_ips',
            $viewParams
        );
    }
}





