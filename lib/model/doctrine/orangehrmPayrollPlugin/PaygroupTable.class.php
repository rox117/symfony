<?php

/**
 * PaygroupTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PaygroupTable extends PluginPaygroupTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object PaygroupTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Paygroup');
    }
}