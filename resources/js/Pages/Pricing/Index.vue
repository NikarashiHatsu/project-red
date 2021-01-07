<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pricing
            </h2>
        </template>

        <div class="py-12">
            <div class="px-5 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <section class="bg-white text-gray-700 body-font overflow-hidden p-6 rounded-lg shadow-lg">
                    <div class="bg-yellow-200 border border-yellow-300 p-4 mb-4 rounded-md text-yellow-800">
                        <i class="fas fa-exclamation-triangle mr-2 text-yellow-800"></i>Pembayaran akan dilakukan pada saat pengajuan.
                    </div>
                    <div class="flex flex-wrap">
                        <div class="lg:w-1/5 mt-48 hidden lg:block">
                            <div class="mt-px border-t border-gray-300 border-b border-l rounded-tl-lg rounded-bl-lg overflow-hidden">
                                <p class="bg-gray-100 text-gray-900 h-12 text-center px-4 flex items-center justify-start -mt-px">1 APK (Aplikasi)</p>
                                <p class="text-gray-900 h-12 text-center px-4 flex items-center justify-start">Rilis Google Play</p>
                                <p class="bg-gray-100 text-gray-900 h-12 text-center px-4 flex items-center justify-start">Jumlah Produk</p>
                                <p class="text-gray-900 h-12 text-center px-4 flex items-center justify-start">Blog</p>
                                <p class="bg-gray-100 text-gray-900 h-12 text-center px-4 flex items-center justify-start">Hosting & Domain (1Y)</p>
                                <p class="text-gray-900 h-12 text-center px-4 flex items-center justify-start">Self-manage</p>
                                <p class="bg-gray-100 text-gray-900 h-12 text-center px-4 flex items-center justify-start">Pembayaran Online</p>
                                <p class="text-gray-900 h-12 text-center px-4 flex items-center justify-start">Integrasi WhatsApp</p>
                                <p class="bg-gray-100 text-gray-900 h-12 text-center px-4 flex items-center justify-start">Transaksi Penjualan</p>
                                <p class="text-gray-900 h-12 text-center px-4 flex items-center justify-start">Integrasi Aposerba</p>
                                <p class="bg-gray-100 text-gray-900 h-12 text-center px-4 flex items-center justify-start">Integrasi Ad Mob</p>
                            </div>
                        </div>
                        <div class="flex lg:w-4/5 w-full flex-wrap lg:border border-gray-300 rounded-t-lg rounded-r-lg">
                            <pricing
                                :pricingTitle="'PERINTIS'"
                                :pricingName="'Rp 500.000,-'"
                                :pricingAdditionalInfo="'Untuk Pengusaha Kecil'"
                                :pricingData="paketA" />
                            <pricing
                                :pricingTitle="'UMKM'"
                                :pricingName="'Rp 900.000,-'"
                                :pricingAdditionalInfo="'Untuk UMKM'"
                                :pricingData="paketB" />
                            <pricing
                                :pricingTitle="'BERKEMBANG'"
                                :pricingName="'Rp 2.500.000,-'"
                                :pricingAdditionalInfo="'Untuk Usaha yang Berkembang'"
                                :pricingData="paketC" />
                            <pricing
                                :pricingTitle="'PENGUSAHA'"
                                :pricingName="'Rp 13.500.000,-'"
                                :pricingAdditionalInfo="'Untuk Pengusaha Besar'"
                                :pricingData="paketD" />
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout';
    import Pricing from './Pricing';

    export default {
        components: {
            AppLayout,
            Pricing,
        },

        data() {
            return {
                paketA: {
                    id: 1,
                    APK: true,
                    rilis_google_play: true,
                    jumlah_produk: 12,
                    blog: false,
                    hosting: false,
                    self_manage: false,
                    pembayaran_online: false,
                    WhatsApp: true,
                    transaksi_penjualan: false,
                    integrasi_aposerba: false,
                    ad_mob: false,
                },

                paketB: {
                    id: 2,
                    APK: true,
                    rilis_google_play: true,
                    jumlah_produk: 24,
                    blog: true,
                    hosting: false,
                    self_manage: false,
                    pembayaran_online: false,
                    WhatsApp: true,
                    transaksi_penjualan: false,
                    integrasi_aposerba: false,
                    ad_mob: false,
                },

                paketC: {
                    id: 3,
                    APK: true,
                    rilis_google_play: true,
                    jumlah_produk: 52,
                    blog: true,
                    hosting: false,
                    self_manage: true,
                    pembayaran_online: true,
                    WhatsApp: true,
                    transaksi_penjualan: false,
                    integrasi_aposerba: false,
                    ad_mob: true,
                },

                paketD: {
                    id: 4,
                    APK: true,
                    rilis_google_play: true,
                    jumlah_produk: 'Tanpa Batas',
                    blog: true,
                    hosting: true,
                    self_manage: true,
                    pembayaran_online: true,
                    WhatsApp: true,
                    transaksi_penjualan: true,
                    integrasi_aposerba: true,
                    ad_mob: true,
                },
            }
        }
    }
</script>