<template>
    <div class="flex mb-4 pb-4 border-b">
        <img :src="product.storage_foto_produk_path" :alt="product.nama_produk" class="w-16 h-16 rounded-md border mr-2 object-contain">
        <div class="flex flex-col">
            <h5 class="text-xl font-semibold">
                {{ product.nama_produk }}
            </h5>
            <p class="mt-2 text-sm" v-html="product.nl2br_deskripsi"></p>
            <p class="mt-2">
                {{ product.formatted_harga_produk }}
            </p>
            <div class="flex mt-2 justify-between">
                <div class="flex">
                    <button @click="decrease" class="border py-0 px-2 rounded-l">
                        <i class="fas fa-chevron-left fa-sm"></i>
                    </button>
                    <input @change="changed" class="border-t border-b px-4 w-24" type="number" v-model="quantity" min="1" />
                    <button @click="increase" class="border py-0 px-2 rounded-r">
                        <i class="fas fa-chevron-right fa-sm"></i>
                    </button>
                </div>
                <jet-danger-button @click.native="remove">
                    <i class="fas fa-trash"></i>
                </jet-danger-button>
            </div>
        </div>
    </div>
</template>

<script>
    import JetDangerButton from '@/Jetstream/DangerButton';

    export default {
        components: {
            JetDangerButton
        },
        props: ['product', 'cartKey'],
        data() {
            return {
                quantity: 1,
            }
        },
        methods: {
            increase() {
                this.quantity++;
                this.$emit('countChanged', this.cartKey, this.quantity);
            },
            decrease() {
                if(this.quantity > 1) this.quantity--;
                this.$emit('countChanged', this.cartKey, this.quantity);
            },
            changed() {
                this.$emit('countChanged', this.cartKey, this.quantity);
            },
            remove() {
                this.$emit('remove', this.cartKey);
            }
        }
    }
</script>