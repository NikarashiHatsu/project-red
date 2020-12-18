<template>
    <jet-form-section @submitted="submitInformasiMediaSosial">
        <template #title>
            Informasi Media Sosial
        </template>

        <template #description>
            Data-data ini akan ditampilkan pada footer di aplikasi Anda.
        </template>

        <template #form>
            <!-- Nomor WhatsApp -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="whatsapp_number" value="Nomor WhatsApp (Gunakan awalan +62)" />
                <jet-input id="whatsapp_number" :disabled="sudahDiajukan" :class="{ 'bg-gray-100': sudahDiajukan }" type="number" class="mt-1 block w-full" v-model="form.whatsapp_number" placeholder="+62" />
                <jet-input-error :message="form.error('whatsapp_number')" class="mt-2" />
            </div>

            <!-- YouTube Link -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="youtube_link" value="Link YouTube (Opsional)" />
                <jet-input id="youtube_link" :disabled="sudahDiajukan" :class="{ 'bg-gray-100': sudahDiajukan }" type="text" class="mt-1 block w-full" v-model="form.youtube_link" placeholder="https://www.youtube.com/channel/id_channel_anda" />
                <jet-input-error :message="form.error('youtube_link')" class="mt-2" />
            </div>

            <!-- Facebook Link -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="facebook_link" value="Link Facebook (Opsional)" />
                <jet-input id="facebook_link" :disabled="sudahDiajukan" :class="{ 'bg-gray-100': sudahDiajukan }" type="text" class="mt-1 block w-full" v-model="form.facebook_link" placeholder="https://facebook.com/id_facebook_anda" />
                <jet-input-error :message="form.error('facebook_link')" class="mt-2" />
            </div>

            <!-- Instagram Link -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="instagram_link" value="Link Instagram (Opsional)" />
                <jet-input id="instagram_link" :disabled="sudahDiajukan" :class="{ 'bg-gray-100': sudahDiajukan }" type="text" class="mt-1 block w-full" v-model="form.instagram_link" placeholder="https://instagram.com/id_instagram_anda" />
                <jet-input-error :message="form.error('instagram_link')" class="mt-2" />
            </div>

            <!-- Twitter Link -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="twitter_link" value="Link Twitter (Opsional)" />
                <jet-input id="twitter_link" :disabled="sudahDiajukan" :class="{ 'bg-gray-100': sudahDiajukan }" type="text" class="mt-1 block w-full" v-model="form.twitter_link" placeholder="https://twitter.com/id_twitter_anda" />
                <jet-input-error :message="form.error('twitter_link')" class="mt-2" />
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
                    // Media sosial
                    id: this.informasi.id,
                    facebook_link: this.informasi.facebook_link,
                    instagram_link: this.informasi.instagram_link,
                    twitter_link: this.informasi.twitter_link,
                    youtube_link: this.informasi.youtube_link,
                    whatsapp_number: this.informasi.whatsapp_number,
                }, {
                    bag: 'updateProfileInformation',
                    resetOnSuccess: false,
                }),
            }
        },

        methods: {
            submitInformasiMediaSosial() {
                this.form.post(route('form-order.update'), {
                    preserveScroll: true,
                });
            }
        }
    }
</script>