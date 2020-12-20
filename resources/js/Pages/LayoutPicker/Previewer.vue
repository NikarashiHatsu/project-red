<template>
    <div class="bg-white">
        <div class="p-6" v-show="!layoutChoosen">
            Pilih jenis Layout yang ingin Anda gunakan di panel sebelah kiri.
        </div>
        
        <layout-1 
            v-show="layoutChoosen == 1"
            :navbarColorTheme="navbarColorTheme"
            :navbarNavColorTheme="navbarNavColorTheme"
            :borderColorTheme="borderColorTheme"
            :productsSectionColorTheme="productsSectionColorTheme"
            :productsCount="productsCount" />
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