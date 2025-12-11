<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function home() {
        $orderService = new OrderService();
        $orders = $orderService->getOrdersAndCalculateExchangeRates();
        return view("home", ["orders" => $orders]);
    }





}
