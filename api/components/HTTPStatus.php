<?php

namespace MyApp\components;

/**
 * Created by PhpStorm.
 * User: Ankur Garg
 * Date: 28/3/17
 * Time: 3:15 PM
 */
/**
 * Class HTTPStatus
 * @package MyApp\components
 */
class HTTPStatus {
	// [Informational 1xx]
	const HTTP_STATUS_CONTINUE = 100;
	const HTTP_STATUS_SWITCHING_PROTOCOLS = 101;

	// [Successful 2xx]
	const HTTP_STATUS_OK = 200;
	const HTTP_STATUS_CREATED = 201;
	const HTTP_STATUS_ACCEPTED = 202;
	const HTTP_STATUS_NONAUTHORITATIVE_INFORMATION = 203;
	const HTTP_STATUS_NO_CONTENT = 204;
	const HTTP_STATUS_RESET_CONTENT = 205;
	const HTTP_STATUS_PARTIAL_CONTENT = 206;

	// [Redirection 3xx]
	const HTTP_STATUS_MULTIPLE_CHOICES = 300;
	const HTTP_STATUS_MOVED_PERMANENTLY = 301;
	const HTTP_STATUS_FOUND = 302;
	const HTTP_STATUS_SEE_OTHER = 303;
	const HTTP_STATUS_NOT_MODIFIED = 304;
	const HTTP_STATUS_USE_PROXY = 305;
	const HTTP_STATUS_UNUSED = 306;
	const HTTP_STATUS_TEMPORARY_REDIRECT = 307;

	// [Client Error 4xx]
	const HTTP_STATUS_BAD_REQUEST = 400;
	const HTTP_STATUS_UNAUTHORIZED = 401;
	const HTTP_STATUS_PAYMENT_REQUIRED = 402;
	const HTTP_STATUS_FORBIDDEN = 403;
	const HTTP_STATUS_NOT_FOUND = 404;
	const HTTP_STATUS_METHOD_NOT_ALLOWED = 405;
	const HTTP_STATUS_NOT_ACCEPTABLE = 406;
	const HTTP_STATUS_PROXY_AUTHENTICATION_REQUIRED = 407;
	const HTTP_STATUS_REQUEST_TIMEOUT = 408;
	const HTTP_STATUS_CONFLICT = 409;
	const HTTP_STATUS_GONE = 410;
	const HTTP_STATUS_LENGTH_REQUIRED = 411;
	const HTTP_STATUS_PRECONDITION_FAILED = 412;
	const HTTP_STATUS_REQUEST_ENTITY_TOO_LARGE = 413;
	const HTTP_STATUS_REQUEST_URI_TOO_LONG = 414;
	const HTTP_STATUS_UNSUPPORTED_MEDIA_TYPE = 415;
	const HTTP_STATUS_REQUESTED_RANGE_NOT_SATISFIABLE = 416;
	const HTTP_STATUS_EXPECTATION_FAILED = 417;

	// [Server Error 5xx]
	const HTTP_STATUS_INTERNAL_SERVER_ERROR = 500;
	const HTTP_STATUS_NOT_IMPLEMENTED = 501;
	const HTTP_STATUS_BAD_GATEWAY = 502;
	const HTTP_STATUS_SERVICE_UNAVAILABLE = 503;
	const HTTP_STATUS_GATEWAY_TIMEOUT = 504;
	const HTTP_STATUS_VERSION_NOT_SUPPORTED = 505;

