<?php

/**
 * BasePaygroup
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $company
 * @property string $py_paygroup
 * @property string $description
 * @property integer $id
 * 
 * @method string   getCompany()     Returns the current record's "company" value
 * @method string   getPyPaygroup()  Returns the current record's "py_paygroup" value
 * @method string   getDescription() Returns the current record's "description" value
 * @method integer  getId()          Returns the current record's "id" value
 * @method Paygroup setCompany()     Sets the current record's "company" value
 * @method Paygroup setPyPaygroup()  Sets the current record's "py_paygroup" value
 * @method Paygroup setDescription() Sets the current record's "description" value
 * @method Paygroup setId()          Sets the current record's "id" value
 * 
 * @package    orangehrm
 * @subpackage model\payroll\base
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePaygroup extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('py_paygroup');
        $this->hasColumn('company', 'string', 30, array(
             'type' => 'string',
             'primary' => false,
             'autoincrement' => false,
             'length' => 30,
             ));
        $this->hasColumn('py_paygroup', 'string', 15, array(
             'type' => 'string',
             'primary' => false,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('description', 'string', 40, array(
             'type' => 'string',
             'primary' => false,
             'autoincrement' => false,
             'length' => 40,
             ));
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}