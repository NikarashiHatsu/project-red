<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Form Order
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8" v-if="informasi">
                <div>
                    <informasi-toko :informasi="informasi" />
                    <jet-section-border />
                </div>

                <div>
                    <informasi-aplikasi :informasi="informasi" />
                    <jet-section-border />
                </div>

                <div>
                    <informasi-media-sosial :informasi="informasi" />
                    <jet-section-border />
                </div>

                <div>
                    <informasi-produk />
                    <jet-section-border />
                </div>

                <div>
                    <request-panel :informasi="informasi" />
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
import RequestPanel from './RequestPanel.vue';

export default {
    components: {
        AppLayout,
        JetSectionBorder,
        InformasiAplikasi,
        InformasiMediaSosial,
        InformasiProduk,
        InformasiToko,
        RequestPanel,
    },

    created() {
        this.fetchData();
    },

    data() {
        return {
            informasi: null,
        }
    },

    methods: {
        fetchData() {
            var vm = this;

            axios
                .get(route('form-order.check_information', this.$page.user.id))
                .then(function(response) {
                    var data = response.data.data;

                    vm.informasi = data;
                });
        }
    },
}
</script>