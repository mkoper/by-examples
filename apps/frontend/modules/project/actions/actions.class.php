<?php

/**
 * project actions.
 *
 * @package    symfony-1-4-social-startup
 * @subpackage project
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class projectActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
/*
    $this->projects = Doctrine_Core::getTable('Project')
      ->createQuery('a')
      ->execute();
*/

    $this->pager = new sfDoctrinePager('Project', sfConfig::get('app_pager_project_max_na_stronie'));
    $this->pager->setQuery(Doctrine_Core::getTable('Project')->createQuery('a'));
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();


  }

  public function executeShow(sfWebRequest $request)
  {
    $this->project = Doctrine_Core::getTable('Project')->findOneBySlug($request->getParameter('slug'));
    $this->forward404Unless($this->project);

    $this->form = new CommentForm();
    $this->form->getWidget('project')->setDefault($this->project->getId());
//    $this->form->setOptions(array('a' => 'b'));

/*
    $this->form->setWidget('project', new sfWidgetFormInputHidden());
    $this->form->getWidget('project')->setDefault($this->project->getId());

    $this->form->setValidator['project'] = new sfValidatorNumber();
*/



/*

$v = $this->form->getValidators();


echo '<pre>';
var_dump($v);
echo '</pre>';
exit();
*/

//    unset(
//        $this->form['example'],
//        $this->form['hint']
//    );

  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ProjectForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ProjectForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($project = Doctrine_Core::getTable('Project')->find(array($request->getParameter('id'))), sprintf('Object project does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProjectForm($project);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($project = Doctrine_Core::getTable('Project')->find(array($request->getParameter('id'))), sprintf('Object project does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProjectForm($project);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($project = Doctrine_Core::getTable('Project')->find(array($request->getParameter('id'))), sprintf('Object project does not exist (%s).', $request->getParameter('id')));
    $project->delete();

    $this->redirect('project/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $project = $form->save();

      $this->redirect('project/edit?id='.$project->getId());
    }
  }
}
