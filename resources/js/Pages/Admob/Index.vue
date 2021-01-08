<template>
    <app-layout>
        <template #header>
            Ad Mob
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                <jet-form-section @submitted="updateAdMob">
                    <template #title>
                        Ad Mob
                    </template>
                    <template #description>
                        <p>Sajikan iklan dari Google Ads untuk pelanggan Anda. Kode Application ID dan Ad Unit ID akan sepenuhnya kami enkripsi demi keamanan Anda.</p>
                        <p class="mt-2 text-red-500">Jika ada kesalahan, tolong hapus keseluruhan isi dari kedua kolom di kanan lalu isi kembali dengan ID yang tepat.</p>
                    </template>
                    <template #form>

                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="application_id" :value="'Application ID'"></jet-label>
                            <jet-input id="application_id" class="mt-1 block w-full" v-model="form.application_id"></jet-input>
                            <jet-input-error :message="form.error('application_id')" class="mt-2"></jet-input-error>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="ad_unit_id" :value="'Ad Unit ID'"></jet-label>
                            <jet-input id="ad_unit_id" class="mt-1 block w-full" v-model="form.ad_unit_id"></jet-input>
                            <jet-input-error :message="form.error('ad_unit_id')" class="mt-2"></jet-input-error>
                        </div>
                        
                    </template>

                    <template #actions>
                        <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                            Tersimpan
                        </jet-action-message>

                        <jet-button @type="'submit'">
                            Simpan
                        </jet-button>
                    </template>
                </jet-form-section>

            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout';
    import JetActionMessage from '@/Jetstream/ActionMessage';
    import JetButton from '@/Jetstream/Button';
    import JetFormSection from '@/Jetstream/FormSection';
    import JetLabel from '@/Jetstream/Label';
    import JetInput from '@/Jetstream/Input';
    import JetInputError from '@/Jetstream/InputError';

    export default {
        components: {
            AppLayout,
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetLabel,
            JetInput,
            JetInputError,
        },

        data() {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    id: this.$page.data.admob.id,
                    application_id: this.$page.data.admob.app_id,
                    ad_unit_id: this.$page.data.admob.ad_id,
                }, {
                    resetOnSuccess: false,
                })
            }
        },

        methods: {
            updateAdMob() {
                this.form.post(route('admob.update', this.$page.data.admob), {
                    preserveScroll: true,
                });
            }
        }
    }
</script>