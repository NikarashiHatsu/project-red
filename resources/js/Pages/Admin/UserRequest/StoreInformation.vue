<template>
    <div class="bg-white p-6 rounded-none sm:rounded-lg shadow-lg border-l-4">
        <div class="flex justify-between mb-4">
            <h5 class="text-xl font-semibold">Informasi Toko</h5>
            <span class="inline-flex px-2 py-1 bg-green-200 border border-green-400 rounded-lg text-green-800" v-if="confirmed">Diterima</span>
            <span class="inline-flex px-2 py-1 bg-red-200 border border-red-400 rounded-lg text-red-800" v-else-if="rejected">Ditolak</span>
            <span class="inline-flex px-2 py-1 bg-yellow-200 border border-yellow-400 rounded-lg text-yellow-800" v-else>Belum Dikonfirmasi</span>
        </div>

        <div class="grid grid-cols-12 md:grid-flow-row gap-6 mb-6">
            <div class="col-span-12 lg:col-span-6">
                <h6 class="text-large font-semibold mb-1">Banner Toko</h6>
                <div class="block rounded-md aspect-w-16 aspect-h-5 border"
                    :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + storeInfo.storage_banner_toko_path + '\');'"></div>
            </div>

            <div class="col-span-12 lg:col-span-6">
                <h6 class="text-large font-semibold mb-1">Logo Toko</h6>
                <div class="h-28 w-28">
                    <div class="block rounded-md aspect-w-1 aspect-h-1 border"
                        :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + storeInfo.storage_logo_toko_path + '\');'"></div>
                </div>
            </div>

            <div class="col-span-12 md:col-span-6">
                <h6 class="text-large font-semibold mb-1">Nama Toko</h6>
                <p>{{ storeInfo.nama_toko }}</p>
            </div>

            <div class="col-span-12 md:col-span-6">
                <h6 class="text-large font-semibold mb-1">Pemilik Toko</h6>
                <p>{{ storeInfo.nama_pemilik }}</p>
            </div>
            
            <div class="col-span-12 border-b"></div>

            <div class="col-span-12 md:col-span-6 lg:col-span-4">
                <h6 class="text-large font-semibold mb-1">Nama Aplikasi</h6>
                <p>{{ storeInfo.nama_aplikasi }}</p>
            </div>

            <div class="col-span-12 md:col-span-6 lg:col-span-4">
                <h6 class="text-large font-semibold mb-1">Deskripsi Aplikasi</h6>
                <p>{{ storeInfo.deskripsi_aplikasi }}</p>
            </div>

            <div class="col-span-12 md:col-span-6 lg:col-span-4">
                <h6 class="text-large font-semibold mb-1">URL Website Toko</h6>
                <p>{{ storeInfo.url_website_perusahaan }}</p>
            </div>

            <div class="col-span-12 md:col-span-6 lg:col-span-4">
                <h6 class="text-large font-semibold mb-1">Alamat Toko</h6>
                <p v-html="storeInfo.nl2br_alamat_perusahaan"></p>
            </div>

            <div class="col-span-12 border-b"></div>
        </div>

        <div class="grid grid-cols-10 grid-flow-row gap-6 mb-6">
            <div class="col-span-10 md:col-span-5 lg:col-span-2">
                <h6 class="text-large font-semibold mb-2">WhatsApp</h6>
                <div v-if="storeInfo.whatsapp_number">
                    <a :href="'https://web.whatsapp.com/send?phone=' + storeInfo.whatsapp_number" target="_blank" class="block bg-green-600 hover:bg-green-700 transition duration-300 ease-in-out rounded-md text-white px-2 py-1">
                        <i class="fab fa-whatsapp mr-1"></i>
                        <span>WhatsApp</span>
                    </a>
                </div>
                <div v-else>-</div>
            </div>

            <div class="col-span-10 md:col-span-5 lg:col-span-2">
                <h6 class="text-large font-semibold mb-2">YouTube</h6>
                <div v-if="storeInfo.youtube_link">
                    <a :href="storeInfo.youtube_link" target="_blank" class="block bg-red-600 hover:bg-red-700 transition duration-300 ease-in-out rounded-md text-white px-2 py-1">
                        <i class="fab fa-youtube mr-1"></i>
                        <span>YouTube</span>
                    </a>
                </div>
                <div v-else>-</div>
            </div>

            <div class="col-span-10 md:col-span-5 lg:col-span-2">
                <h6 class="text-large font-semibold mb-2">Facebook</h6>
                <div v-if="storeInfo.facebook_link">
                    <a :href="storeInfo.facebook_link" target="_blank" class="block bg-blue-600 hover:bg-blue-700 transition duration-300 ease-in-out rounded-md text-white px-2 py-1">
                        <i class="fab fa-facebook mr-1"></i>
                        <span>Facebook</span>
                    </a>
                </div>
                <div v-else>-</div>
            </div>

            <div class="col-span-10 md:col-span-5 lg:col-span-2">
                <h6 class="text-large font-semibold mb-2">Instagram</h6>
                <div v-if="storeInfo.instagram_link">
                    <a :href="storeInfo.instagram_link" target="_blank" class="block bg-purple-600 hover:bg-purple-700 transition duration-300 ease-in-out rounded-md text-white px-2 py-1">
                        <i class="fab fa-instagram mr-1"></i>
                        <span>Instagram</span>
                    </a>
                </div>
                <div v-else>-</div>
            </div>

            <div class="col-span-10 md:col-span-5 lg:col-span-2">
                <h6 class="text-large font-semibold mb-2">Twitter</h6>
                <div v-if="storeInfo.twitter_link">
                    <a :href="storeInfo.twitter_link" target="_blank" class="block bg-lightBlue-600 hover:bg-lightBlue-700 transition duration-300 ease-in-out rounded-md text-white px-2 py-1">
                        <i class="fab fa-twitter mr-1"></i>
                        <span>Twitter</span>
                    </a>
                </div>
                <div v-else>-</div>
            </div>

            <div class="col-span-10 border-b"></div>
        </div>

        <h6 class="text-large font-semibold mb-2">Produk ({{ productsLength }} produk)</h6>

        <div class="grid grid-cols-12 grid-flow-row gap-6">
            <products 
                v-for="prod in products" 
                :key="prod.id"
                :image="prod.storage_foto_produk_path"
                :price="prod.formatted_harga_produk"
                :productName="prod.nama_produk"
                :description="prod.nl2br_deskripsi" />
        </div>

    </div>
</template>

<script>
    import Products from './Products';
    
    export default {
        components: {
            Products,
        },

        created() {
            this.countProductsLength();
        },

        data() {
            return {
                productsLength: 0,
            }
        },
        
        props: ['storeInfo', 'products', 'confirmed', 'rejected'],

        methods: {
            countProductsLength() {
                this.productsLength = this.products.length;
            }
        }
    }
</script>