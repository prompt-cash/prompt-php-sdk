<?php
declare(strict_types=1);
namespace PromptCash\PromptPhpSdk\Tests;

use PHPUnit\Framework\TestCase;
use PromptCash\PromptPhpSdk\Http\WordpressHttpAgent;
use PromptCash\PromptPhpSdk\PromptPhpSdk;
use PromptCash\PromptPhpSdk\Http\BasicHttpAgent;
use PromptCash\PromptPhpSdk\Http\CurlHttpAgent;
use PromptCash\PromptPhpSdk\PromptOptions;

final class UrlShortenerTest extends TestCase {
    // TODO add test functions for each Shortener API call

    protected function getPromptCashForTesting(): PromptPhpSdk {
        $opts = new PromptOptions('test-api-token', 'test-api-secret');
        //$opts->httpAgent = new BasicHttpAgent();
        $opts->httpAgent = new CurlHttpAgent();
        //$opts->httpAgent = new WordpressHttpAgent();
        return new PromptPhpSdk($opts);
    }
}