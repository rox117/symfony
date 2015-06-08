<?php
/**
* 
*/
class PaygroupDao extends BaseDao
{
	
	public function getPaygroupById($pid) {

		try {
			return Doctrine :: getTable('Paygroup')->find($pid);
		} catch (Exception $e) {
			throw new DaoException($e->getMessage());
		}
	}

	public function getPaygroupByCompany($cname) {

		try {
			return Doctrine :: getTable('Paygroup')->find($cname);
		} catch (Exception $e) {
			throw new DaoException($e->getMessage());
		}
	}

	public function getPaygroupList($sortField='company', $sortOrder='ASC') {

		$sortField = ($sortField == "") ? 'company' : $sortField;
		$sortOrder = ($sortOrder == "DESC") ? 'DESC' : 'ASC';

		try {
			$q = Doctrine_Query :: create()
				->from('Paygroup')
				->orderBy($sortField . ' ' . $sortOrder);
			return $q->execute();
		} catch (Exception $e) {
			throw new DaoException($e->getMessage());
		}
	}
}
?>