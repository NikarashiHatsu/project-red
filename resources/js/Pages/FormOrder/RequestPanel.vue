<template>
    <jet-form-section @submitted="ajukanAplikasi">
        <template #title>
            Ajukan Permintaan Aplikasi
        </template>

        <template #description>
            Ajukan permintaan pembuatan aplikasi Android Anda.
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <p class="mb-4">Catatan: Pengajuan permintaan aplikasi akan dilaksanakan dengan jangka waktu 2-14 hari. Anda tidak bisa mengedit form apapun pada halaman ini setelah tombol dibawah ditekan. Pastikan semua informasi dan produk-produk diisi dengan sempurna.</p>
                <p class="mb-4">Dibawah ini adalah persyaratan yang telah Anda penuhi (teks yang berwarna abu-abu adalah persyaratan opsional):</p>
                <ol>
                    <li class="mb-2">
                        <p class="italic">Informasi Toko</p>
                        <ol>
                            <li>
                                <shiroyuki-fulfilled 
                                    :info="'Banner Toko'" 
                                    :value="$page.data.form_order.banner_toko_path" />
                                <shiroyuki-fulfilled 
                                    :info="'Logo Toko'" 
                                    :value="$page.data.form_order.logo_toko_path" />
                                <shiroyuki-fulfilled 
                                    :info="'Nama Pemilik'" 
                                    :value="$page.data.form_order.nama_pemilik" />
                                <shiroyuki-fulfilled 
                                    :info="'Nama Toko'" 
                                    :value="$page.data.form_order.nama_toko" />
                            </li>
                        </ol>
                    </li>
                    <li class="mb-2">
                        <p class="italic">Informasi Aplikasi</p>
                        <ol>
                            <li>
                                <shiroyuki-fulfilled 
                                    :info="'Nama Aplikasi'" 
                                    :value="$page.data.form_order.nama_aplikasi" />
                                <shiroyuki-fulfilled 
                                    :info="'Deskripsi Aplikasi'" 
                                    :value="$page.data.form_order.deskripsi_aplikasi" />
                                <shiroyuki-fulfilled 
                                    :info="'Alamat Perusahaan'" 
                                    :value="$page.data.form_order.alamat_perusahaan" />
                                <shiroyuki-fulfilled 
                                    :optional="true" 
                                    :info="'URL Website Perusahaan (Opsional)'" 
                                    :value="$page.data.form_order.url_website_perusahaan" />
                            </li>
                        </ol>
                    </li>
                    <li class="mb-2">
                        <p class="italic">Informasi Media Sosial</p>
                        <ol>
                            <li>
                                <shiroyuki-fulfilled 
                                    :info="'Nomor WhatsApp'" 
                                    :value="$page.data.form_order.whatsapp_number" />
                                <shiroyuki-fulfilled 
                                    :optional="true" 
                                    :info="'Link YouTube (Opsional)'" 
                                    :value="$page.data.form_order.youtube_link" />
                                <shiroyuki-fulfilled 
                                    :optional="true" 
                                    :info="'Link Facebook (Opsional)'" 
                                    :value="$page.data.form_order.facebook_link" />
                                <shiroyuki-fulfilled 
                                    :optional="true" 
                                    :info="'Link Instagram (Opsional)'" 
                                    :value="$page.data.form_order.instagram_link" />
                                <shiroyuki-fulfilled 
                                    :optional="true" 
                                    :info="'Link Twitter (Opsional)'" 
                                    :value="$page.data.form_order.twitter_link" />
                            </li>
                        </ol>
                    </li>
                    <li class="mb-2">
                        <p class="italic">Informasi Produk</p>
                        <ol>
                            <li>
                                <shiroyuki-fulfilled 
                                    :countable="true" 
                                    :info="'Produk (Jumlah produk yang Anda daftarkan: ' + $page.data.products.length + ' produk)'" 
                                    :counter="$page.data.products.length" />
                            </li>
                        </ol>
                    </li>
                </ol>
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Tersimpan
            </jet-action-message>
            
            <jet-button @type="'submit'" :class="{ 'opacity-25': (bisaRequest || sudahDiajukan) }" :disabled="(bisaRequest || sudahDiajukan)">
                Ajukan Permintaan
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
    import JetActionMessage from '@/Jetstream/ActionMessage';
    import JetButton from '@/Jetstream/Button';
    import JetSecondaryButton from '@/Jetstream/SecondaryButton';
    import JetFormSection from '@/Jetstream/FormSection';
    import ShiroyukiFulfilled from '@/Shiroyuki/Fulfilled';

    export default {
        components: {
            JetActionMessage,
            JetButton,
            JetSecondaryButton,
            JetFormSection,
            ShiroyukiFulfilled,
        },

        props: {
            informasi: {
                type: Object
            },
            bisaRequest: {
                type: Boolean
            },
            sudahDiajukan: {
                type: Boolean
            }
        },

        data() {
            return {
                form: this.$inertia.form({
                    '_method': 'PUT',
                    id: this.informasi.id,
                    requested: true,
                }, {
                    resetOnSuccess: false,
                }),
            }
        },

        methods: {
            ajukanAplikasi() {
                this.form.post(route('form_order.update', this.$page.data.form_order), {
                    preserveScroll: true,
                });
            },
        }
    }
</script>