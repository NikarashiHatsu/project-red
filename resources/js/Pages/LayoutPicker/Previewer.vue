<template>
    <div class="relative bg-white">
        <div class="p-6" v-show="!layoutChoosen">
            Pilih jenis Layout yang ingin Anda gunakan di panel sebelah kiri.
        </div>
        
        <div class="absolute w-full bg-gray-900 shadow-lg rounded-3xl p-4">
            <div class="w-full flex flex-col bg-white rounded-3xl max-h-screen relative">
                <div class="flex items-center text-bold">
                    <div class="w-1/3 flex items-center pl-4 pt-2">
                        12.00AM
                    </div>
                    <div class="h-8 rounded-b-xl w-1/3 py-4 bg-gray-900"></div>
                    <div class="w-1/3 flex items-center pl-4 pt-1">
                        <i class="fas fa-signal mr-2"></i>
                        <i class="fas fa-wifi mr-2"></i>
                        <i class="fas fa-battery-three-quarters"></i>
                    </div>
                </div>
                <div class="w-full-h-ful overflow-y-auto rounded-b-3xl">
                    <layout-1 
                        v-show="layoutChoosen == 1"
                        :navbarColorTheme="navbarColorTheme"
                        :navbarNavColorTheme="navbarNavColorTheme"
                        :borderColorTheme="borderColorTheme"
                        :productsSectionColorTheme="productsSectionColorTheme"
                        :productsCount="productsCount" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Layout1 from './Layouts/Layout1';

    export default {
        components: {
            Layout1
        },
        
        props: ['layoutChoosen', 'colorChoosen'],

        created() {
            this.productsCount = this.$page.data.products.length;
        },

        data() {
            return {
                productsCount: 0,
            }
        },

        computed: {
            navbarColorTheme() {
                let bg = 'bg-white';

                if (this.colorChoosen) {
                    bg = `bg-${this.colorChoosen}-500 text-white`;
                }

                return bg;
            },

            navbarNavColorTheme() {
                let bg = 'hover:bg-gray-100';

                if (this.colorChoosen) {
                    bg = 'bg-gray-100 hover:bg-gray-200';
                }

                return bg;
            },

            borderColorTheme() {
                let border = 'border-gray-100';

                if (this.colorChoosen) {
                    border = `border-${this.colorChoosen}-100`;
                }

                return border;
            },

            productsSectionColorTheme() {
                let bg = 'bg-gray-50';

                if (this.colorChoosen) {
                    bg = `bg-${this.colorChoosen}-50`;
                }

                return bg;
            }
        }
    }
</script>