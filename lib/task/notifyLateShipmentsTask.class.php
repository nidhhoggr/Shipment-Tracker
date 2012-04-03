<?php

class notifyLateShipmentsTask extends sfBaseTask {

    public function configure() {
        $this->namespace = 'notify';
        $this->name      = 'late-shipments';
    }

    public function execute($arguments = array(), $options = array()) {
        $databaseManager = new sfDatabaseManager($this->configuration);
        $connection = $databaseManager->getDatabase('doctrine')->getConnection();
        $late_shipments = ShippingTransaction::getLateShipments();

         $this->log('executing job...');

         foreach($late_shipments as $ls) {
          $user = $ls->getStaff()->getUser();
          $user_email = $user->getEmailAddress();

          mail(
               $user_email,
               "$ls is overdue",
      <<<EOF
Hello {$user}

{$ls} was expected on {$ls->expected_date}

You can access {$ls} with the link below

http://clonedparts.com/primal/web/frontend_dev.php/shipping_transaction/show?id={$ls->id}

EOF
,   'From: webmaster@primal-innovations.com' . "\r\n" .
    'Reply-To: webmaster@primal-innovations.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion()

              );
        }
    }

}
