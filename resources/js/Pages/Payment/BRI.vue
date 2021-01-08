<template>
    <app-layout>
        <template #header>
            Payment Pengusaha
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">

                <div class="bg-white rounded-md shadow-md p-6">
                    <div class="w-full sm:w-2/5">
                        <p>Pembayaran untuk Paket Pengusaha belum bisa menggunakan payment gateway iPaymu. Mohon untuk transfer langsung ke nomor rekening berikut:</p>
                        <h6 class="font-bold text-blue-500 mt-4 text-lg">
                            Bank BRI
                        </h6>
                        <p class="mt-1">
                            A/N. PT. Bengkel Web Indonesia
                        </p>
                        <div class="flex items-center mt-2">
                            <jet-input id="norek" v-model="norek"></jet-input>
                            <jet-button class="mx-2" @click.native="copy">
                                <i class="fas fa-copy"></i>
                            </jet-button>
                            <jet-action-message :on="successfullyCopied">
                                Disalin.
                            </jet-action-message>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout';
    import JetActionMessage from '@/Jetstream/ActionMessage';
    import JetInput from '@/Jetstream/Input';
    import JetButton from '@/Jetstream/Button';

    export default {
        components: {
            AppLayout,
            JetActionMessage,
            JetInput,
            JetButton,
        },

        data() {
            return {
                norek: 118601000318305,
                successfullyCopied: false,
            }
        },

        methods: {
            copy() {
                let cp = document.getElementById('norek');
                cp.select();

                document.execCommand('copy');

                this.successfullyCopied = true;

                setTimeout(() => {
                    this.successfullyCopied = false;
                }, 1000);
            }
        }
    }
</script>