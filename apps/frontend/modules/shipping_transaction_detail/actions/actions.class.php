<?php

/**
 * shipping_transaction_detail actions.
 *
 * @package    primal
 * @subpackage shipping_transaction_detail
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class shipping_transaction_detailActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {

    if($this->getUser()->isSuperAdmin()) {
    $this->shipping_transaction_details = Doctrine_Core::getTable('ShippingTransactionDetail')
      ->createQuery('a')
      ->execute();
    }
    else {

      $shipping_transactions = Doctrine_Query::create()
                                     ->select('s.id')
                                     ->from('ShippingTransaction s')
                                     ->where('s.staff_id = ?',$this->getUser()->getStaffId())
                                     ->orWhere('s.isactive = ?', true)
                                     ->execute()->toArray();

      foreach($shipping_transactions as $st) 
        $ids[] = $st['id'];

      $this->shipping_transaction_details = Doctrine_Query::create()
                                            ->from('ShippingTransactionDetail d')
                                            ->whereIn('d.shipping_transaction_id',$ids)
                                            ->execute(); 
    }
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->shipping_transaction_detail = Doctrine_Core::getTable('ShippingTransactionDetail')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->shipping_transaction_detail);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ShippingTransactionDetailForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ShippingTransactionDetailForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {

    $this->forward404Unless($shipping_transaction_detail = Doctrine_Core::getTable('ShippingTransactionDetail')->find(array($request->getParameter('id'))), sprintf('Object shipping_transaction_detail does not exist (%s).', $request->getParameter('id')));
  

    $this->isEntitled($shipping_transaction_detail);

    $this->form = new ShippingTransactionDetailForm($shipping_transaction_detail);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($shipping_transaction_detail = Doctrine_Core::getTable('ShippingTransactionDetail')->find(array($request->getParameter('id'))), sprintf('Object shipping_transaction_detail does not exist (%s).', $request->getParameter('id')));
    $this->form = new ShippingTransactionDetailForm($shipping_transaction_detail);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($shipping_transaction_detail = Doctrine_Core::getTable('ShippingTransactionDetail')->find(array($request->getParameter('id'))), sprintf('Object shipping_transaction_detail does not exist (%s).', $request->getParameter('id')));

    $this->isEntitled($shipping_transaction_detail);

    $shipping_transaction_detail->delete();

    $this->redirect('shipping_transaction_detail/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $shipping_transaction_detail = $form->save();

      $this->redirect('shipping_transaction_detail/edit?id='.$shipping_transaction_detail->getId());
    }
  }

  private function isEntitled($shipping_transaction_detail) {
    if($shipping_transaction_detail->getShippingTransaction()->getStaff()->getUser()->getId() != $this->getUser()->getId())
        $this->redirect($this->getRequest()->getReferer());
  }
}
