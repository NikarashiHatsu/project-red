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
                <list-produk @edit="editProduk" :batasProduk="batasProduk" :sudahDiajukan="sudahDiajukan" :produk="informasi.products" />
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
                <jet-input id="nama_produk" :disabled="sudahDiajukan" :class="{ 'bg-gray-100': sudahDiajukan }" type="text" class="mt-1 block w-full" v-model="form.nama_produk" />
                <jet-input-error :message="form.error('nama_produk')" class="mt-2" />
            </div>
            
            <!-- Harga Produk -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="harga_produk" value="Harga Produk" />
                <jet-input id="harga_produk" :disabled="sudahDiajukan" :class="{ 'bg-gray-100': sudahDiajukan }" type="text" class="mt-1 block w-full" v-model="form.harga_produk" placeholder="Gunakan angka, tanpa koma atau titik" />
                <jet-input-error :message="form.error('harga_produk')" class="mt-2" />
            </div>
            
            <!-- Deskripsi Produk -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="deskripsi_produk" value="Deskripsi Produk" />
                <textarea rows="5" id="deskripsi_produk" class="form-input rounded-md border mt-1 block w-full" v-model="form.deskripsi_produk" :disabled="sudahDiajukan" :class="{ 'bg-gray-100': sudahDiajukan }"></textarea>
                <jet-input-error :message="form.error('deskripsi_produk')" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <span v-if="batasProduk == 0" class="mr-2">
                Anda belum memilih paket aplikasi. <inertia-link :href="route('pricing.index')" class="text-gray-800 font-bold">Pilih disini</inertia-link>.
            </span>
            <span v-if="apakahMencapaiBatasProduk && batasProduk != 0" class="mr-2">
                Produk sudah mencapai batas paket. <inertia-link :href="route('pricing.index')" class="text-gray-800 font-bold">Upgrade?</inertia-link>
            </span>
            <jet-button :disabled="(sudahDiajukan || apakahMencapaiBatasProduk) && !editMode " :class="{ 'opacity-25': (sudahDiajukan || apakahMencapaiBatasProduk) && !editMode }" @type="'submit'">
                {{ (editMode) ? 'Simpan Perubahan' : 'Tambah Produk' }}
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

        created() {
            this.hitungBatasProduk();
        },

        data() {
            return {
                previewFotoProduk: null,
                editMode: false,
                productObject: null,
                batasProduk: 0,
                
                form: this.$inertia.form({
                    _method: 'POST',
                    // Produk
                    id: null,
                    user_id: this.$page.user.id,
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
            hitungBatasProduk() {
                let pricingId = this.$page.data.form_order.pricing_id;

                if(pricingId == 1) this.batasProduk = 12;
                if(pricingId == 2) this.batasProduk = 24;
                if(pricingId == 3) this.batasProduk = 52;
                if(pricingId == 4) this.batasProduk = Infinity;
            },
            
            submitInformasiProduk() {
                if(this.$refs.fotoProduk) {
                    this.form.foto_produk_path = this.$refs.fotoProduk.files[0];
                }

                if(this.editMode) {
                    this.form._method = 'PUT';
                    this.form.post(route('produk.update', this.productObject), {
                        preserveScroll: true,
                    });

                    this.productObject = null;
                    this.form.id = null;
                    this.form._method = 'POST';
                    this.editMode = false;
                } else {
                    this.form.post(route('produk.store'), {
                        preserveScroll: true,
                    });
                }

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

            editProduk(prod) {
                this.editMode = true;

                this.productObject = prod;
                this.form.id = prod.id;
                this.form.nama_produk = prod.nama_produk;
                this.form.harga_produk = prod.harga_produk;
                this.form.deskripsi_produk = prod.deskripsi_produk;
                this.previewFotoProduk = prod.storage_foto_produk_path;
            }
        },

        computed: {
            apakahMencapaiBatasProduk() {
                let jumlahProduk = this.$page.data.products.length;
                
                if(jumlahProduk >= this.batasProduk) {
                    return true;
                }
            }
        }
    }
</script>