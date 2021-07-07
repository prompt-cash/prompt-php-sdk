<?php
declare(strict_types=1);
namespace PromptCash\PromptPhpSdk\Tests;

use PHPUnit\Framework\TestCase;
use PromptCash\PromptPhpSdk\Http\WordpressHttpAgent;
use PromptCash\PromptPhpSdk\PromptPhpSdk;
use PromptCash\PromptPhpSdk\Http\BasicHttpAgent;
use PromptCash\PromptPhpSdk\Http\CurlHttpAgent;
use PromptCash\PromptPhpSdk\PromptOptions;
use PromptCash\PromptPhpSdk\Rest\Request\PaymentReq;

final class PaymentTest extends TestCase {
    public function testCreatePayment(): void {
        $promptCash = $this->getPromptCashForTesting();

        $createPaymentReq = new PaymentReq();
        $payment = $promptCash->getPayment()->CreateNewPayment($createPaymentReq); // TODO add parameter oobject from Rest/Request/CreatePaymentReq.php
        // // TODO validate properties of $payment using $this->assertXXX($payment->foo, "expected value", "error message")
        $this->assertGreaterThan(0.0, 55, "number must be greater than 0");
    }

    public function testGetSinglePayment(): void {
        // TODO make call and check respoonse using $this->assertXXX()
        $this->assertEquals(true, true, "ToDo replace with a real test");
    }

    public function testGetPaymentList(): void {
        // TODO make call and check respoonse using $this->assertXXX()
        $this->assertEquals(true, true, "ToDo replace with a real test");
    }

    protected function getPromptCashForTesting(): PromptPhpSdk {
        // keys loaded from config file: https://phpunit.readthedocs.io/en/9.5/configuration.html#the-env-element
        $opts = new PromptOptions($_ENV['API_TOKEN'], $_ENV['API_SECRET']);
        //$opts->httpAgent = new BasicHttpAgent();
        $opts->httpAgent = new CurlHttpAgent();
        //$opts->httpAgent = new WordpressHttpAgent();
        return new PromptPhpSdk($opts);
    }
}