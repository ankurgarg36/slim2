<?php
/**
 * Created by PhpStorm.
 * User: ashima
 * Date: 30/1/17
 * Time: 5:12 PM
 */

namespace MyApp\test;

use MyApp\helpers\Payment;

class PaymentTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @param $flag
	 * @dataProvider providerProcessPaymentInput
	 *
	 * @throws \Exception
	 */
	public function testProcessPaymentReturnsTrueOnSuccessfulPayment($flag)
	{
		$paymentDetails = array(
			'amount'   => 123.99,
			'card_num' => '4111-1111-1111-1111',
			'exp_date' => '03/2013',
		);

		$payment = new Payment();

		$response = new \stdClass();
		$response->approved = $flag;
		$response->transaction_id = 123;
		$response->error_message = 'Payment failed because of undesired behaviour';


		$authorizeNet = $this->getMockBuilder('\AuthorizeNetAIM')
							->setConstructorArgs(array($payment::API_ID, $payment::TRANS_KEY))
							->getMock();


		$authorizeNet = $this->getMockBuilder('\AuthorizeNetAIM')
			->setConstructorArgs(array($payment::API_ID, $payment::TRANS_KEY))
			->getMock();

		$authorizeNet->expects($this->once())
			->method('authorizeAndCapture')
			->will($this->returnValue($response));

		$result = $payment->processPayment($authorizeNet, $paymentDetails);


		$this->assertTrue($result);
	}


	public function providerProcessPaymentInput(){
		return [
			[true],[false]
		];
	}
}
