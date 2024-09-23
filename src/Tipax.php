<?php

namespace AmirVahedix\Tipax;

use AmirVahedix\Tipax\Exceptions\TipaxAuthException;
use AmirVahedix\Tipax\Exceptions\TipaxException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Tipax
{
    /**
     * @param  int  $origin
     * @param  int  $destination
     * @param  float  $weight
     *
     * @return float|int
     *
     * @throws ConnectionException
     * @throws TipaxAuthException
     * @throws TipaxException
     */
    public function getCost(int $origin, int $destination, float $weight = 0.1): float|int
    {
        $accessToken = $this->authorize();

        $response = Http::withHeaders([
            'Authorization' => $accessToken,
        ])->post('https://omtestapi.tipax.ir/api/OM/v3/Pricing', [
            'packageInputs' => [
                [
                    'origin' => ['cityId' => $origin],
                    'destination' => ['cityId' => $destination],
                    'weight' => $weight,
                ],
            ],
        ]);

        if (! $response->successful()) {
            info('-------TIPAX-------'.$response->json());
            throw new TipaxException($response->json());
        }

        return $this->extractPriceFromResponse($response);
    }

    /**
     * @throws TipaxAuthException
     */
    private function authorize(): string
    {
        $response = Http::post(
            'https://omtestapi.tipax.ir/api/OM/v3/Account/token',
            [
                'username' => config('services.tipax.username'),
                'password' => config('services.tipax.password'),
                'apiKey' => config('services.tipax.apiKey'),
            ]
        );

        if (! $response->successful()) {
            info('-------TIPAX-------'.$response->json());
            throw new TipaxAuthException($response->json());
        }

        return 'Bearer '.$response->json()['accessToken'];
    }

    private function extractPriceFromResponse(Response $response): float
    {
        return floor($response->json()[0]['regularRate']['finalPrice'] / 10);
    }
}