	public static function httpMessage() {
		return [
			// [Informational 1xx]
			self::HTTP_STATUS_CONTINUE => '100 Continue',
			self::HTTP_STATUS_SWITCHING_PROTOCOLS => '101 Switching Protocols',
			// [Successful 2xx]
			self::HTTP_STATUS_OK => '200 OK',
			self::HTTP_STATUS_CREATED => '201 Created',
			self::HTTP_STATUS_ACCEPTED => '202 Accepted',
			self::HTTP_STATUS_NONAUTHORITATIVE_INFORMATION => '203 Non-Authoritative Information',
			self::HTTP_STATUS_NO_CONTENT => '204 No Content',
			self::HTTP_STATUS_RESET_CONTENT => '205 Reset Content',
			self::HTTP_STATUS_PARTIAL_CONTENT => '206 Partial Content',
			// [Redirection 3xx]
			self::HTTP_STATUS_MULTIPLE_CHOICES => '300 Multiple Choices',
			self::HTTP_STATUS_MOVED_PERMANENTLY => '301 Moved Permanently',
			self::HTTP_STATUS_FOUND => '302 Found',
			self::HTTP_STATUS_SEE_OTHER => '303 See Other',
			self::HTTP_STATUS_NOT_MODIFIED => '304 Not Modified',
			self::HTTP_STATUS_USE_PROXY => '305 Use Proxy',
			self::HTTP_STATUS_UNUSED => '306 (Unused)',
			self::HTTP_STATUS_TEMPORARY_REDIRECT => '307 Temporary Redirect',
			// [Client Error 4xx]
			self::HTTP_STATUS_BAD_REQUEST => '400 Bad Request',
			self::HTTP_STATUS_UNAUTHORIZED => '401 Unauthorized',
			self::HTTP_STATUS_PAYMENT_REQUIRED => '402 Payment Required',
			self::HTTP_STATUS_FORBIDDEN => '403 Forbidden',
			self::HTTP_STATUS_NOT_FOUND => '404 Not Found',
			self::HTTP_STATUS_METHOD_NOT_ALLOWED => '405 Method Not Allowed',
			self::HTTP_STATUS_NOT_ACCEPTABLE => '406 Not Acceptable',
			self::HTTP_STATUS_PROXY_AUTHENTICATION_REQUIRED => '407 Proxy Authentication Required',
			self::HTTP_STATUS_REQUEST_TIMEOUT => '408 Request Timeout',
			self::HTTP_STATUS_CONFLICT => '409 Conflict',
			self::HTTP_STATUS_GONE => '410 Gone',
			self::HTTP_STATUS_LENGTH_REQUIRED => '411 Length Required',
			self::HTTP_STATUS_PRECONDITION_FAILED => '412 Precondition Failed',
			self::HTTP_STATUS_REQUEST_ENTITY_TOO_LARGE => '413 Request Entity Too Large',
			self::HTTP_STATUS_REQUEST_URI_TOO_LONG => '414 Request-URI Too Long',
			self::HTTP_STATUS_UNSUPPORTED_MEDIA_TYPE => '415 Unsupported Media Type',
			self::HTTP_STATUS_REQUESTED_RANGE_NOT_SATISFIABLE => '416 Requested Range Not Satisfiable',
			self::HTTP_STATUS_EXPECTATION_FAILED => '417 Expectation Failed',
			// [Server Error 5xx]
			self::HTTP_STATUS_INTERNAL_SERVER_ERROR => '500 Internal Server Error',
			self::HTTP_STATUS_NOT_IMPLEMENTED => '501 Not Implemented',
			self::HTTP_STATUS_BAD_GATEWAY => '502 Bad Gateway',
			self::HTTP_STATUS_SERVICE_UNAVAILABLE => '503 Service Unavailable',
			self::HTTP_STATUS_GATEWAY_TIMEOUT => '504 Gateway Timeout',
			self::HTTP_STATUS_VERSION_NOT_SUPPORTED => '505 HTTP Version Not Supported'
		];
	}

	/**
	 * @param $status
	 * @throws HTTPException
	 */
	public static function validateStatus($status) {
		if (!is_int($status)) {
			throw new HTTPException('HTTP Status is not set');
		}

		if (!array_key_exists($status, self::httpMessage())) {
			throw new HTTPException("HTTP Status [$status] is not valid");
		}
	}
}