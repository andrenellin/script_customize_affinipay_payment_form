<?php
/* Purpose of this script:
 * Customize the Affinipay (LawPay) Payment Pages=
 *  */


/* ACTION HOOKS 
 *
 * */
 write_log( 'Begin loading line 10' );

add_action( 'affinipay_charge_success', 'bs_affinipay_charge_success', 10, 1 );
function bs_affinipay_charge_success($charge){
    write_log( 'Affinipay Charge Successful.' );
    write_log( $charge );
}

add_action( 'affinipay_charge_error', 'bs_affinipay_charge_error', 10, 1 );
function bs_affinipay_charge_error($charge) {
    write_log( 'Affinipay Charge Error.' );
    write_log( $charge );
}
 write_log( 'Finished loading line 23' );
