<?php

namespace App\Classes;

use Exception;
use GuzzleHttp\Client;

class GoogleDistance
{
    /** @var string */
    private $apiUrl = 'https://maps.googleapis.com/maps/api/distancematrix/json';

    /** @var string */
    private $apiKey;

    /** @var string */
    private $origins;

    /** @var string */
    private $destinations;

    /**
     * GoogleDistance constructor.
     *
     */
    public function __construct()
    {
        $this->apiKey = env('GOOGLE_API_KEY');
    }

    /**
     * Get API_KEY.
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Get origins.
     *
     * @return string
     */
    public function getOrigins()
    {
        return $this->origins;
    }

    /**
     * Set origins.
     *
     * @param string $origins
     *
     * @return GoogleDistance
     */
    public function setOrigins($origins): self
    {
        $this->origins = $origins;

        return $this;
    }

    /**
     * Get destinations.
     *
     * @return string
     */
    public function getDestinations()
    {
        return $this->destinations;
    }

    /**
     * Set destinations.
     *
     * @param string $destinations
     *
     * @return GoogleDistance
     */
    public function setDestinations($destinations): self
    {
        $this->destinations = $destinations;

        return $this;
    }

    /**
     * Caculate distance from origins to destinations.
     *
     * @param string $origins
     * @param string $destinations
     *
     * @return int
     */
    public function calculate($origins, $destinations): int
    {
        $client = new Client();

        try {
            $response = $client->get($this->apiUrl, [
                'query' => [
                    'units'        => 'imperial',
                    'origins'      => $origins,
                    'destinations' => $destinations,
                    'key'          => $this->getApiKey(),
                    'random'       => random_int(1, 100),
                ],
            ]);

            $statusCode = $response->getStatusCode();

            if (200 === $statusCode) {
                $responseData = json_decode($response->getBody()->getContents());

                if (isset($responseData->rows[0]->elements[0]->distance)) {
                    return $responseData->rows[0]->elements[0]->distance->value;
                }
            }

            return -1;
        } catch (Exception $e) {
            return -1;
        }
    }
}
