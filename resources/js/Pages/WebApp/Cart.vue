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
                    :cartKey="index"
                    :product="prod"
                    @remove="remove"
                    @countChanged="recountSubtotal"
                    />

                <div class="mt-4">
                    <h6 class="text-lg">
                        Subtotal
                    </h6>
                    <p class="mt-1 text-sm">
                        {{ countSubtotal }}
                    </p>
                    <div class="flex justify-end mt-8 mb-4">
                        <button class="transition duration-300 ease-in-out rounded-md text-white
                                       px-2 py-1
                                       border border-green-600 hover:border-green-700
                                     bg-green-500 hover:bg-green-600 ">
                            Beli VIA WhatsApp
                        </button>
                    </div>
                </div>
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
            },

            recountSubtotal(key, quantity) {
                this.product[key].quantity = quantity;
            },
            remove(key) {
                let prods = JSON.parse(localStorage.getItem('cart'));
                
                prods.splice(0 + 1, 1);
                this.product.splice(0 + 1, 1);

                localStorage.setItem('cart', JSON.stringify(prods));
            }
        },

        computed: {
            navbarColorTheme() {
                return `bg-${this.$page.color_choosen}-500 text-white`
            },

            countSubtotal() {
                let subtotal = 0;
                
                this.product.forEach(function(el) {
                    subtotal += el.harga_produk * el.quantity;
                });

                var formatter = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0,
                });

                return formatter.format(subtotal);
            },
        }
    }
</script>