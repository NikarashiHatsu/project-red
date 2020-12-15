<template>
    <jet-form-section @submitted="submitInformasiAplikasi">
        <template #title>
            Informasi Aplikasi
        </template>

        <template #description>
            Data-data ini diperlukan untuk data yang ditampilkan pada Google Play Store.
        </template>

        <template #form>
            <!-- Nama Aplikasi -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="namaAplikasi" value="Nama Aplikasi" />
                <jet-input id="namaAplikasi" type="text" class="mt-1 block w-full" v-model="form.namaAplikasi" autocomplete="namaAplikasi" />
                <jet-input-error :message="form.error('namaAplikasi')" class="mt-2" />
            </div>
            
            <!-- Deskripsi Aplikasi -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="deskripsiAplikasi" value="Deskripsi Aplikasi" />
                <jet-input id="deskripsiAplikasi" type="text" class="mt-1 block w-full" v-model="form.deskripsiAplikasi" autocomplete="deskripsiAplikasi" />
                <jet-input-error :message="form.error('namaPemilik')" class="mt-2" />
            </div>
            
            <!-- URL Website Perusahaan (Opsional) -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="urlWebsitePerusahaan" value="URL Website Perusahaan" />
                <jet-input id="urlWebsitePerusahaan" type="text" class="mt-1 block w-full" v-model="form.urlWebsitePerusahaan" autocomplete="namaToko" />
                <jet-input-error :message="form.error('urlWebsitePerusahaan')" class="mt-2" />
            </div>
            
            <!-- Alamat Perusahaan -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="alamatPerusahaan" value="Alamat Perusahaan" />
                <jet-input id="alamatPerusahaan" type="text" class="mt-1 block w-full" v-model="form.alamatPerusahaan" autocomplete="namaToko" />
                <jet-input-error :message="form.error('alamatPerusahaan')" class="mt-2" />
            </div>
        </template>

        <template #actions>
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
                    // Informasi Aplikasi
                    namaAplikasi: null,
                    deskripsiAplikasi: null,
                    urlWebsitePerusahaan: null,
                    alamatPerusahaan: null,
                }, {
                    bag: 'updateProfileInformation',
                    resetOnSuccess: false,
                }),
            }
        },

        methods: {
            submitInformasiAplikasi() {

            }
        }
    }
</script>