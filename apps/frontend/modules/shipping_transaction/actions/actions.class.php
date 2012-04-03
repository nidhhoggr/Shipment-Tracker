<?php

/**
 * shipping_transaction actions.
 *
 * @package    primal
 * @subpackage shipping_transaction
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class shipping_transactionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    if($this->getUser()->isAdmin()) {

      $q = Doctrine_Core::getTable('ShippingTransaction')
        ->createQuery('a');
    }
    else {
      $q = Doctrine_Query::create()
                                     ->from('ShippingTransaction s')
                                     ->where('s.staff_id = ?',$this->getUser()->getStaffId())
                                     ->orWhere('s.isactive = ?', true);

    }

        $this->shipping_transactions = $q->execute();
  }

  public function executeSearch(sfWebRequest $request) {
      $barcode = $request->getParameter('barcode');

      if($barcode) {

        $q = Doctrine_Query::create()
        ->from('ShippingTransactionDetail d')
        ->leftJoin('d.ShippingTransaction s')
        ->where('d.barcode = ?', $barcode); 

        $this->shipping_transaction = $q->execute()->getFirst()->ShippingTransaction;

        if(!$this->shipping_transaction)
            $this->redirect('shipping_transaction/index');

        $this->shipping_transaction_details = ShippingTransactionDetail::getByShippingTransactionId($this->shipping_transaction->id);

      }
      else {
          $this->redirect('shipping_transaction/index');
      }
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->shipping_transaction = Doctrine_Core::getTable('ShippingTransaction')->find(array($request->getParameter('id')));
    $this->shipping_transaction_details = ShippingTransactionDetail::getByShippingTransactionId($request->getParameter('id'));
    $this->forward404Unless($this->shipping_transaction);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ShippingTransactionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ShippingTransactionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($shipping_transaction = Doctrine_Core::getTable('ShippingTransaction')->find(array($request->getParameter('id'))), sprintf('Object shipping_transaction does not exist (%s).', $request->getParameter('id')));

    $this->isEntitled($shipping_transaction);

    $this->form = new ShippingTransactionForm($shipping_transaction);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($shipping_transaction = Doctrine_Core::getTable('ShippingTransaction')->find(array($request->getParameter('id'))), sprintf('Object shipping_transaction does not exist (%s).', $request->getParameter('id')));
    $this->form = new ShippingTransactionForm($shipping_transaction);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($shipping_transaction = Doctrine_Core::getTable('ShippingTransaction')->find(array($request->getParameter('id'))), sprintf('Object shipping_transaction does not exist (%s).', $request->getParameter('id')));

    $this->isEntitled($shipping_transaction);

    if($shipping_transaction->getIsActive())
        $this->redirect($this->getRequest()->getReferer());

    $shipping_transaction->delete();

    $this->redirect('shipping_transaction/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $shipping_transaction = $form->save();

      $this->redirect('shipping_transaction/edit?id='.$shipping_transaction->getId());
    }
  }

  private function isEntitled($shipping_transaction) {
    if($shipping_transaction->getStaff()->getUser()->getId() != $this->getUser()->getId())
        $this->redirect($this->getRequest()->getReferer());
  }

}
