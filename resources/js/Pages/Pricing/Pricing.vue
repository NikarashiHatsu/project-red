<template>
    <div class="lg:w-1/4 lg:mt-px w-full mb-10 lg:mb-0 border-2 border-gray-300 lg:border-none rounded-lg lg:rounded-none">
        <div class="px-2 text-center h-48 flex flex-col items-center justify-center">
            <h3 class="tracking-widest">
                {{ pricingTitle }}
            </h3>
            <h2 class="text-xl font-medium leading-none mb-4 mt-2">
                {{ pricingName }}
            </h2>
            <span class="text-sm">
                {{ pricingAdditionalInfo }}
            </span>
        </div>
        <div v-for="(data, index, key) in pricingData" :key="index">
            <p :class="{ 
                            'bg-gray-100': (key % 2 == 1),
                            'border-t border-gray-300 -mt-px': (key == 1),
                        }"
                class="text-gray-600 h-12 text-center px-2 flex items-center justify-center"
                v-if="index != 'id'">
                
                <span class="w-64 text-left lg:w-full lg:text-center">
                    <i v-if="data == true" class="fas fa-check-circle text-green-500"></i>
                    <i v-else-if="typeof data == 'number'" class="not-italic">{{ data }} Produk</i>
                    <i v-else-if="typeof data == 'string'" class="fas fa-infinity"></i>
                    <i v-else class="fas fa-times-circle text-red-500"></i>
                    <span class="inline-block lg:hidden">
                        {{ capitalizeFirstLetter(index.replace(/_/g, ' '))  }}
                    </span>
                </span>
            </p>
        </div>

        <div class="p-6 text-center border-t border-gray-300">
            <jet-button :class="{ 'opacity-25': (pricingData.id == pricing || disabled) } " :disabled="pricingData.id == pricing" @click.native="pilihPaket(pricingData.id)">
                <span v-if="pricing != pricingData.id">Pilih Paket {{ pricingTitle }}</span>
                <span v-else>Paket {{ pricingTitle}} Dipilih</span>
            </jet-button>
        </div>
    </div>
</template>

<script>
    import JetButton from '@/Jetstream/Button';

    export default {
        components: {
            JetButton,
        },
        
        props: ['pricingTitle', 'pricingName', 'pricingAdditionalInfo', 'pricingData'],

        data() {
            return {
                disabled: this.$page.data.form_order.requested
            }
        },

        methods: {
            capitalizeFirstLetter(string) {
                return string.replace(/(^\w{1})|(\s+\w{1})/g, letter => letter.toUpperCase());
            },

            pilihPaket(id) {
                let form = this.$inertia.form({
                    _method: 'PUT',
                    id: this.$page.data.form_order.id,
                    pricing_id: id,
                });

                form.post(route('form_order.update', this.$page.data.form_order), {
                    preserveScroll: true,
                });
            }
        },

        computed: {
            pricing() {
                return this.$page.data.form_order.pricing_id;
            }
        }
    }
</script>