<?php

declare(strict_types=1);

namespace SharpAPI\EcommerceProductCategories;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use SharpAPI\Core\Client\SharpApiClient;

/**
 * @api
 */
class EcommerceProductCategoriesService extends SharpApiClient
{
    /**
     * Initializes a new instance of the class.
     *
     * @throws InvalidArgumentException if the API key is empty.
     */
    public function __construct()
    {
        parent::__construct(config('sharpapi-ecommerce-product-categories.api_key'));
        $this->setApiBaseUrl(
            config(
                'sharpapi-ecommerce-product-categories.base_url',
                'https://sharpapi.com/api/v1'
            )
        );
        $this->setApiJobStatusPollingInterval(
            (int) config(
                'sharpapi-ecommerce-product-categories.api_job_status_polling_interval',
                5)
        );
        $this->setApiJobStatusPollingWait(
            (int) config(
                'sharpapi-ecommerce-product-categories.api_job_status_polling_wait',
                180)
        );
        $this->setUseCustomInterval(
            (bool) config(
                'sharpapi-ecommerce-product-categories.api_job_status_use_polling_interval',
                false)
        );
        $this->setUserAgent('SharpAPILaravelEcommerceProductCategories/1.0.0');
    }

    /**
     * Generates a list of suitable categories for the product with relevance weights as a float value (1.0-10.0)
     * where 10 equals 100%, the highest relevance score. Provide the product name and its parameters
     * to get the best category matches possible. Comes in handy with populating
     * product catalogue data and bulk products' processing.
     *
     * @throws GuzzleException
     *
     * @api
     */
    public function productCategories(
        string $productName,
        ?string $language = null,
        ?int $maxQuantity = null,
        ?string $voiceTone = null,
        ?string $context = null
    ): string {
        $response = $this->makeRequest(
            'POST',
            '/ecommerce/product_categories',
            [
                'content' => $productName,
                'language' => $language,
                'max_quantity' => $maxQuantity,
                'voice_tone' => $voiceTone,
                'context' => $context,
            ]);

        return $this->parseStatusUrl($response);
    }
}
