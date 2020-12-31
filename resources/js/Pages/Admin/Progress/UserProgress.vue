<template>
    <div class="border-t border-gray-300 p-6 block">
        <div class="flex flex-col md:flex-row justify-between">
            <div class="flex flex-col items-center text-center md:items-start md:text-left md:flex-row w-full md:w-1/2">
                <div class="w-24 h-24 mr-0 md:mr-4">
                    <img class="w-24 h-24 object-cover rounded-md border border-gray-300" :src="userData.form_order.storage_logo_toko_path" :alt="userData.form_order.nama_toko" />
                </div>
                <div class="flex flex-col">
                    <h6 class="text-lg font-semibold mb-2">
                        {{ userData.form_order.nama_toko }}
                    </h6>
                    <p>
                        <span class="font-semibold">Nama Aplikasi:</span> {{ userData.form_order.nama_aplikasi }}
                    </p>
                    <p>
                        <span class="font-semibold">Deskripsi Aplikasi:</span> {{ userData.form_order.deskripsi_aplikasi }}
                    </p>
                    <p>
                        <span class="font-semibold">URL Website Perusahaan:</span> {{ userData.form_order.url_website_perusahaan }}
                    </p>
                    <div class="flex flex-col md:flex-row items-center md:items-start">
                        <inertia-link :href="route('admin.user_request.show', userData.form_order.user_id)" class="inline-flex bg-blue-400 hover:bg-blue-500 border-blue-400 border text-white mt-4 px-2 py-1 rounded transition ease-in-out duration-200">
                            Lihat detail Permintaan
                        </inertia-link>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-end w-full md:w-1/2 mt-6 sm:mt-0">
                <h6 class="text-lg font-semibold mb-4">
                    Progress
                </h6>
                <div class="grid grid-cols-3 grid-flow-row w-full">
                    <div class="col-span-1 text-xs pl-2 bg-green-200 border-green-400 w-full rounded-l-2xl border border-r-0 py-2">
                        Approval
                    </div>
                    <div :class="userData.is_apk_created ? 'bg-green-200 border-green-400': 'bg-gray-200 border-gray-400'" class="col-span-1 text-xs pl-2  w-full border border-r-0 py-2">
                        Generate APK
                    </div>
                    <div :class="userData.is_published_on_google_play ? 'bg-green-200 border-green-400': 'bg-gray-200 border-gray-400'" class="col-span-1 text-xs pl-2 w-full rounded-r-2xl border py-2">
                        Upload PlayStore
                    </div>
                </div>
                <div class="flex mt-4">
                    <a class="mr-4 text-sm uppercase rounded border p-2 border-gray-300" :href="route('web.app', userData.form_order.user_id)" target="_blank">
                        Buka Link Web
                    </a>

                    <jet-secondary-button @click.native="apkDone" :class="{ 'opacity-25': userData.is_apk_created }" class="mr-4">
                        APK Done
                    </jet-secondary-button>

                    <jet-secondary-button @click.native="isModalShown = true" :class="{ 'opacity-25': userData.is_published_on_google_play }">
                        Release Done
                    </jet-secondary-button>
                </div>
            </div>
        </div>

        <jet-dialog-modal :show="isModalShown">
            <template #title>
                Dialog Konfirmasi
            </template>

            <template #content>
                <p>Apakah Google PlayStore sudah merilis aplikasi yang diajukan? Jika sudah, tolong berikan link APK tersebut.</p>
                <jet-input type="text" class="mt-1 block w-full" v-model="releaseForm.google_play_url" />
                <jet-input-error :message="releaseForm.error('google_play_url')" class="mt-2" />
            </template>

            <template #footer>
                <div class="flex flex-row-reverse">
                    <jet-button @click.native="googleDone">
                        Konfirmasi
                    </jet-button>

                    <jet-secondary-button class="mr-4" @click.native="isModalShown = false">
                        Batalkan
                    </jet-secondary-button>
                </div>
            </template>
        </jet-dialog-modal>
    </div>
</template>

<script>
    import JetButton from '@/Jetstream/Button';
    import JetInput from '@/Jetstream/Input';
    import JetInputError from '@/Jetstream/InputError';
    import JetSecondaryButton from '@/Jetstream/SecondaryButton';
    import JetDialogModal from '@/Jetstream/DialogModal';

    export default {
        props: ['userData'],

        components: {
            JetButton,
            JetInput,
            JetInputError,
            JetSecondaryButton,
            JetDialogModal,
        },

        data() {
            return {
                isModalShown: false,
                releaseForm: this.$inertia.form({
                    _method: 'PUT',
                    id: this.userData.id,
                    is_published_on_google_play: 1,
                    google_play_url: '',
                }, {
                    resetOnSuccess: true,
                }),
            }
        },

        methods: {
            apkDone() {
                let form = this.$inertia.form({
                    _method: 'PUT',
                    id: this.userData.id,
                    is_apk_created: 1,
                });

                form.post(route('admin.progress.update', this.userData), {
                    preserveScroll: true,
                });
            },

            googleDone() {
                this.releaseForm.post(route('admin.progress.update', this.userData), {
                    preserveScroll: true,
                });

                this.isModalShown = false;
            }
        }
    }
</script>