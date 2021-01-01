<template>
    <div class="max-w-md border-l border-r mx-auto shadow-xl min-h-screen bg-white relative">
        <div :class="navbarColorTheme" class="flex justify-between items-center p-4">
            <inertia-link :href="route('web.app', product.user_id)" class="flex items-center">
                <i class="fas fa-arrow-left mr-4"></i>
            </inertia-link>
        </div>
        <div class="flex flex-col">
            <div class="h-48 border-b">
                <img :src="product.storage_foto_produk_path" :alt="product.nama_produk" class="w-full h-full object-contain">
            </div>
            <div class="p-4 mb-4">
                <h5 class="text-xl font-bold mb-2">{{ product.nama_produk }}</h5>
                <p class="text-sm mb-2">{{ product.formatted_harga_produk }}</p>
                <p class="mb-2" v-html="product.nl2br_deskripsi"></p>
            </div>
            <div class="flex flex-row-reverse absolute right-0 bottom-0 p-4">
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

        data() {
            return {
                product: this.$page.data,
            }
        },

        computed: {
            navbarColorTheme() {
                return `bg-${this.$page.color_choosen}-500 text-white`
            }
        }
    }
</script>