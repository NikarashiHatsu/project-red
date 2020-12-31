<template>
    <inertia-link :href="route('admin.user_request.show', user_id)" class="flex cursor-pointer transition ease-in-out duration-300 hover:bg-gray-100">
        <img class="h-10 w-10 rounded-full shadow-md mr-4" :src="logo_toko" :alt="nama_toko">
        <div class="flex flex-col">
            <p class="font-bold mb-1">
                {{ nama_pemilik }}
            </p>
            <p class="mb-1">
                <i class="fas fa-store fa-sm mr-1"></i>
                <span>
                    {{ nama_toko }}
                </span>
            </p>
            <p class="mb-1">
                <i class="fas fa-tag fa-sm mr-1"></i>
                <span>
                    {{ 'Paket ' + paket_yang_dipilih }}
                </span>
            </p>
            <p class="mb-1">
                <i class="fab fa-whatsapp fa-sm mr-1"></i>
                <span>
                    {{ whatsapp_number }}
                </span>
            </p>
        </div>
    </inertia-link>
</template>

<script>
    export default {
        props: ['userData'],

        created() {
            this.tentukanPaketYangDipilih();
        },

        data() {
            return {
                user_id: this.userData.user_id,
                logo_toko: this.userData.storage_logo_toko_path,
                nama_pemilik: this.userData.nama_pemilik,
                nama_toko: this.userData.nama_toko,
                whatsapp_number: this.userData.whatsapp_number,
                paket_yang_dipilih: '',
            }
        },
        
        methods: {
            tentukanPaketYangDipilih() {
                let pricing_id = this.userData.pricing_id;
                let pricing_name = {
                    plan1: 'Perintis',
                    plan2: 'UMKM',
                    plan3: 'Berkembang',
                    plan4: 'Pengusaha',
                };
                let paket_terpilih = `plan${pricing_id}`;

                this.paket_yang_dipilih = pricing_name[paket_terpilih];
            }
        }
    }
</script>