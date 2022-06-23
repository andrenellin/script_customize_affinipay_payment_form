<?php
/* Purpose of this script:
 * Customize the Affinipay (LawPay) Payment Pages=
 *  */


add_action( 'affinipay_charge_success', 'bs_affinipay_charge_success', 10, $chargeInfo );
function bs_affinipay_charge_success(){
    custom_logs("A payment was processed using the Affinipay Wordpress Plugin");
    custom_logs($chargeInfo);
}

add_action( 'affinipay_charge_error', 'bs_affinipay_charge_error', 10, $chargeInfo );
function bs_affinipay_charge_errpr() {
    custom_logs("There was an error when processing a payment using the Affinipay Wordpress Plugin");
    custom_logs($chargeInfo);
}
