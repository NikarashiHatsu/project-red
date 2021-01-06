<template>
    <div class="max-w-md border-l border-r mx-auto shadow-xl min-h-screen bg-white relative">
        <div :class="navbarColorTheme" class="flex justify-between items-center p-4">
            <inertia-link :href="route('web.app', $page.data.id)" class="flex items-center">
                <i class="fas fa-arrow-left mr-4"></i>
            </inertia-link>
        </div>
        <div class="flex flex-col px-4">
            <h4 class="text-2xl font-semibold my-4">
                Keranjang Anda
            </h4>

            <div v-if="product.length > 0">
                <CartProduct 
                    v-for="(prod, index) in product"
                    :key="index"
                    :product="prod"
                    />
            </div>
            <div v-else>
                <span class="font-semibold">
                    Belum ada produk yang Anda tambahkan ke keranjang.
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    import CartProduct from './CartProduct';
    import JetButton from '@/Jetstream/Button';
    import JetSecondaryButton from '@/Jetstream/SecondaryButton';

    export default {
        components: {
            CartProduct,
            JetButton,
            JetSecondaryButton,
        },

        created() {
            this.getProducts();
        },

        data() {
            return {
                product: [],
            }
        },

        methods: {
            getProducts() {
                let prods = localStorage.getItem('cart');

                this.product = JSON.parse(prods);
            }
        },

        computed: {
            navbarColorTheme() {
                return `bg-${this.$page.color_choosen}-500 text-white`
            }
        }
    }
</script>