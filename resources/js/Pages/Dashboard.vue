<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-12 grid-flow-row gap-6">
                    <div class="col-span-12 md:col-span-6 lg:col-span-8">
                        <div :class="borderColor" class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                            <h5 class="text-xl mb-4">Hai, {{ $page.user.name }}</h5>
                            <p>Ini adalah overview Anda. Informasi lebih lanjut akan kami update di masa yang akan datang.</p>
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-6 lg:col-span-4">
                        <div :class="borderColor" class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            <h6 class="text-large p-6 pb-4">To-do List:</h6>
                            <todo-list 
                                :title="'Pricing Plan'" 
                                :url="route('pricing.index')"
                                :isFulfilled="apakahInformasiPricingTerpenuhi" />
                            <todo-list 
                                :title="'Informasi Toko'" 
                                :url="route('form_order.index')"
                                :isFulfilled="apakahInformasiTokoTerpenuhi" />
                            <todo-list 
                                :title="'Informasi Aplikasi'" 
                                :url="route('form_order.index')"
                                :isFulfilled="apakahInformasiAplikasiTerpenuhi" />
                            <todo-list 
                                :title="'Informasi Media Sosial'" 
                                :url="route('form_order.index')"
                                :isFulfilled="apakahInformasiMediaSosialTerpenuhi" />
                            <todo-list 
                                :title="'List Produk'" 
                                :url="route('form_order.index')"
                                :isFulfilled="apakahInformasiProdukTerpenuhi" />
                            <todo-list 
                                :title="'Layout dan Tema'" 
                                :url="route('layout_picker.index')"
                                :isFulfilled="apakahLayoutPickerTerpenuhi" />
                            <div class="flex flex-row items-center justify-between p-6">
                                <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                                    Tersimpan
                                </jet-action-message>
                                
                                <jet-button 
                                    @click.native="ajukanPermintaanAplikasi"
                                    :disabled="!apakahSemuaSyaratTerpenuhi || apakahSudahDiajukan"
                                    :class="buttonClasses">
                                    Ajukan Pembuatan Aplikasi
                                </jet-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout';
    import JetActionMessage from '@/Jetstream/ActionMessage';
    import JetButton from '@/Jetstream/Button';
    import TodoList from '@/Shiroyuki/TodoList';

    export default {
        components: {
            AppLayout,
            JetActionMessage,
            JetButton,
            TodoList,
        },

        data() {
            return {
                form_order: this.$page.data.form_order,
                products: this.$page.data.products,
                layout: this.$page.data.layout_picker,
                form: this.$inertia.form({
                    _method: 'PUT',
                    id: this.$page.data.form_order.id,
                    requested: 1,
                }, {
                    resetOnSuccess: false,
                }),
            }
        },

        methods: {
            ajukanPermintaanAplikasi() {
                this.form.post(route('form_order.update', this.$page.data.form_order), {
                    preserveScroll: true,
                });
            }
        },

        computed: {
            borderColor() {
                let borderColor = 'border-l-4 border-gray-300';

                if (this.layout.color_scheme_used) {
                    borderColor = `border-l-4 border-${this.layout.color_scheme_used}-400`;
                }
                
                return borderColor;
            },

            apakahInformasiPricingTerpenuhi() {
                if (this.form_order.pricing_id) {
                    return true;
                }
            },

            apakahInformasiTokoTerpenuhi() {
                if (this.form_order.banner_toko_path &&
                    this.form_order.logo_toko_path &&
                    this.form_order.nama_pemilik &&
                    this.form_order.nama_toko) {
                        return true;
                    } else {
                        return false;
                    }
            },

            apakahInformasiAplikasiTerpenuhi() {
                if (this.form_order.nama_aplikasi &&
                    this.form_order.deskripsi_aplikasi &&
                    this.form_order.alamat_perusahaan) {
                        return true;
                    } else {
                        return false;
                    }
            },

            apakahInformasiMediaSosialTerpenuhi() {
                if (this.form_order.whatsapp_number) {
                    return true;
                } else {
                    return false;
                }
            },

            apakahInformasiProdukTerpenuhi() {
                if (this.products.length > 0) {
                    return true;
                } else {
                    return false;
                }
            },

            apakahLayoutPickerTerpenuhi() {
                if (this.layout.layout_id_used &&
                    this.layout.color_scheme_used) {
                        return true;
                    } else {
                        return false;
                    }
            },

            apakahSemuaSyaratTerpenuhi() {
                if (this.apakahInformasiTokoTerpenuhi &&
                    this.apakahInformasiAplikasiTerpenuhi &&
                    this.apakahInformasiMediaSosialTerpenuhi &&
                    this.apakahInformasiProdukTerpenuhi &&
                    this.apakahLayoutPickerTerpenuhi &&
                    this.apakahInformasiPricingTerpenuhi) {
                        return true;
                    }
            },

            apakahSudahDiajukan() {
                return this.$page.data.form_order.requested;
            },

            buttonClasses() {
                let classes = '';
                
                if(this.layout.color_scheme_used) {
                    classes += `bg-${this.layout.color_scheme_used}-500 hover:bg-${this.layout.color_scheme_used}-600 active:bg-${this.layout.color_scheme_used}-600 focus:border-${this.layout.color_scheme_used}-900 focus:shadow-outline-${this.layout.color_scheme_used}`
                }

                if(!this.apakahSemuaSyaratTerpenuhi || this.apakahSudahDiajukan) {
                    classes += ' opacity-25';
                }

                return classes;
            }
        }
    }
</script>
