<?php

namespace Snowdog\Academy\Command;

use Exception;
use Snowdog\Academy\Core\Migration;
use Snowdog\Academy\Model\CryptocurrencyManager;
use Symfony\Component\Console\Output\OutputInterface;

class UpdatePrices
{
    private CryptocurrencyManager $cryptocurrencyManager;

    public function __construct(CryptocurrencyManager $cryptocurrencyManager)
    {
        $this->cryptocurrencyManager = $cryptocurrencyManager;
    }

    public function __invoke(OutputInterface $output)
    {
        try {

            $url = 'https://api.coincap.io/v2/assets';

            $cURL = curl_init();

            curl_setopt($cURL, CURLOPT_URL, $url);
            curl_setopt($cURL, CURLOPT_HTTPGET, true);
            curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($cURL, CURLOPT_ENCODING, '');
            curl_setopt($cURL, CURLOPT_TIMEOUT, 0);
            curl_setopt($cURL, CURLOPT_FAILONERROR, true);

            curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Accept: application/json'
            ));

            $result = curl_exec($cURL);

            if(curl_errno($cURL)){
                throw new Exception(curl_error($cURL));
            }
                $response = json_decode($result);

                foreach ($response->data as $currency) {
                    $this->cryptocurrencyManager->updatePrice($currency->id, round($currency->priceUsd, 2));
                }

                $output->writeln('Updated prices');

        } catch(Exception $e){
            $output->writeln('Not updated prices. Message: '.$e->getMessage());
        }finally {
            curl_close($cURL);
        }

    }
}
