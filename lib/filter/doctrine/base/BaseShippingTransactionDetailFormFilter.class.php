<?php

/**
 * ShippingTransactionDetail filter form base class.
 *
 * @package    primal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseShippingTransactionDetailFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'shipping_transaction_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ShippingTransaction'), 'add_empty' => true)),
      'barcode'                 => new sfWidgetFormFilterInput(),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'shipping_transaction_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ShippingTransaction'), 'column' => 'id')),
      'barcode'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('shipping_transaction_detail_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShippingTransactionDetail';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'shipping_transaction_id' => 'ForeignKey',
      'barcode'                 => 'Number',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
    );
  }
}
