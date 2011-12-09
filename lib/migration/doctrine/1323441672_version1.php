<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version1 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->dropTable('article');
        $this->createTable('comments', array(
             'id' => 
             array(
              'type' => 'integer',
              'primary' => '1',
              'autoincrement' => '1',
              'length' => '8',
             ),
             'contents' => 
             array(
              'type' => 'string',
              'length' => '4096',
             ),
             'created_by' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             'updated_by' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             'created_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             'updated_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             ), array(
             'type' => 'InnoDB',
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_polish_ci',
             'charset' => 'utf8',
             ));
        $this->createTable('example_has_comment', array(
             'example_id' => 
             array(
              'type' => 'integer',
              'primary' => '1',
              'length' => '8',
             ),
             'comment_id' => 
             array(
              'type' => 'integer',
              'primary' => '1',
              'length' => '8',
             ),
             ), array(
             'primary' => 
             array(
              0 => 'example_id',
              1 => 'comment_id',
             ),
             ));
    }

    public function down()
    {
        $this->createTable('article', array(
             'id' => 
             array(
              'type' => 'integer',
              'primary' => '1',
              'autoincrement' => '1',
              'length' => '8',
             ),
             'title' => 
             array(
              'type' => 'string',
              'length' => '128',
             ),
             'lead' => 
             array(
              'type' => 'string',
              'length' => '4096',
             ),
             'contents' => 
             array(
              'type' => 'string',
              'length' => '4096',
             ),
             'created_by' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             'updated_by' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             'slug' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             'created_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             'updated_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             ), array(
             'type' => 'InnoDB',
             'indexes' => 
             array(
              'article_sluggable' => 
              array(
              'fields' => 
              array(
               0 => 'slug',
              ),
              'type' => 'unique',
              ),
             ),
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_polish_ci',
             'charset' => 'utf8',
             ));
        $this->dropTable('comments');
        $this->dropTable('example_has_comment');
    }
}