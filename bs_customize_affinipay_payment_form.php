<?php
/* Purpose of this script:
 * Customize the Affinipay (LawPay) Payment Pages=
 *  */


/* ACTION HOOKS 
 *
 * */
custom_logs('Found Me'); // Used to determine if the script is loading

add_action( 'affinipay_charge_success', 'bs_affinipay_charge_success', 10, 1 );
function bs_affinipay_charge_success(){
    custom_logs("A payment was processed using the Affinipay Wordpress Plugin");
}

add_action( 'affinipay_charge_error', 'bs_affinipay_charge_error', 10, 1 );
function bs_affinipay_charge_error() {
    custom_logs("There was an error when processing a payment using the Affinipay Wordpress Plugin");
}
