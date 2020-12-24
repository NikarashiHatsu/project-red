<template>
    <div class="bg-white shadow-md">
        <div :class="navbarColorTheme" class="flex justify-between items-center p-4">
            <div class="flex items-center">
                <i class="fas fa-arrow-left mr-4"></i>
                <span class="font-semibold">Toko {{ form_order.nama_toko }}</span>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="h-48 border-b">
                <img :src="product.storage_foto_produk_path" :alt="product.nama_produk" class="w-full h-full object-contain">
            </div>
            <div class="p-4 mb-4">
                <h5 class="text-xl font-bold mb-2">{{ product.nama_produk }}</h5>
                <p class="text-sm mb-2">{{ product.formatted_harga_produk }}</p>
                <p class="mb-2">{{ product.deskripsi_produk }}</p>
            </div>
            <div class="flex flex-row-reverse p-4">
                <jet-button>
                    Beli Langsung
                </jet-button>

                <jet-secondary-button class="mr-2">
                    Tambah ke Keranjang
                </jet-secondary-button>
            </div>
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
        
        props: ['colorChoosen', 'product'],

        data() {
            return {
                form_order: this.$page.data.form_order,
            }
        },

        computed: {
            navbarColorTheme() {
                return `bg-${this.colorChoosen}-500 text-white`
            }
        }
    }
</script>