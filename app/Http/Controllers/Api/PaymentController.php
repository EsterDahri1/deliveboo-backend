<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use Braintree\Gateway;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function generate(Request $request, Gateway $gateway) {

        // dd($gateway->clientToken());

        $token = $gateway->clientToken()->generate();

        $data = [
            'succes' => true,
            'token' => $token
        ];
        
        
        return response()->json($data, 200);
    }

    public function makePayment(OrderRequest $request, Gateway $gateway) {

        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $data = [
                'succes' => true,
                'message' => 'Transazione eseguita con successo!'
            ];
            return response()->json($data,200);
        } else {

            $data = [
                'succes' => false,
                'message' => 'Transazione fallita!'
            ];

            return response()->json($data,401);
        }
        return 'makePayment';
    }

}
