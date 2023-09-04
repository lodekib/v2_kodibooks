<?php


namespace App\Services;

use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Exception\MissingParameterException;
use Exception;

class CardService
{

    public static function cardStripe($data, $expiry_month, $expiry_year)
    {

        $response = [];

        try {

            $stripe =  Stripe::setApiKey('sk_test_51N7z89BCFagXYH8Q40tI18uiGI4PljroDZ1j77jYvMYdQE5BdvL19KpqrfkxSS28DulhsqXnShuud6u0mi9dhvgz00leCQ5g0L');

            $token = $stripe->tokens()->create([
                'card' => [
                    'number' => $data['card_number'],
                    'exp_month' => $expiry_month,
                    'exp_year' => $expiry_year,
                    'cvc' => $data['cvc']
                ]
            ]);


            if (!isset($token['id'])) {
                $response =   [
                    'message' => 'Invalid card details .',
                    'status' => false,
                ];
            }

            $charge = $stripe->charges()->create([
                'card' => $token['id'],
                'currency' => 'KES',
                'amount' => 100,
                'description' => 'wallet'
            ]);

            if ($charge['status'] == 'succeeded') {

                $response =   [
                    'message' => 'Card details verified successfully .',
                    'status' => true,
                ];

                return  $response;
            }
        } catch (Exception $ex) {
            return  [
                'message' => $ex->getMessage(),
                'status' => false,
            ];
        } catch (CardErrorException $error) {
            return [
                'message' => $error->getMessage(),
                'status' =>false
            ];
        } catch (MissingParameterException $error) {
            return [
                'message' => $error->getMessage(),
                'status' => false
            ];
        }
    }
}
