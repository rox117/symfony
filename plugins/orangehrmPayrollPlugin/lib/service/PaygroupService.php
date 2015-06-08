<?php

/**
* 
*/
class PaygroupService extends BaseService
{
	private $PaygroupDao;
	
	function __construct()
	{
		$this->PaygroupDao=new PaygroupDao;
	}


	public function getPaygroupDao() {
		return $this->PaygroupDao;
	}

	/**
	 *
	 * @param CustomerDao $customerDao 
	 */
	public function setPaygroupDao(PaygroupDao $PaygroupDao) {
		$this->PaygroupDao = $PaygroupDao;
	}
	
	public function getPaygroupByCompany($cname){
		return $this->PaygroupDao->getPaygroupByCompany($cname);
	}
	
	public function getPaygroupList($sortField='company', $sortOrder='ASC'){
		return $this->PaygroupDao->getPaygroupList($sortField, $sortOrder);
	}

	public function getPaygroupById($pid){
		return $this->PaygroupDao->getPaygroupById($pid);
	}
}

?>