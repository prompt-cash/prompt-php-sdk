<?php
namespace PromptCash\PromptPhpSdk\Rest;

use PromptCash\PromptPhpSdk\PromptOptions;
use PromptCash\PromptPhpSdk\Rest\Response\PaymentRes;

/**
 * All Payment specific API functions.
 * @package PromptCash\PromptPhpSdk\Rest
 */
class Payment extends AbstractApi {
    public function __construct(PromptOptions $options) {
        parent::__construct($options);
    }

    public function CreateNewPayment(): PaymentRes {
        // TODO implement this https://prompt.cash/pub/docs/#create-a-new-payment
        // example
        $url = $this->getApiUrl("create-payment");
        $data = array(
            'tx_id' => '1234',
            // TODO
            // 1. create a parameter object in CreatePaymentReq in Request folder
            // 2. read those parameters and put them here for REST API
        );
        $res = $this->http->post($url, $data);
        print_r($res);
        return new PaymentRes();
    }

    public function GetPayment(): PaymentRes {
        // TODO implement this https://prompt.cash/pub/docs/#get-a-single-payment
    }

    public function GetPaymentList(): array {
        // TODO implement this https://prompt.cash/pub/docs/#get-a-list-of-payments
    }
}