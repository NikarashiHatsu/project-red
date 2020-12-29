<template>
    <div class="bg-white p-6 mt-6 rounded-lg shadow-lg border-l-4">
        <h5 class="text-xl font-semibold mb-2">Panel Konfirmasi</h5>
        <p v-if="confirmed">Permintaan sudah diterima oleh Anda</p>
        <p v-else-if="rejected">Permintaan sudah ditolak</p>
        <p v-else>Terima permintaan toko ini?</p>
        <div class="flex flex-row-reverse mt-4">
            <jet-button :disabled="confirmed || rejected" :class="{ 'opacity-25': (confirmed || rejected) }" @click.native="terimaPermintaan()">
                Terima
            </jet-button>
            <jet-secondary-button :disabled="confirmed || rejected" :class="{ 'opacity-25': (confirmed || rejected) }" class="mr-2">
                Batalkan
            </jet-secondary-button>
        </div>
    </div>
</template>

<script>
    import JetButton from '@/Jetstream/Button';
    import JetSecondaryButton from '@/Jetstream/SecondaryButton';

    export default {
        components: {
            JetButton,
            JetSecondaryButton,
        },

        props: ['formOrder', 'confirmed', 'rejected'],

        methods: {
            terimaPermintaan() {
                let form = this.$inertia.form({
                    _method: 'PUT',
                    id: this.formOrder.id,
                    confirmed: 1,
                });
                
                form.post(route('form_order.update', this.formOrder), {
                    preserveScroll: true,
                });
            },

            tolakPermintaan() {
                let form = this.$inertia.form({
                    _method: 'PUT',
                    id: this.formOrder.id,
                    rejected: 1,
                });

                form.post(route('form_order.update', this.formOrder), {
                    preserveScroll: true,
                });
            }
        },
    }
</script>