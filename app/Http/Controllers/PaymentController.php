<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use iPaymu\iPaymu;

class PaymentController extends Controller
{   
    /**
     * Do the payment
     */
    public function index()
    {
        $apiKey = env('IPAYMU_API');
        $va = env('IPAYMU_VA');
        $production = env('IPAYMU_PRODUCTION');
        
        $ipaymu = new iPaymu($apiKey, $va, $production);

        $ipaymu->setURL([
            'ureturn' => route('payment.ureturn'),
            'unotify' => route('payment.unotify'),
            'ucancel' => route('payment.ucancel'),
        ]);

        $ipaymu->setBuyer([
            'name' => 'Aghits Nidallah',
            'phone' => '081208120812',
            'email' => 'yourlovelydev@gmail.com',
        ]);

        $ipaymu->setCOD([
            'deliveryArea' => null,
            'deliveryAddress' => null,
        ]);

        $ipaymu->addCart([
            'product' => 'BWI App Store Paket Perintis',
            'qty' => 1,
            'price' => 500000,
            'description' => 'Lorem',
        ]);

        $redirect_payment = $ipaymu->redirectPayment();

        // dd($ipaymu);

    }
    
    public function ureturn()
    {
        return "ureturn";
    }

    public function unotify()
    {
        return "unotify";
    }

    public function ucancel()
    {
        return "ucancel";
    }
}
