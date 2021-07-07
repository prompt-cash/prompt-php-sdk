<?php
namespace PromptCash\PromptPhpSdk\Http;


/**
 * This class has to be implemented for HTTP requests.
 * You should implement it with the default (best) available HTTP method in your framework, 
 * such as GuzzleHttp, cURL, wp_remote_get(),...
 *
 */
abstract class AbstractHttpAgent {
	/** @var callable */
	protected static $loggerFn = null;

    /** @var int */
	protected $timeoutSec = 10;
    /** @var int */
	protected $maxRedirects = 5;
    /** @var string */
	protected $userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0";

    /**
     * An array of key-value paris of custom HTTP headers to be sent to the server.
     * @var array
     */
	protected $headers = array();
	
	/**
	 * Create the HTTP agent.
	 * @param callable $loggerFn
	 * @param array $options Set defaults for additional options (depending on the specific HTTP implementation) valid: timeout|userAgent|maxRedirects|headers
	 */
	public function __construct(callable $loggerFn = null, array $options = array()) {
		static::$loggerFn = $loggerFn;
		if (isset($options['timeout']))
			$this->timeoutSec = $options['timeout'];
		if (isset($options['maxRedirects']))
			$this->maxRedirects = $options['maxRedirects'];
		if (isset($options['userAgent']))
			$this->userAgent = $options['userAgent'];
        if (isset($options['headers']) && is_array($options['headers']) === true)
            $this->headers = $options['headers'];
	}
	
	/**
	 * Perform a HTTP GET request.
	 * @param string $url The full URL string (including possible query params).
	 * @param array $options additional options (depending on the specific HTTP implementation) valid: timeout|userAgent|maxRedirects|headers
	 * @return string|bool The response body or false on failure.
	 */
	public abstract function get(string $url, array $options = array());
	
	/**
	 * Perform a HTTP POST request with Content-Type "application/json".
	 * @param string $url The full URL string (including possible query params).
	 * @param array $data The post data as string key-value pairs (not encoded).
	 * @param array $options additional options (depending on the specific HTTP implementation) valid: timeout|userAgent|maxRedirects|headers
	 * @return string|bool The response body or false on failure.
	 */
	public abstract function post(string $url, array $data = array(), array $options = array());

    /**
     * Sets headers for all HTTP requests (use this for headers such as authorization token).
     * @param array $headers key-value pairs of headers
     */
	public function setHeaders(array $headers): void {
	    $this->headers = $headers;
    }

    /**
     * Return the currently configured headers.
     * @return array assoc array of key-value pairs of headers.
     */
    public function getHeaders(): array {
	    return $this->headers;
    }
	
	protected function logError(string $subject, $error, $data = null): void {
		if (static::$loggerFn !== null)
			call_user_func(static::$loggerFn, $subject, $error, $data);
		else {
			$output = "$subject<br>\n<pre>" . print_r($error, true) . "</pre><br>\n";
			if ($data !== null)
				$output .= "<pre>" . print_r($data, true) . "</pre><br>\n";
			echo $output;
		}
	}

    /**
     * Return the default headers configured when creating this HTTP agent.
     * @return string[]
     */
	protected function getDefaultHeaders(): array {
	    // TODO better move these to another config so this HTTP agent can be used without REST APIs too
	    return array_merge(array(
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Cache-Control' => 'no-cache,max-age=0',
        ), $this->headers);
    }

    /**
     * Return an indexed array of headers.
     * @param array $options the options passed into get() or post().
     * @return array
     */
    protected function getHttpHeaderList(array $options): array {
        $headers = $this->getDefaultHeaders();
        if (isset($options['headers']))
            $headers = array_merge($headers, $options['headers']);
        $headerList = array();
        foreach ($headers as $key => $value) {
            $headerList[] = sprintf("%s: %s", strtolower($key), $value);
        }
        return $headerList;
    }
}
?>