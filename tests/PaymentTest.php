<?php
declare(strict_types=1);
namespace PromptCash\PromptPhpSdk\Tests;

use PHPUnit\Framework\TestCase;
use PromptCash\PromptPhpSdk\Http\WordpressHttpAgent;
use PromptCash\PromptPhpSdk\PromptPhpSdk;
use PromptCash\PromptPhpSdk\Http\BasicHttpAgent;
use PromptCash\PromptPhpSdk\Http\CurlHttpAgent;
use PromptCash\PromptPhpSdk\PromptOptions;

final class PaymentTest extends TestCase {
    public function testCreatePayment(): void {
        $promptCash = $this->getPromptCashForTesting();
        $payment = $promptCash->getPayment()->CreateNewPayment(); // TODO add parameter oobject from Rest/Request/CreatePaymentReq.php
        // // TODO validate properties of $payment using $this->assertXXX($payment->foo, "expected value", "error message")
        $this->assertGreaterThan(0.0, 55, "number must be greater than 0");
    }

    public function testGetSinglePayment(): void {
        // TODO make call and check respoonse using $this->assertXXX()
    }

    public function testGetPaymentList(): void {
        // TODO make call and check respoonse using $this->assertXXX()
    }

    protected function getPromptCashForTesting(): PromptPhpSdk {
        $opts = new PromptOptions('test-api-token', 'test-api-secret');
        //$opts->httpAgent = new BasicHttpAgent();
        $opts->httpAgent = new CurlHttpAgent();
        //$opts->httpAgent = new WordpressHttpAgent();
        return new PromptPhpSdk($opts);
    }
}