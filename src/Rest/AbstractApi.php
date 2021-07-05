<?php
namespace PromptCash\PromptPhpSdk\Rest;


use PromptCash\PromptPhpSdk\Http\AbstractHttpAgent;
use PromptCash\PromptPhpSdk\PromptOptions;

abstract class AbstractApi {
    /** @var PromptOptions */
    protected $options = null;

    /**
     * Shorthand for $this->options->httpAgent
     * Use this object to make API requests calling get() and post().
     * @var AbstractHttpAgent
     */
    protected $http;

    public function __construct(PromptOptions $options) {
        $this->options = $options;
        $this->http = $this->options->httpAgent;
    }

    protected function getApiUrl(string $path): string {
        return sprintf("%s%s", $this->options->promptCashServer, $path);
    }
}