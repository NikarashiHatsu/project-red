<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Form Order
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8" v-if="$page.data">
                <div>
                    <informasi-toko :sudahDiajukan="sudahDiajukan" :informasi="$page.data.form_order" />
                    <jet-section-border />
                </div>

                <div>
                    <informasi-aplikasi :sudahDiajukan="sudahDiajukan" :informasi="$page.data.form_order" />
                    <jet-section-border />
                </div>

                <div>
                    <informasi-media-sosial :sudahDiajukan="sudahDiajukan" :informasi="$page.data.form_order" />
                    <jet-section-border />
                </div>

                <div>
                    <informasi-produk :sudahDiajukan="sudahDiajukan" :informasi="$page.data" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout';
    import JetActionMessage from '@/Jetstream/ActionMessage';
    import JetButton from '@/Jetstream/Button';
    import JetFormSection from '@/Jetstream/FormSection';
    import JetSectionBorder from '@/Jetstream/SectionBorder';
    import InformasiAplikasi from './InformasiAplikasi';
    import InformasiMediaSosial from './InformasiMediaSosial';
    import InformasiProduk from './InformasiProduk';
    import InformasiToko from './InformasiToko';
    import ShiroyukiFulfilled from '@/Shiroyuki/Fulfilled';

    export default {
        components: {
            AppLayout,
            JetActionMessage,
            JetButton,
            JetSectionBorder,
            JetFormSection,
            InformasiAplikasi,
            InformasiMediaSosial,
            InformasiProduk,
            InformasiToko,
            ShiroyukiFulfilled,
        },

        computed: {
            sudahDiajukan() {
                return this.$page.data.form_order.requested;
            },
        }
    }
</script>