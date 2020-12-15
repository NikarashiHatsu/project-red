<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Form Order
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div>
                    <informasi-toko />
                    <jet-section-border />
                </div>

                <div>
                    <informasi-aplikasi />
                    <jet-section-border />
                </div>

                <div>
                    <informasi-media-sosial />
                    <jet-section-border />
                </div>

                <div>
                    <informasi-produk />
                </div>
                
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout';
import JetSectionBorder from '@/Jetstream/SectionBorder';
import InformasiAplikasi from './InformasiAplikasi';
import InformasiMediaSosial from './InformasiMediaSosial';
import InformasiProduk from './InformasiProduk';
import InformasiToko from './InformasiToko';

export default {
    components: {
        AppLayout,
        JetSectionBorder,
        InformasiAplikasi,
        InformasiMediaSosial,
        InformasiProduk,
        InformasiToko,
    }
}
</script>