<?php

/**
 * BasesfGuardRememberKey
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property int                 $user_id                    Type: integer
 * @property string              $remember_key               Type: string(32)
 * @property string              $ip_address                 Type: string(50)
 * @property sfGuardUser         $User                       
 *  
 * @method int                   getUserId()                 Type: integer
 * @method string                getRememberKey()            Type: string(32)
 * @method string                getIpAddress()              Type: string(50)
 * @method sfGuardUser           getUser()                   
 *  
 * @method sfGuardRememberKey    setUserId(int $val)         Type: integer
 * @method sfGuardRememberKey    setRememberKey(string $val) Type: string(32)
 * @method sfGuardRememberKey    setIpAddress(string $val)   Type: string(50)
 * @method sfGuardRememberKey    setUser(sfGuardUser $val)   
 *  
 * @package    check-list
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasesfGuardRememberKey extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_remember_key');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('remember_key', 'string', 32, array(
             'type' => 'string',
             'length' => 32,
             ));
        $this->hasColumn('ip_address', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));

        $this->option('symfony', array(
             'form' => false,
             'filter' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}