<?php

/**
 * ShippingTransactionDetail form base class.
 *
 * @method ShippingTransactionDetail getObject() Returns the current form's model object
 *
 * @package    primal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseShippingTransactionDetailForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'shipping_transaction_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ShippingTransaction'), 'add_empty' => false)),
      'barcode'                 => new sfWidgetFormInputText(),
      'created_at'              => new sfWidgetFormDateTime(),
      'updated_at'              => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'shipping_transaction_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ShippingTransaction'))),
      'barcode'                 => new sfValidatorString(array('max_length' => 32)),
      'created_at'              => new sfValidatorDateTime(),
      'updated_at'              => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('shipping_transaction_detail[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShippingTransactionDetail';
  }

}
