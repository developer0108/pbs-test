<?php

namespace App\Services;

use App\Models\Order;

class OrderService
{
    public function getOrdersAndCalculateExchangeRates()
    {
        $exchangeService = new ExchangeService();
        $returnOrders = [];
        $ordersWithClients = Order::with("customer")->get()->toArray();
        $countryCodes = $this->getCountryCodesFromOrdersWithClients($ordersWithClients);
        $exchangeRates = $exchangeService->getExchangeRatesForCountryCodes($countryCodes);

        foreach ($ordersWithClients as $order) {
            $returnOrders[] = $this->parseOrder($order, $exchangeRates);
        }

        return $returnOrders;
    }

    private function parseOrder(array $order, array $rates)
    {
        return [
            "clientName" => $order['customer']['full_name'],
            "email" => $order['customer']['email'],
            "customerCurrency" => $rates[$order['customer']['country_code']] * $order['paid'],
            "euroCurrency" => $rates["EUR"] * $order['paid'],
            "date" => $order["ordered"],
        ];
    }

    private function getCountryCodesFromOrdersWithClients(array $ordersWithClients)
    {
        $codes = [];

        foreach ($ordersWithClients as $order) {
            $code = $order['customer']['country_code'];
            if (!in_array($code, $codes)) {
                $codes[] = $code;
            }
        }

        return $codes;
    }
}
