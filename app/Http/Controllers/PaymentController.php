<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FormOrder;
use App\Http\Controllers\FormOrderController;
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
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->with('form_order')->firstOrFail();
        $apiKey = env('IPAYMU_API');
        $va = env('IPAYMU_VA');
        $production = env('IPAYMU_PRODUCTION');
        
        $ipaymu = new iPaymu($apiKey, $va, $production);

        $ipaymu->setURL([
            'ureturn' => route('dashboard'),
            'unotify' => route('payment.unotify'),
            'ucancel' => route('dashboard'),
        ]);

        $ipaymu->setBuyer([
            'name' => $user->name,
            'phone' => $user->form_order->whatsapp_number,
            'email' => $user->email,
        ]);

        $ipaymu->addCart([
            'product' => 'BWI App Store Paket Perintis',
            'qty' => 1,
            'price' => 500000,
            'description' => 'Lorem',
        ]);

        $redirect_payment = $ipaymu->redirectPayment();

        if($redirect_payment['Status'] == 401) {
            return "Telah terjadi error pada Gateway Pembayaran. Coba beberapa saat lagi, atau hubungi pengembang aplikasi tentang hal ini.";
        } else {
            FormOrder::where('user_id', $user->id)->update([
                'sid' => $redirect_payment['Data']['SessionID']
            ]);

            echo "<script>window.location.href = '" . $redirect_payment['Data']['Url'] . "';</script>";
        }
    }

    public function unotify()
    {
        $form_order = FormOrder::where('sid', $_POST['sid'])->update([
            'requested' => 1,
        ]);

        return response()->json([
            'message' => 'Berhasil',
        ]);
    }
}
