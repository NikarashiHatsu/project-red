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
                <jet-label for="nama_aplikasi" value="Nama Aplikasi" />
                <jet-input id="nama_aplikasi" :disabled="sudahDiajukan" :class="{ 'bg-gray-100': sudahDiajukan }" type="text" class="mt-1 block w-full" v-model="form.nama_aplikasi" />
                <jet-input-error :message="form.error('nama_aplikasi')" class="mt-2" />
            </div>
            
            <!-- Deskripsi Aplikasi -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="deskripsi_aplikasi" value="Deskripsi Aplikasi" />
                <jet-input id="deskripsi_aplikasi" :disabled="sudahDiajukan" :class="{ 'bg-gray-100': sudahDiajukan }" type="text" class="mt-1 block w-full" v-model="form.deskripsi_aplikasi" />
                <jet-input-error :message="form.error('deskripsi_aplikasi')" class="mt-2" />
            </div>
            
            <!-- Alamat Perusahaan -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="alamat_perusahaan" value="Alamat Perusahaan" />
                <jet-input id="alamat_perusahaan" :disabled="sudahDiajukan" :class="{ 'bg-gray-100': sudahDiajukan }" type="text" class="mt-1 block w-full" v-model="form.alamat_perusahaan" />
                <jet-input-error :message="form.error('alamat_perusahaan')" class="mt-2" />
            </div>
            
            <!-- URL Website Perusahaan (Opsional) -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="url_website_perusahaan" value="URL Website Perusahaan (Opsional)" />
                <jet-input id="url_website_perusahaan" :disabled="sudahDiajukan" :class="{ 'bg-gray-100': sudahDiajukan }" type="text" class="mt-1 block w-full" v-model="form.url_website_perusahaan" placeholder="https://www.websiteanda.com" />
                <jet-input-error :message="form.error('url_website_perusahaan')" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Tersimpan
            </jet-action-message>
            
            <jet-button :disabled="sudahDiajukan" :class="{ 'opacity-25': sudahDiajukan }" @type="'submit'">
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

        props: ['informasi', 'sudahDiajukan'],

        data() {
            return {
                form: this.$inertia.form({
                    '_method': 'PUT',
                    // Informasi Aplikasi
                    id: this.informasi.id,
                    nama_aplikasi: this.informasi.nama_aplikasi,
                    deskripsi_aplikasi: this.informasi.deskripsi_aplikasi,
                    url_website_perusahaan: this.informasi.url_website_perusahaan,
                    alamat_perusahaan: this.informasi.alamat_perusahaan,
                }, {
                    bag: 'updateProfileInformation',
                    resetOnSuccess: false,
                }),
            }
        },

        methods: {
            submitInformasiAplikasi() {
                this.$emit('submitted');
                this.form.post(route('form_order.update', this.$page.data), {
                    preserveScroll: true,
                });
            }
        }
    }
</script>