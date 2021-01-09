<template>
    <div class="bg-white p-6 mt-6 rounded-none sm:rounded-lg shadow-lg border-l-4">
        <h5 class="text-xl font-semibold mb-2">Panel Konfirmasi</h5>
        <p v-if="confirmed">Permintaan sudah diterima oleh Anda</p>
        <p v-else-if="rejected">Permintaan sudah ditolak</p>
        <p v-else>Terima permintaan toko ini?</p>

        <p class="text-red-700 my-4" v-if="$page.data.form_order.pricing_id == 4">
            Paket yang diajukan adalah Paket Pengusaha. Tolong cek kembali apakah pembayaran sudah diajukan atau belum.
        </p> 
        
        <div class="flex flex-row-reverse mt-4">
            <jet-button :disabled="confirmed || rejected" :class="{ 'opacity-25': (confirmed || rejected) }" @click.native="terimaPermintaan()">
                Terima
            </jet-button>
            <jet-secondary-button :disabled="confirmed || rejected" :class="{ 'opacity-25': (confirmed || rejected) }" @click.native="dialogShown = true" class="mr-2">
                Batalkan
            </jet-secondary-button>
        </div>

        <jet-dialog-modal :show="dialogShown">
            <template #title>
                Konfirmasi Penolakan
            </template>

            <template #content>
                <p class="mb-4">Apakah Anda yakin ingin menolak permintaan ini? Jika iya, berikan alasan mengapa Anda menolak permintaan ini.</p>
                <textarea rows="5" class="form-input rounded-md border block w-full" v-model="rejectionForm.rejected_reason"></textarea>
            </template>

            <template #footer>
                <div class="flex flex-row-reverse">
                    <jet-danger-button @click.native="tolakPermintaan">
                        Tolak Permintaan
                    </jet-danger-button>

                    <jet-secondary-button class="mr-2" @click.native="dialogShown = false">
                        Batalkan
                    </jet-secondary-button>
                </div>
            </template>
        </jet-dialog-modal>
    </div>
</template>

<script>
    import JetButton from '@/Jetstream/Button';
    import JetDangerButton from '@/Jetstream/DangerButton';
    import JetDialogModal from '@/Jetstream/DialogModal';
    import JetSecondaryButton from '@/Jetstream/SecondaryButton';

    export default {
        components: {
            JetButton,
            JetDangerButton,
            JetDialogModal,
            JetSecondaryButton,
        },

        props: ['formOrder', 'confirmed', 'rejected'],

        data() {
            return {
                dialogShown: false,
                confirmationForm: this.$inertia.form({
                    _method: 'PUT',
                    id: this.formOrder.id,
                    confirmed: 1,
                }),
                rejectionForm: this.$inertia.form({
                    _method: 'PUT',
                    id: this.formOrder.id,
                    rejected: 1,
                    rejected_reason: '',
                }),
            }
        },

        methods: {
            terimaPermintaan() {
                this.confirmationForm.post(route('form_order.update', this.formOrder), {
                    preserveScroll: true,
                });
            },

            tolakPermintaan() {
                this.rejectionForm.post(route('form_order.update', this.formOrder), {
                    preserveScroll: true,
                });

                this.dialogShown = false;
            },
        },
    }
</script>