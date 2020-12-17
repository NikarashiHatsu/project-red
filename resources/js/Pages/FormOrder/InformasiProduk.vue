<template>
    <jet-form-section @submitted="submitInformasiProduk">
        <template #title>
            Informasi Produk
        </template>

        <template #description>
            Data-data ini digunakan untuk ditampilkan pada halaman depan aplikasi Anda.
        </template>

        <template #form>
            <!-- List Produk -->
            <div class="col-span-6">
                <list-produk :produk="informasi.products" />
            </div>
            
            <!-- Foto produk -->
            <div class="col-span-6 sm:col-span-4">
                <!-- File input foto produk -->
                <input type="file" :disabled="sudahDiajukan" class="hidden" ref="fotoProduk" @change="updatePreviewFotoProduk" />
                <jet-label for="fotoProduk" value="Foto Barang (Max: 2MB)" />

                <!-- Foto Produk sekarang -->
                <div class="mt-2" v-show="!previewFotoProduk">
                    <div class="rounded-md h-32 w-32 object-cover border"></div>
                </div>

                <!-- Preview foto produk baru -->
                <div class="mt-2" v-show="previewFotoProduk">
                    <span class="block rounded-md h-32 w-32 object-cover border"
                          :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + previewFotoProduk + '\');'">
                    </span>
                </div>
                
                <!-- Buttons -->
                <jet-secondary-button :disabled="sudahDiajukan" :class="{ 'bg-gray-100': sudahDiajukan }" class="mt-2 mr-2" type="button" @click.native.prevent="pilihFotoProduk">
                    Pilih Foto Produk
                </jet-secondary-button>

                <!-- Error message -->
                <jet-input-error :message="form.error('foto_produk_path')" class="mt-2" />
            </div>

            <!-- Nama Produk -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="nama_produk" value="Nama Produk" />
                <jet-input id="nama_produk" type="text" class="mt-1 block w-full" v-model="form.nama_produk" autocomplete="namaToko" />
                <jet-input-error :message="form.error('nama_produk')" class="mt-2" />
            </div>
            
            <!-- Harga Produk -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="harga_produk" value="Harga Produk" />
                <jet-input id="harga_produk" type="text" class="mt-1 block w-full" v-model="form.harga_produk" placeholder="Gunakan angka, tanpa koma atau titik" autocomplete="namaToko" />
                <jet-input-error :message="form.error('harga_produk')" class="mt-2" />
            </div>
            
            <!-- Deskripsi Produk -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="deskripsi_produk" value="Deskripsi Produk" />
                <jet-input id="deskripsi_produk" type="text" class="mt-1 block w-full" v-model="form.deskripsi_produk" autocomplete="namaToko" />
                <jet-input-error :message="form.error('deskripsi_produk')" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <jet-secondary-button class="mr-4" @type="'button'">
                Tambah Produk
            </jet-secondary-button>
            
            <jet-button @type="'submit'">
                Simpan
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
    import JetButton from '@/Jetstream/Button';
    import JetSecondaryButton from '@/Jetstream/SecondaryButton';
    import JetActionMessage from '@/Jetstream/ActionMessage';
    import JetFormSection from '@/Jetstream/FormSection';
    import JetLabel from '@/Jetstream/Label';
    import JetInput from '@/Jetstream/Input';
    import JetInputError from '@/Jetstream/InputError';
    import ListProduk from './ListProduk';

    export default {
        components: {
            JetButton,
            JetSecondaryButton,
            JetActionMessage,
            JetFormSection,
            JetLabel,
            JetInput,
            JetInputError,
            ListProduk,
        },

        props: ['sudahDiajukan', 'informasi'],

        data() {
            return {
                previewFotoProduk: null,
                
                form: this.$inertia.form({
                    // Produk
                    form_order_id: this.informasi.id,
                    nama_produk: null,
                    harga_produk: null,
                    deskripsi_produk: null,
                    foto_produk_path: null,
                }, {
                    resetOnSuccess: true,
                }),
            }
        },

        methods: {
            submitInformasiProduk() {
                if(this.$refs.fotoProduk) {
                    this.form.foto_produk_path = this.$refs.fotoProduk.files[0];
                }
                
                this.form.post(route('produk.store'), {
                    preserveScroll: true,
                });
                
                this.$emit(
                    'submitted',
                    {
                        form_order_id: this.form.form_order_id,
                        nama_produk: this.form.nama_produk,
                        harga_produk: new Intl.NumberFormat('id-ID', { minimumFractionDigits: 0, style: 'currency', currency: 'IDR' }).format(this.form.harga_produk),
                        deskripsi_produk: this.form.deskripsi_produk,
                        foto_produk_path: this.previewFotoProduk,
                    }
                );

                this.previewFotoProduk = null;
            },

            updatePreviewFotoProduk() {
                const reader = new FileReader();

                reader.onload = (e) => {
                    this.previewFotoProduk = e.target.result;
                };

                reader.readAsDataURL(this.$refs.fotoProduk.files[0]);
            },

            pilihFotoProduk() {
                this.$refs.fotoProduk.click();
            },
        }
    }
</script>