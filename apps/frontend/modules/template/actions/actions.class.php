<?php

/**
 * template actions.
 *
 * @package    check-list
 * @subpackage template
 * @author     Your name here
 * @version    SVN: $Id$
 */
class templateActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->templates = Doctrine_Core::getTable('Template')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->template = Doctrine_Core::getTable('Template')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->template);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TemplateForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TemplateForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($template = Doctrine_Core::getTable('Template')->find(array($request->getParameter('id'))), sprintf('Object template does not exist (%s).', $request->getParameter('id')));
    $this->form = new TemplateForm($template);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($template = Doctrine_Core::getTable('Template')->find(array($request->getParameter('id'))), sprintf('Object template does not exist (%s).', $request->getParameter('id')));
    $this->form = new TemplateForm($template);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($template = Doctrine_Core::getTable('Template')->find(array($request->getParameter('id'))), sprintf('Object template does not exist (%s).', $request->getParameter('id')));
    $template->delete();

    $this->redirect('template/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $template = $form->save();

      $this->redirect('template/edit?id='.$template->getId());
    }
  }

    //---------------- NEW ACTIONS TO CRITERIA MANAGEMENT -------------------------------//

    public function executeNewCriterion(sfWebRequest $request)
    {
        $this->title = 'New Criterion';
        $this->form = new StandardForm();

        if($request->isMethod(sfRequest::POST)) {
            $this->processFormCriteria($request, $this->form);
        }
    }

    public function executeEditCriterion(sfWebRequest $request)
    {
        $this->title = 'Edit Criterion';
        $this->forward404Unless($criterion = Doctrine_Core::getTable('Standard')->find(array($request->getParameter('id'))), sprintf('Object criterion does not exist (%s).', $request->getParameter('id')));
        $this->form = new StandardForm($criterion);
        if ($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT)) {
            $this->processFormCriteria($request, $this->form);
        }

        $this->setTemplate('newCriterion');
    }

    public function executeDeleteCriterion(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $this->forward404Unless($criterion = Doctrine_Core::getTable('Standard')->find(array($request->getParameter('id'))), sprintf('Object criterion does not exist (%s).', $request->getParameter('id')));
        $criterion->delete();

        $this->redirect('template/index');
    }

    protected function processFormCriteria(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $criterion = $form->save();
            $this->redirect('template/editCriterion?id='.$criterion->getId());
        }
    }
}
