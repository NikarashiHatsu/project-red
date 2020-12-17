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
                    <informasi-toko @submitted="updateInformasi" :sudahDiajukan="sudahDiajukan" :informasi="informasi" />
                    <jet-section-border />
                </div>

                <div>
                    <informasi-aplikasi @submitted="updateInformasi" :sudahDiajukan="sudahDiajukan" :informasi="informasi" />
                    <jet-section-border />
                </div>

                <div>
                    <informasi-media-sosial @submitted="updateInformasi" :sudahDiajukan="sudahDiajukan" :informasi="informasi" />
                    <jet-section-border />
                </div>

                <div>
                    <informasi-produk @submitted="updateProduk" :sudahDiajukan="sudahDiajukan" :informasi="informasi" />
                    <jet-section-border />
                </div>

                <div :key="requestPanelKey">
                    <request-panel :bisaRequest="bisaRequest" :sudahDiajukan="sudahDiajukan" :informasi="informasi" />
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
            requestPanelKey: 0,
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
        },

        updateInformasi(updatedInformasi) {
            Object.assign(this.informasi, updatedInformasi);
            this.requestPanelKey += 1;
        },

        updateProduk(produkBaru) {
            this.informasi.products.push(produkBaru);
            this.requestPanelKey += 1;
        }
    },

    computed: {
        bisaRequest() {
            if(this.informasi.logo_toko_path == null ||
                this.informasi.banner_toko_path == null ||
                this.informasi.nama_pemilik == null ||
                this.informasi.nama_toko == null ||
                this.informasi.nama_aplikasi == null ||
                this.informasi.deskripsi_aplikasi == null ||
                this.informasi.alamat_perusahaan == null ||
                this.informasi.whatsapp_number == null) {
                // disabled = true
                return true;
            } else {
                // disabled = false
                return false;
            }
        },

        sudahDiajukan() {
            return this.informasi.requested;
        }
    }
}
</script>