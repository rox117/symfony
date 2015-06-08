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
class PaygroupForm extends sfForm {

    private $Paygroupid;
    private $PaygroupService;

    public function configure() {


        $this->setWidgets(array(
            'Company' => new sfWidgetFormInputText(),
            'Py_paygroup'=>new sfWidgetFormInputText(),
            'Description'=>new sfWidgetFormInputText(),
            'Paygroupid'=>new sfWidgetFormInputHidden(),

        ));

       

        $this->setValidators(array(
            'Company'=> new sfValidatorString(array('required'=>false,'max_length' => 30)),
            'Py_paygroup'=> new sfValidatorString(array('required'=>false,'max_length' => 30)),
            'Description'=> new sfValidatorString(array('required'=>false,'max_length' => 30)),
            'Paygroupid'=> new sfValidatorString(array('required'=>false,'max_length' => 30)),
        ));
        $this->widgetSchema->setNameFormat('addPaygroup[%s]');
    }

    public function save() {
        $company = $this->getValue('Company');
        $py_paygroup=$this->getValue('Py_paygroup');
        $description = $this->getValue('Description');
        $paygroupid=$this->getValue('Paygroupid');
        if (!empty($paygroupid)) {
            $paygroup=$this->getPaygroupService()->getPaygroupById($paygroupid);

        }
        else{
            $paygroup=new Paygroup();
        }
        $paygroup->setCompany($this->getValue('Company'));
        $paygroup->setPy_paygroup($this->getValue('Py_paygroup'));
        $paygroup->setDescription($this->getValue('Description'));
        $paygroup->save();
        return $paygroup->getId();
    }

        public function getPaygroupListAsJson() {
        
        $list = array();
        $paygroups = $this->getPaygroupService()->getPaygroupList();
        foreach ($paygroups as $paygroup) {
            $list[] = array('id' => $paygroup->getId(), 'company' => $paygroup->getCompany());
        }
        return json_encode($list);
    }
        public function getPaygroupService() {
        if (is_null($this->PaygroupServiceService)) {
            $this->PaygroupServiceService = new PaygroupService();
            $this->PaygroupServiceService->setPaygroupDao(new PaygroupDao());
        }
        return $this->PaygroupServiceService;
    }

}

?>
