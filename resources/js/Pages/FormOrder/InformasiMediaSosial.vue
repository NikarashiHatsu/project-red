<template>
    <jet-form-section @submitted="submitInformasiMediaSosial">
        <template #title>
            Informasi Media Sosial
        </template>

        <template #description>
            Data-data ini akan ditampilkan pada footer di aplikasi Anda.
        </template>

        <template #form>
            <!-- YouTube Link -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="youtubeLink" value="Link YouTube" />
                <jet-input id="youtubeLink" type="text" class="mt-1 block w-full" v-model="form.youtubeLink" autocomplete="namaToko" />
                <jet-input-error :message="form.error('youtubeLink')" class="mt-2" />
            </div>

            <!-- Facebook Link -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="facebookLink" value="Link Facebook" />
                <jet-input id="facebookLink" type="text" class="mt-1 block w-full" v-model="form.facebookLink" autocomplete="namaToko" />
                <jet-input-error :message="form.error('facebookLink')" class="mt-2" />
            </div>

            <!-- Instagram Link -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="instagramLink" value="Link Instagram" />
                <jet-input id="instagramLink" type="text" class="mt-1 block w-full" v-model="form.instagramLink" autocomplete="namaToko" />
                <jet-input-error :message="form.error('instagramLink')" class="mt-2" />
            </div>

            <!-- Twitter Link -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="twitterLink" value="Link Twitter" />
                <jet-input id="twitterLink" type="text" class="mt-1 block w-full" v-model="form.twitterLink" autocomplete="namaToko" />
                <jet-input-error :message="form.error('twitterLink')" class="mt-2" />
            </div>

            <!-- Nomor WhatsApp -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="whatsappNumber" value="Nomor WhatsApp" />
                <jet-input id="whatsappNumber" type="number" class="mt-1 block w-full" v-model="form.whatsappNumber" autocomplete="namaToko" />
                <jet-input-error :message="form.error('whatsappNumber')" class="mt-2" />
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
                form: this.$inertia.form({
                    '_method': 'PUT',
                    // Media sosial
                    facebookLink: null,
                    instagramLink: null,
                    twitterLink: null,
                    youtubeLink: null,
                    whatsappNumber: null,
                }, {
                    bag: 'updateProfileInformation',
                    resetOnSuccess: false,
                }),
            }
        },

        methods: {
            submitInformasiMediaSosial() {

            }
        }
    }
</script>