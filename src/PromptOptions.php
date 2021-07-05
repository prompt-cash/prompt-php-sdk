<?php
namespace PromptCash\PromptPhpSdk;

/**
 * Configuration options for the library.
 *
 */
class PromptOptions {
    /**
     * Public API token from your account.
     * @var string
     */
    public $publicApiToken = '';

    /**
     * Secret token from your account.
     * @var string
     */
    public $secretToken = '';

    /**
     * The HTTP implementation used to make HTTP requests.
     * Values: BasicHttpAgent|CurlHttpAgent|WordpressHttpAgent
     * Defaults to BasicHttpAgent, but you should use a better one according to your PHP setup.
     * @var AbstractHttpAgent
     */
    public $httpAgent = null;


    // ===== ADVANCED OPTIONS =====

    /**
     * The timeout for HTTP requests to the REST API backend.
     * @var int
     */
    public $httpTimeoutSec = 10;

    /**
     * The URL of the Prompt.Cash backend to make API calls. You should not change this unless you are developing.
     * @var string
     */
    public $promptCashServer = "https://prompt.cash/api/v1/";

    /**
     * Creates options to connect to the Prompt.Cash REST API.
     * The tokens can be obtained from your account page: https://prompt.cash/account
     * @param string $apiPublicToken
     * @param string $apiSecret
     */
    public function __construct(string $apiPublicToken, string $apiSecret) {
        $this->publicApiToken = $apiPublicToken;
        $this->secretToken = $apiSecret;
    }
}