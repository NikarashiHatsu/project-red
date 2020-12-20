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
                    <informasi-toko :sudahDiajukan="sudahDiajukan" :informasi="$page.data" />
                    <jet-section-border />
                </div>

                <div>
                    <informasi-aplikasi :sudahDiajukan="sudahDiajukan" :informasi="$page.data" />
                    <jet-section-border />
                </div>

                <div>
                    <informasi-media-sosial :sudahDiajukan="sudahDiajukan" :informasi="$page.data" />
                    <jet-section-border />
                </div>

                <div>
                    <informasi-produk :sudahDiajukan="sudahDiajukan" :informasi="$page.data" />
                    <jet-section-border />
                </div>

                <div>
                    <request-panel :bisaRequest="bisaRequest" :sudahDiajukan="sudahDiajukan" :informasi="$page.data" />
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
    import RequestPanel from './RequestPanel';
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
            RequestPanel,
            ShiroyukiFulfilled,
        },

        data() {
            return {
                form: this.$inertia.form({
                    '_method': 'PUT',
                    // Informasi Aplikasi
                    id: this.$page.data.id,
                    requested: true,
                }, {
                    bag: 'updateProfileInformation',
                    resetOnSuccess: false,
                }),
            }
        },

        methods: {
            ajukanAplikasi() {
                this.form.post(route('form_order.update'), {
                    preserveScroll: true,
                });
            },

            apakahAda(param) {
                let ada;

                if(this.$page.data[param]) {
                    ada = true;
                } else {
                    ada = false;
                }

                return ada;
            },
        },

        computed: {
            bisaRequest() {
                var info = this.$page.data;
                if(info.logo_toko_path == null ||
                    info.banner_toko_path == null ||
                    info.nama_pemilik == null ||
                    info.nama_toko == null ||
                    info.nama_aplikasi == null ||
                    info.deskripsi_aplikasi == null ||
                    info.alamat_perusahaan == null ||
                    info.products.length == 0 ||
                    info.whatsapp_number == null) {
                    // disabled = true
                    return true;
                } else {
                    // disabled = false
                    return false;
                }
            },

            sudahDiajukan() {
                return this.$page.data.requested;
            },
        }
    }
</script>