<?php
namespace PromptCash\PromptPhpSdk\Rest;

use PromptCash\PromptPhpSdk\PromptOptions;

/**
 * All URL shortener specific API functions.
 * @package PromptCash\PromptPhpSdk\Rest
 */
class UrlShortener extends AbstractApi {
    public function __construct(PromptOptions $options) {
        parent::__construct($options);
    }

    // TODO implement all shortener functions similar to Payment.php
    // https://prompt.cash/pub/docs/#url-shortener
}