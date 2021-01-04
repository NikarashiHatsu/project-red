<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use iPaymu\iPaymu;

class PaymentController extends Controller
{
    /**
     * Ipaymu var
     * 
     * @var iPaymu\iPaymu
     */
    private $ipaymu;

    /**
     * uReturn URL
     * 
     * @var string
     */
    private $ureturn;

    /**
     * uNotify URL
     * 
     * @var string
     */
    private $unotify;

    /**
     * uCancel URL
     * 
     * @var string
     */
    private $ucancel;

    /**
     * Constructor
     */
    public function __construct()
    {
        $apiKey = env('IPAYMU_API');
        $va = env('IPAYMU_VA');
        $production = env('IPAYMU_PRODUCTION');

        $this->ipaymu = new iPaymu($apiKey, $va, $production);
        $this->ureturn = route('payment.thank_you');
        $this->unotify = route('payment.unotify');
        $this->ucancel = route('payment.ucancel');
        
        $this->ipaymu->setURL([
            'ureturn' => $this->ureturn,
            'unotify' => $this->unotify,
            'ucancel' => $this->ucancel,
        ]);
    }
    
    /**
     * Do the payment
     */
    public function index()
    {
        $balance = $this->ipaymu->checkBalance();

        return $balance;
    }
}
