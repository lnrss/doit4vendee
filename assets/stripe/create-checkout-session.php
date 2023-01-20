<?php
session_start();
use Slim\Http\Request;
use Slim\Http\Response;
use Stripe\Stripe;

require 'vendor/autoload.php';

$app = new \Slim\App;

$app->add(function ($request, $response, $next) {
  \Stripe\Stripe::setApiKey('live_wxPbQsgjWdS8uQpyupnKQyfjcC6gBW');
  return $next($request, $response);
});

$app->post('/create-checkout-session', function (Request $request, Response $response) {
  $session = \Stripe\Checkout\Session::create([
    'customer_email' => $_SESSION['email'],
    'billing_address_collection' => 'required',
    'shipping_address_collection' => [
      'allowed_countries' => ['FR'],
    ],
    'payment_method_types' => ['card'],
    'line_items' => [[
      'price_data' => [
        'currency' => 'eur',
        'product_data' => [
          'name' => $_POST['idc'],
        ],
        'unit_amount' => $_POST['price'],
      ],
      'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'https://doit4vendee.fr/orderDetail',
    'cancel_url' => 'https://doit4vendee.fr/bag',
  ]);

  return $response->withHeader('Location', $session->url)->withStatus(303);
});

$app->run();