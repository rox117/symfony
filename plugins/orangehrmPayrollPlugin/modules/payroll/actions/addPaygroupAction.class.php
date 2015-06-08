<?php

/**
 * OrangeHRM is a comprehensive Human Resource Management (HRM) System that captures
 * all the essential functionalities required for any enterprise.
 * Copyright (C) 2006 OrangeHRM Inc., http://www.orangehrm.com
 *
 * OrangeHRM is free software; you can redistribute it and/or modify it under the terms of
 * the GNU General Public License as published by the Free Software Foundation; either
 * version 2 of the License, or (at your option) any later version.
 *
 * OrangeHRM is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program;
 * if not, write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor,
 * Boston, MA  02110-1301, USA
 */
class addPaygroupAction extends baseAdminAction {

    /**
     * @param sfForm $form
     * @return
     */
    public function setForm(sfForm $form) {
        if (is_null($this->form)) {
            $this->form = $form;
        }
    }

    public function getPaygroupService() {
        if (is_null($this->PaygroupService)) {
            $this->PaygroupService = new PaygroupService();
            $this->PaygroupService->setPayGradeDao(new PayGradeDao());
        }
        return $this->PaygroupService;
    }

    public function execute($request) {

        /* For highlighting corresponding menu item */
        $request->setParameter('initialActionName', 'viewPayGrades');

        $usrObj = $this->getUser()->getAttribute('user');

        $this->PaygroupPermissions = $this->getDataGroupPermissions('Paygroup');

        $this->paygroupid = $request->getParameter('paygroupid');
        
        if (!empty($this->paygroupid)) {
            $this->title = $this->PaygroupPermissions->canUpdate() ? __('Edit Pay Grade') : ('View Pay Grade');
        } else {
            $this->title = __("Add Pay Group");
        }
        $values = array('paygroupid' => $this->paygroupid, 'PaygroupPermissions' => $this->PaygroupPermissions);

        $this->setForm(new PaygroupForm(array(), $values));

        if ($this->getUser()->hasFlash('templateMessage')) {
            list($this->messageType, $this->message) = $this->getUser()->getFlash('templateMessage');
        }

        if ($request->isMethod('post')) {
            if ($this->PaygroupPermissions->canCreate() || $this->PaygroupPermissions->canUpdate()) {
                $this->form->bind($request->getParameter($this->form->getName()));
                if ($this->form->isValid()) {
                    $paygroupid = $this->form->save();
                    $this->getUser()->setFlash('Paygroup.success', __(TopLevelMessages::SAVE_SUCCESS));
                    $this->redirect('payroll/addPaygroup?paygroupid=' . $paygroupid);
                }
            }
        } else {
            // check permissions
            if ((empty($this->paygroupid) && !$this->PaygroupPermissions->canCreate()) 
                    || (!empty($this->paygroupid) && !$this->PaygroupPermissions->canRead())) {
                $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
            }             
        }
    }

}

?>
