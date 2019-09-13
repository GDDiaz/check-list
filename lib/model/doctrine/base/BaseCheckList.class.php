<?php

/**
 * BaseCheckList
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property int                                    $id                                           Type: integer, primary key
 * @property string                                 $name                                         Type: string(255)
 * @property string                                 $observations                                 Type: clob
 * @property string                                 $reference                                    Type: string(255)
 * @property int                                    $template_id                                  Type: integer
 * @property int                                    $responsible_id                               Type: integer
 * @property int                                    $original_threshold                           Type: integer
 * @property float                                  $assessment                                   Type: float
 * @property bool                                   $status                                       Type: boolean, default "1"
 * @property string                                 $version_at                                   Type: timestamp, Timestamp in ISO-8601 format (YYYY-MM-DD HH:MI:SS)
 * @property Template                               $Template                                     
 * @property sfGuardUser                            $Responsible                                  
 * @property Doctrine_Collection|CheckedStandard[]  $CheckedStandards                             
 * @property Doctrine_Collection|Assessments[]      $Assessments                                  
 *  
 * @method int                                      getId()                                       Type: integer, primary key
 * @method string                                   getName()                                     Type: string(255)
 * @method string                                   getObservations()                             Type: clob
 * @method string                                   getReference()                                Type: string(255)
 * @method int                                      getTemplateId()                               Type: integer
 * @method int                                      getResponsibleId()                            Type: integer
 * @method int                                      getOriginalThreshold()                        Type: integer
 * @method float                                    getAssessment()                               Type: float
 * @method bool                                     getStatus()                                   Type: boolean, default "1"
 * @method string                                   getVersionAt()                                Type: timestamp, Timestamp in ISO-8601 format (YYYY-MM-DD HH:MI:SS)
 * @method Template                                 getTemplate()                                 
 * @method sfGuardUser                              getResponsible()                              
 * @method Doctrine_Collection|CheckedStandard[]    getCheckedStandards()                         
 * @method Doctrine_Collection|Assessments[]        getAssessments()                              
 *  
 * @method CheckList                                setId(int $val)                               Type: integer, primary key
 * @method CheckList                                setName(string $val)                          Type: string(255)
 * @method CheckList                                setObservations(string $val)                  Type: clob
 * @method CheckList                                setReference(string $val)                     Type: string(255)
 * @method CheckList                                setTemplateId(int $val)                       Type: integer
 * @method CheckList                                setResponsibleId(int $val)                    Type: integer
 * @method CheckList                                setOriginalThreshold(int $val)                Type: integer
 * @method CheckList                                setAssessment(float $val)                     Type: float
 * @method CheckList                                setStatus(bool $val)                          Type: boolean, default "1"
 * @method CheckList                                setVersionAt(string $val)                     Type: timestamp, Timestamp in ISO-8601 format (YYYY-MM-DD HH:MI:SS)
 * @method CheckList                                setTemplate(Template $val)                    
 * @method CheckList                                setResponsible(sfGuardUser $val)              
 * @method CheckList                                setCheckedStandards(Doctrine_Collection $val) 
 * @method CheckList                                setAssessments(Doctrine_Collection $val)      
 *  
 * @package    check-list
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCheckList extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('check_list');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('observations', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('reference', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('template_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('responsible_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('original_threshold', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('assessment', 'float', null, array(
             'type' => 'float',
             ));
        $this->hasColumn('status', 'boolean', null, array(
             'type' => 'boolean',
             'default' => true,
             'notnull' => true,
             ));
        $this->hasColumn('version_at', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Template', array(
             'local' => 'template_id',
             'foreign' => 'id'));

        $this->hasOne('sfGuardUser as Responsible', array(
             'local' => 'responsible_id',
             'foreign' => 'id'));

        $this->hasMany('CheckedStandard as CheckedStandards', array(
             'local' => 'id',
             'foreign' => 'checklist_id'));

        $this->hasMany('Assessments', array(
             'local' => 'id',
             'foreign' => 'checklist_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}