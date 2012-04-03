<?php

/**
 * ShippingTransaction form.
 *
 * @package    primal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ShippingTransactionForm extends BaseShippingTransactionForm
{
  public function configure()
  {
      $this->unsetTimestampable();

      if(!$this->getCurrentUser()->isSuperAdmin()) {
          $this->setDefault('staff_id',Staff::loggedIn());
      }
      

  }
}
