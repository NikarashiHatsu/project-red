<template>
    <inertia-link class="block py-4 px-6" :class="hoverClasses" :href="url">
        <i v-show="!isFulfilled" class="fas fa-times-circle mr-2 text-red-400"></i>
        <i v-show="isFulfilled" class="fas fa-check-circle mr-2 text-green-400"></i>
        {{ title }}
    </inertia-link>
</template>

<script>
    export default {
        props: ['title', 'url', 'isFulfilled'],
        
        computed: {
            apakahTerpenuhi() {
                return this.isFulfilled;
            },

            hoverClasses() {
                let hov = 'transition ease-in-out duration-300 ';

                if (this.$page.data.layout_picker.color_scheme_used) {
                    hov += `hover:bg-${this.$page.data.layout_picker.color_scheme_used}-50`;
                } else {
                    hov == `hover:bg-gray-50`;
                }

                return hov;
            }
        }
    }
</script>