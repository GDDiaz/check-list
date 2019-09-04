<?php

/**
 * checkList actions.
 *
 * @package    check-list
 * @subpackage checkList
 * @author     Your name here
 * @version    SVN: $Id$
 */
class checkListActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->check_lists = Doctrine_Core::getTable('CheckList')->createQuery('a');
    $this->pager = new sfDoctrinePager('CheckList', sfConfig::get('app_max_per_page'));
    $this->pager->setQuery($this->check_lists);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->check_list = Doctrine_Core::getTable('CheckList')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->check_list);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CheckListForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CheckListForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($check_list = Doctrine_Core::getTable('CheckList')->find(array($request->getParameter('id'))), sprintf('Object check_list does not exist (%s).', $request->getParameter('id')));
    $this->form = new CheckListForm($check_list);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($check_list = Doctrine_Core::getTable('CheckList')->find(array($request->getParameter('id'))), sprintf('Object check_list does not exist (%s).', $request->getParameter('id')));
    $this->form = new CheckListForm($check_list);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($check_list = Doctrine_Core::getTable('CheckList')->find(array($request->getParameter('id'))), sprintf('Object check_list does not exist (%s).', $request->getParameter('id')));
    $check_list->delete();

    $this->redirect('checkList/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $check_list = $form->save();

      $this->redirect('checkList/edit?id='.$check_list->getId());
    }
  }

  //---------------- NEW ACTIONS TO CRITERIA MANAGEMENT -------------------------------//

  public function executeNewCriterion(sfWebRequest $request)
  {
      $this->title = 'New Criterion';
    $this->form = new CriteriaForm();

    if($request->isMethod(sfRequest::POST)) {
      $this->processFormCriteria($request, $this->form);
    }
  }

  public function executeEditCriterion(sfWebRequest $request)
  {
      $this->title = 'Edit Criterion';
      $this->forward404Unless($criterion = Doctrine_Core::getTable('Criteria')->find(array($request->getParameter('id'))), sprintf('Object criterion does not exist (%s).', $request->getParameter('id')));
      $this->form = new CriteriaForm($criterion);
      if ($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT)) {
          $this->processFormCriteria($request, $this->form);
      }

      $this->setTemplate('newCriterion');
  }

    public function executeDeleteCriterion(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $this->forward404Unless($criterion = Doctrine_Core::getTable('Criteria')->find(array($request->getParameter('id'))), sprintf('Object criterion does not exist (%s).', $request->getParameter('id')));
        $criterion->delete();

        $this->redirect('checkList/index');
    }

   protected function processFormCriteria(sfWebRequest $request, sfForm $form)
   {
     $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
     if ($form->isValid()) {
         $criterion = $form->save();
         $this->redirect('checkList/editCriterion?id='.$criterion->getId());
     }
   }
}
