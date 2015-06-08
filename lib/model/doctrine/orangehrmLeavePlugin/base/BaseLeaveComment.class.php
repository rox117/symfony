<?php

/**
 * BaseLeaveComment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $leave_id
 * @property datetime $created
 * @property string $created_by_name
 * @property integer $created_by_id
 * @property integer $created_by_emp_number
 * @property string $comments
 * @property Employee $Employee
 * @property SystemUser $SystemUser
 * @property Leave $Leave
 * 
 * @method integer      getId()                    Returns the current record's "id" value
 * @method integer      getLeaveId()               Returns the current record's "leave_id" value
 * @method datetime     getCreated()               Returns the current record's "created" value
 * @method string       getCreatedByName()         Returns the current record's "created_by_name" value
 * @method integer      getCreatedById()           Returns the current record's "created_by_id" value
 * @method integer      getCreatedByEmpNumber()    Returns the current record's "created_by_emp_number" value
 * @method string       getComments()              Returns the current record's "comments" value
 * @method Employee     getEmployee()              Returns the current record's "Employee" value
 * @method SystemUser   getSystemUser()            Returns the current record's "SystemUser" value
 * @method Leave        getLeave()                 Returns the current record's "Leave" value
 * @method LeaveComment setId()                    Sets the current record's "id" value
 * @method LeaveComment setLeaveId()               Sets the current record's "leave_id" value
 * @method LeaveComment setCreated()               Sets the current record's "created" value
 * @method LeaveComment setCreatedByName()         Sets the current record's "created_by_name" value
 * @method LeaveComment setCreatedById()           Sets the current record's "created_by_id" value
 * @method LeaveComment setCreatedByEmpNumber()    Sets the current record's "created_by_emp_number" value
 * @method LeaveComment setComments()              Sets the current record's "comments" value
 * @method LeaveComment setEmployee()              Sets the current record's "Employee" value
 * @method LeaveComment setSystemUser()            Sets the current record's "SystemUser" value
 * @method LeaveComment setLeave()                 Sets the current record's "Leave" value
 * 
 * @package    orangehrm
 * @subpackage model\leave\base
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseLeaveComment extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ohrm_leave_comment');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('leave_id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('created', 'datetime', null, array(
             'type' => 'datetime',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('created_by_name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('created_by_id', 'integer', 10, array(
             'type' => 'integer',
             'notnull' => false,
             'length' => 10,
             ));
        $this->hasColumn('created_by_emp_number', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => false,
             'length' => 4,
             ));
        $this->hasColumn('comments', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Employee', array(
             'local' => 'created_by_emp_number',
             'foreign' => 'emp_number'));

        $this->hasOne('SystemUser', array(
             'local' => 'created_by_id',
             'foreign' => 'id'));

        $this->hasOne('Leave', array(
             'local' => 'leave_id',
             'foreign' => 'id'));
    }
}