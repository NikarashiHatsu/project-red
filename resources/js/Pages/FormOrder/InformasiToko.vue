<template>
    <jet-form-section @submitted="submitInformasiToko">
        <template #title>
            Informasi Toko
        </template>

        <template #description>
            Data-data ini diperlukan untuk aplikasi Android Anda.
        </template>

        <template #form>
            <!-- Nama -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="namaPemilik" value="Nama Pemilik" />
                <jet-input id="namaPemilik" type="text" class="mt-1 block w-full" v-model="form.namaPemilik" autocomplete="namaPemilik" />
                <jet-input-error :message="form.error('namaPemilik')" class="mt-2" />
            </div>

            <!-- Nama Toko -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="namaToko" value="Nama Toko" />
                <jet-input id="namaToko" type="text" class="mt-1 block w-full" v-model="form.namaToko" autocomplete="namaToko" />
                <jet-input-error :message="form.error('namaToko')" class="mt-2" />
            </div>
            
            <!-- Logo Toko -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="logoToko" value="Logo Toko" />
                <jet-input id="logoToko" type="text" class="mt-1 block w-full" v-model="form.logoToko" autocomplete="namaToko" />
                <jet-input-error :message="form.error('logoToko')" class="mt-2" />
            </div>
            
            <!-- Banner Toko -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="bannerToko" value="Banner Toko" />
                <jet-input id="bannerToko" type="text" class="mt-1 block w-full" v-model="form.bannerToko" autocomplete="namaToko" />
                <jet-input-error :message="form.error('bannerToko')" class="mt-2" />
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
                    namaPemilik: null,
                    namaToko: null,
                    logoToko: null,
                    bannerToko: null,
                }, {
                    bag: 'updateProfileInformation',
                    resetOnSuccess: false,
                }),
            }
        },

        methods: {
            submitInformasiToko() {

            }
        }
    }
</script>