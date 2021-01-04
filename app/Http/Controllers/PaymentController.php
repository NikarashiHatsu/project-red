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

        if($user->form_order->pricing_id == 4) {
            return "Pembayaran Paket Pengusaha masih dalam pengembangan.";
        }

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

        $ipaymu->addCart(
            [
                'product' => $this->get_product_title($user->form_order),
                'qty' => 1,
                'price' => $this->get_product_price($user->form_order) + 4000,
                'description' => $this->get_product_description($user->form_order),
            ],
        );

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
        FormOrder::where('sid', $_POST['sid'])->update([
            'requested' => 1,
        ]);

        return response()->json([
            'message' => 'Berhasil',
        ]);
    }

    private function get_product_title($form_order)
    {
        switch ($form_order->pricing_id) {
            case 1:
                return "Perintis";
                break;

            case 2:
                return "UMKM";
                break;

            case 3:
                return "Berkembang";
                break;
            
            default:
                return "";
                break;
        }
    }

    private function get_product_price($form_order)
    {
        switch ($form_order->pricing_id) {
            case 1:
                return 500000;
                break;

            case 2:
                return 900000;
                break;

            case 3:
                return 2500000;
                break;
            
            default:
                return "";
                break;
        }
    }

    private function get_product_description($form_order)
    {
        switch ($form_order->pricing_id) {
            case 1:
                return "APK (Aplikasi) Rilis Google Play Jumlah Produk 12 Integrasi WhatsApp.";
                break;

            case 2:
                return "APK (Aplikasi) Rilis Google Play Jumlah Produk 24 Blog Integrasi WhatsApp.";
                break;

            case 3:
                return "APK (Aplikasi) Rilis Google Play Jumlah Produk 52 Blog Self-manage Pembayaran Online Integrasi WhatsApp.";
                break;
            
            default:
                return "";
                break;
        }
    }
}
