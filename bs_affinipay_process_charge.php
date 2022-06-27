<?php
/* Purpose of this script:
 * Process Affinipay (LawPay) Charge
 *  */

write_log('Adding AffiniPAY hook');
try {
    $affinipay = 'vendor/affinipay/chargeio-php/lib/ChargeIO.php';
    write_log('AffiniPAY PATH:'.AFFINIPAY_WP_PLUGIN_URL);
    write_log('AffiniPAY PATH:'.AFFINIPAY_WP_PLUGIN_URL.$affinipay);

    include(AFFINIPAY_WP_PLUGIN_URL . $affinipay);
    if(!@include(AFFINIPAY_WP_PLUGIN_URL.$affinipay)) throw new Exception("Failed to include 'script.php'");

} catch (Exception $err) {
    write_log(''.$err->getMessage());
}


function bs_process_lawpay_charge($entry, $form) {
//logs


// CODE TAKEN FROM lawpay-process-payment.php
write_log('Generating Payment Credentials');
try {
  ChargeIO::setCredentials(new ChargeIO_Credentials('m_3whw3TfSQzi6AHYNJ-i31A', 'sv3L9ceGSDWFqsc9kzQMEQ23BQrwGC8iu5EXeVU67hrXGEHcvY68LiDm81d1ltVw'));
} catch (Exception $err) {
    write_log(''.$err->getMessage());
  }

  //------------------------------------------------------------------------------
  // These lines are no longer needed, were used prior to generate the card token.
  //------------------------------------------------------------------------------
  //$card = new ChargeIO_Card(array('number' => '4242424242424242', 'exp_month' => 10, 'exp_year' => '2024'));
  //$charge = ChargeIO_Charge::create($card, 100);

  // Use the following to extract the data from the gravity form. This will create a charge to affinipay for process.ing
  write_log('Generating Payment Charge');
  try{
    $amount = 100;                                //$_POST['amount'];
    $token_id = rgar( $entry, 'input_43_23') ;    //$_POST['token_id'];
    $charge = ChargeIO_Charge::create(new ChargeIO_PaymentMethodReference(array('id' => $token_id)), $amount);

    write_log('Generated Payment Credentials');

  } catch (Exception $err) {
    $errors = array();
    write_log(''.$err->getMessage());

    foreach ($err as $error) {    
        write_log('Content: '.$error.content);
    }
  }
}

add_action( 'gform_after_submission_43', 'bs_process_lawpay_charge', 10, 2 );
