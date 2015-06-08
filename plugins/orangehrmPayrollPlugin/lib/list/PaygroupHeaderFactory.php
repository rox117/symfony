<?php

class PaygroupHeaderFactory extends ohrmListConfigurationFactory {

	protected function init() {

		$header1 = new ListHeader();
		$header2 = new ListHeader();
		
		$header1->populateFromArray(array(
		    'name' => 'Pay Group',
		    'width' => '49%',
		    'isSortable' => true,
		    'sortField' => 'company',
		    'elementType' => 'link',
		    'elementProperty' => array(
			'labelGetter' => 'getCompany',
			'placeholderGetters' => array('id' => 'getId'),
			'urlPattern' => 'payroll?paygroupid={id}'),
		));


		

		$this->headers = array($header1);
	}
	
	public function getClassName() {
		return 'Paygroup';
	}

}

?>
