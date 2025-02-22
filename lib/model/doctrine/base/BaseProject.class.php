<?php

/**
 * BaseProject
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $title
 * @property string $lead
 * @property string $contents
 * @property integer $number
 * @property Doctrine_Collection $Comments
 * @property Doctrine_Collection $ProjectComment
 * 
 * @method integer             getId()             Returns the current record's "id" value
 * @method string              getTitle()          Returns the current record's "title" value
 * @method string              getLead()           Returns the current record's "lead" value
 * @method string              getContents()       Returns the current record's "contents" value
 * @method integer             getNumber()         Returns the current record's "number" value
 * @method Doctrine_Collection getComments()       Returns the current record's "Comments" collection
 * @method Doctrine_Collection getProjectComment() Returns the current record's "ProjectComment" collection
 * @method Project             setId()             Sets the current record's "id" value
 * @method Project             setTitle()          Sets the current record's "title" value
 * @method Project             setLead()           Sets the current record's "lead" value
 * @method Project             setContents()       Sets the current record's "contents" value
 * @method Project             setNumber()         Sets the current record's "number" value
 * @method Project             setComments()       Sets the current record's "Comments" collection
 * @method Project             setProjectComment() Sets the current record's "ProjectComment" collection
 * 
 * @package    By examples
 * @subpackage model
 * @author     gajdaw
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProject extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('project');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('title', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));
        $this->hasColumn('lead', 'string', 4096, array(
             'type' => 'string',
             'length' => 4096,
             ));
        $this->hasColumn('contents', 'string', 4096, array(
             'type' => 'string',
             'length' => 4096,
             ));
        $this->hasColumn('number', 'integer', null, array(
             'type' => 'integer',
             ));

        $this->option('orderBy', 'number DESC');
        $this->option('collate', 'utf8_polish_ci');
        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Comment as Comments', array(
             'refClass' => 'ProjectComment',
             'local' => 'project_id',
             'foreign' => 'comment_id'));

        $this->hasMany('ProjectComment', array(
             'local' => 'id',
             'foreign' => 'project_id'));

        $signable0 = new Doctrine_Template_Signable();
        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'unique' => true,
             'fields' => 
             array(
              0 => 'title',
             ),
             'canUpdate' => false,
             ));
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($signable0);
        $this->actAs($sluggable0);
        $this->actAs($timestampable0);
    }
}