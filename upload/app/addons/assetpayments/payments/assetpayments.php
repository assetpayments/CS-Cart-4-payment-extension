<?php
/***************************************************************************
*                                                                          *
*   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
*                                                                          *
* This  is  commercial  software,  only  users  who have purchased a valid *
* license  and  accept  to the terms of the  License Agreement can install *
* and use this program.                                                    *
*                                                                          *
****************************************************************************
* PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
* "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
****************************************************************************/

if (defined('PAYMENT_NOTIFICATION')) {
    
	fn_print_r("Please wait. Your payment is processing!");
	
	$Result = $_REQUEST['Result'];
	$order_id = $_REQUEST['OrderId'];	

	if($Result == 'success') {
		$pp_response['order_status'] = 'P';
		$pp_response['reason_text'] = ' - Payment approved!';
		fn_print_r("Payment successful");
	}else {
		$pp_response['order_status'] = 'O';
		$pp_response['reason_text'] = ' - Payment failed!';
		fn_print_r("Payment failed");
	}    
        fn_update_order_payment_info($order_id,$pp_response);
        fn_change_order_status($order_id,$pp_response['order_status'],'',false);		
		fn_order_placement_routines('route',$order_id);
	
} else {

    $order_id = $order_info['order_id'];
	$return_url = fn_url("payment_notification.notify?payment=assetpayments&order_id=$order_id", AREA, 'current');
	$callback_url = fn_url("payment_notification.notify?payment=assetpayments&order_id=$order_id", AREA, 'current');

    fn_update_order_payment_info($order_id, array('awaiting_callback' => false));
	
	//****Signature generation****//
		$key = mb_strtolower($processor_data['processor_params']['assetpayments_merchant_id']);
		$secret = mb_strtolower($processor_data['processor_params']['assetpayments_secret_key']);
		$transactionId = $order_id;		
		$requestSign =$key.':'.$transactionId.':'.strtoupper($secret);
		$sign = hash_hmac('md5',$requestSign,$secret);

    //****Required variables****//	
		$option['TemplateId'] = $processor_data['processor_params']['assetpayments_template_id'];
		$option['CustomMerchantInfo'] = $sign;
		$option['MerchantInternalOrderId'] = $order_id;
		$option['StatusURL'] = $callback_url;	
		$option['ReturnURL'] = $return_url;
		$option['AssetPaymentsKey'] = $processor_data['processor_params']['assetpayments_merchant_id'];
		$option['Amount'] = number_format($order_info['total'], 2, '.', '');	
		$option['Currency'] = CART_PRIMARY_CURRENCY;
		$option['CountryISO'] = $order_info['s_country'];
		$option['IpAddress'] = $order_info['ip_address'];
		
		//****Customer data and address****//
		$option['FirstName'] = $order_info['b_firstname'];
		$option['LastName'] = $order_info['b_lastname'];
        $option['Email'] = $order_info['email'];
        $option['Phone'] = $order_info['phone'];
        $option['Address'] = $order_info['b_address'] . ', ' . $order_info['b_city']. ', ' . $order_info['b_zipcode']. ', ' . $order_info['b_state']. ', ' . $order_info['b_country'];
        $option['City'] = $order_info['b_city'];
        $option['ZIP'] = $order_info['b_zipcode'];
        $option['Region'] = $order_info['b_state'];
        $option['Country'] = $order_info['b_country'];

		$data = base64_encode( json_encode($option) );		
		$request['data'] = $data;
		
		fn_create_payment_form('https://assetpayments.us/checkout/pay', $request, 'assetpayments', false);
}
exit;
?>