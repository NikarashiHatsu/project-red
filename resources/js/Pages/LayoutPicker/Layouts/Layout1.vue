<template>
    <div>
        <!-- Navbar -->
        <div :class="navbarColorTheme" class="flex justify-between items-center p-4 shadow-md">
            <div class="flex items-center">
                <span class="font-semibold">Toko {{ form_order.nama_toko }}</span>
            </div>
        </div>
        <!-- !Navbar -->
        
        <!-- Body -->
        <div :class="borderColorTheme" class="w-full text-gray-700 body-font border-b-2">
            
            <!-- Profile Section -->
            <section :class="borderColorTheme" class="flex flex-col border-b-2">

                <!-- Banner -->
                <div class="w-full aspect-w-16 aspect-h-8" 
                    :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + form_order.storage_banner_toko_path + '\');'">
                </div>
                <!-- !Banner -->

                <!-- Profile Information -->
                <div class="flex p-6">
                    <!-- Store Profile Picture -->
                    <div class="flex">
                        <img class="rounded-full shadow-md w-12 h-12" :src="form_order.storage_logo_toko_path" :alt="form_order.nama_toko" />
                    </div>
                    <!-- !Store Profile Picture -->

                    <!-- Store Information -->
                    <div class="flex flex-col ml-4">
                        <h5 class="text-xl font-semibold mb-2">{{ form_order.nama_toko }}</h5>

                        <div>
                            <i class="fas fa-map-marker-alt mr-1 mt-1 align-top inline-block"></i>
                            <span class="mb-1 inline-block" v-html="form_order.nl2br_alamat_perusahaan"></span>
                        </div>
                        
                        <a class="block mb-1" :href="form_order.whatsapp_number" v-show="form_order.whatsapp_number">
                            <i class="fab fa-whatsapp mr-1"></i>
                            <span>{{ form_order.whatsapp_number }}</span>
                        </a>
                        <a class="block mb-1" :href="form_order.youtube_link" v-show="form_order.youtube_link">
                            <i class="fab fa-youtube mr-1"></i>
                            <span>YouTube</span>
                        </a>
                        <a class="block mb-1" :href="form_order.facebook_link" v-show="form_order.facebook_link">
                            <i class="fab fa-facebook mr-1"></i>
                            <span>Facebook</span>
                        </a>
                        <a class="block mb-1" :href="form_order.instagram_link" v-show="form_order.instagram_link">
                            <i class="fab fa-instagram mr-1"></i>
                            <span>Instagram</span>
                        </a>
                        <a class="block mb-1" :href="form_order.twitter" v-show="form_order.twitter">
                            <i class="fab fa-twitter mr-1"></i>
                            <span>Twitter</span>
                        </a>
                    </div>
                    <!-- !Store Information -->

                </div>
                <!-- !Profile Information -->
            </section>
            <!-- !Profile Section -->

            <!-- Products Section -->
            <section :class="productsSectionColorTheme" class="w-full pt-4 pb-6">
                <!-- Informasi list produk -->
                <p class="px-6 mb-4">
                    {{ productsCount }} Produk
                </p>
                <!-- !Informasi list produk -->
                
                <div class="grid grid-cols-2 grid-flow-row gap-6 px-6">
                    <div class="col-span-1 bg-white rounded-md shadow-md border transition ease-in-out duration-300" 
                         v-for="(prod, index) in this.$page.data.products" 
                         v-show="index < batasProduk"
                         :key="prod.id">
                        <div class="w-full aspect-w-1 aspect-h-1 rounded-t-md"
                            :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + prod.storage_foto_produk_path + '\');'"></div>
                        <div class="p-2">
                            <p class="overflow-hidden max-w-full" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; text-overflow: ellipsis;">
                                {{ prod.nama_produk }}
                            </p>
                            <h6 class="text-large font-bold">
                                {{ prod.formatted_harga_produk }}
                            </h6>
                        </div>
                    </div>
                </div>
            </section>
            <!-- !Products Section -->
            
        </div>
        <!-- !Body -->

        <!-- Footer -->
        <footer class="p-6">
            <p class="font-bold text-center mb-2">Beli Aneka Produk Online dari Toko {{ form_order.nama_toko }}</p>
            <p class="mb-2 text-center">Beli aneka produk di Toko {{ form_order.nama_toko }} secara online sekarang. Kamu bisa beli produk dari Toko {{ form_order.nama_toko }} dengan aman & mudah dari Kab. Cirebon. Beli aneka produk terbaru di Toko {{ form_order.nama_toko }} dengan mudah dari genggaman tangan kamu menggunakan Aplikasi. Cek terus Toko {{ form_order.nama_toko }} untuk update Produk secara online!</p>
        </footer>
        <!-- !Footer -->
    </div>
</template>

<script>
    export default {
        props: [
            'navbarColorTheme', 
            'navbarNavColorTheme', 
            'borderColorTheme', 
            'productsSectionColorTheme', 
            'productsCount',
        ],

        created() {
            this.hitungBatasProduk();
        },

        data() {
            return {
                form_order: this.$page.data.form_order,
                batasProduk: 0,
            }
        },

        methods: {
            hitungBatasProduk() {
                let pricingId = this.$page.data.form_order.pricing_id;

                if(pricingId == 1) this.batasProduk = 12;
                if(pricingId == 2) this.batasProduk = 24;
                if(pricingId == 3) this.batasProduk = 52;
                if(pricingId == 4) this.batasProduk = Infinity;
            },
        }
    }
</script>