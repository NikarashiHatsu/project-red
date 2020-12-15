<template>
    <jet-form-section @submitted="submitInformasiProduk">
        <template #title>
            Informasi Produk
        </template>

        <template #description>
            Data-data ini digunakan untuk ditampilkan pada halaman depan aplikasi Anda.
        </template>

        <template #form>
            <!-- Nama Produk -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="namaProduk" value="Nama Produk" />
                <jet-input id="namaProduk" type="text" class="mt-1 block w-full" v-model="form.namaProduk" autocomplete="namaToko" />
                <jet-input-error :message="form.error('namaProduk')" class="mt-2" />
            </div>
            
            <!-- Harga Produk -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="hargaProduk" value="Harga Produk" />
                <jet-input id="hargaProduk" type="text" class="mt-1 block w-full" v-model="form.hargaProduk" autocomplete="namaToko" />
                <jet-input-error :message="form.error('hargaProduk')" class="mt-2" />
            </div>
            
            <!-- Deskripsi Produk -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="deskripsiProduk" value="Deskripsi Produk" />
                <jet-input id="deskripsiProduk" type="text" class="mt-1 block w-full" v-model="form.deskripsiProduk" autocomplete="namaToko" />
                <jet-input-error :message="form.error('deskripsiProduk')" class="mt-2" />
            </div>
            
            <!-- Foto Produk -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="fotoProduk" value="Foto Produk" />
                <jet-input id="fotoProduk" type="text" class="mt-1 block w-full" v-model="form.fotoProduk" autocomplete="namaToko" />
                <jet-input-error :message="form.error('fotoProduk')" class="mt-2" />
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

    export default {
        components: {
            JetButton,
            JetSecondaryButton,
            JetActionMessage,
            JetFormSection,
            JetLabel,
            JetInput,
            JetInputError,
        },

        data() {
            return {
                produk: [],
                
                form: this.$inertia.form({
                    '_method': 'PUT',
                    // Produk
                    namaProduk: null,
                    hargaProduk: null,
                    deskripsiProduk: null,
                    fotoProduk: null,
                }, {
                    bag: 'updateProfileInformation',
                    resetOnSuccess: false,
                }),
            }
        },

        methods: {
            submitInformasiProduk() {

            }
        }
    }
</script>