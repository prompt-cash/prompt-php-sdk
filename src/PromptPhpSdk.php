<?php
namespace PromptCash\PromptPhpSdk;

use PromptCash\PromptPhpSdk\Rest\Payment;
use PromptCash\PromptPhpSdk\Http\BasicHttpAgent;
use PromptCash\PromptPhpSdk\Rest\UrlShortener;

/**
 * The main interface class to interact with this library.
 *
 */
class PromptPhpSdk {
    /** @var PromptOptions */
    protected $options = null;

    /** @var Payment */
    protected $payment = null;

    /** @var UrlShortener */
    protected $urlShortener = null;

    /**
     * Create the main API class.
     * @param PromptOptions $options
     */
    public function __construct(PromptOptions $options) {
        //if ($options === null)
            //$options = new PromptOptions();
        // TODO add public & secret API token to PromptOptions and require them to be present. throw exception otherwise

        $this->options = $options;
        if ($this->options->httpAgent === null) {
            $this->options->httpAgent = new BasicHttpAgent(null, array(
                'timeout' => $this->options->httpTimeoutSec,
            ));
        }
        $this->options->httpAgent->setHeaders(array(
            'Authorization' => $this->options->secretToken,
        ));

        $this->payment = new Payment($this->options);
        $this->urlShortener = new UrlShortener($this->options);
    }

    /**
     * Return the Payment API object
     * @return Payment
     */
    public function getPayment(): Payment {
        return $this->payment;
    }

    /**
     * Return the URL Shortener API object
     * @return UrlShortener
     */
    public function getUrlShortener(): UrlShortener {
        return $this->urlShortener;
    }
}