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
                <jet-secondary-button v-if="!haveThisItemOnCart" class="mr-2" @click.native="addToCart()">
                    Tambah ke Keranjang
                </jet-secondary-button>
                <jet-danger-button v-if="haveThisItemOnCart" class="mr-2" @click.native="removeFromCart()">
                    Hapus dari Keranjang
                </jet-danger-button>
            </div>
        </div>
    </div>
</template>

<script>
    import JetButton from '@/Jetstream/Button';
    import JetDangerButton from '@/Jetstream/DangerButton';
    import JetSecondaryButton from '@/Jetstream/SecondaryButton';

    export default {
        components: {
            JetButton,
            JetDangerButton,
            JetSecondaryButton,
        },

        mounted() {
            this.hasThisProduct = this.check();
        },

        data() {
            return {
                product: this.$page.data,
                hasThisProduct: false,
            }
        },

        methods: {
            addToCart() {
                let cart = localStorage.getItem('cart');
                let obj = JSON.parse(cart);

                obj.push(this.$page.data.id);

                localStorage.setItem('cart', JSON.stringify(obj));
                this.hasThisProduct = this.check();
            },
            removeFromCart() {
                let cart = localStorage.getItem('cart');
                let obj = JSON.parse(cart);
                let prodId = this.product.id;
                let final = [];

                obj.filter(function(data) {
                    if(data !== prodId) final.push(data);
                });

                localStorage.setItem('cart', JSON.stringify(final));
                this.hasThisProduct = this.check();
            },
            check() {
                let cart = localStorage.getItem('cart');
                let obj = JSON.parse(cart);
                let prodId = this.product.id;

                return (obj.find(el => el === prodId)) ? true : false;
            }
        },

        computed: {
            navbarColorTheme() {
                return `bg-${this.$page.color_choosen}-500 text-white`
            },

            haveThisItemOnCart() {
                return this.hasThisProduct;
            }
        }
    }
</script>