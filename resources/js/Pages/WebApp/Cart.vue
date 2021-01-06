<template>
    <div class="max-w-md border-l border-r mx-auto shadow-xl min-h-screen bg-white relative">
        <div :class="navbarColorTheme" class="flex justify-between items-center p-4">
            <inertia-link :href="route('web.app', product.user_id)" class="flex items-center">
                <i class="fas fa-arrow-left mr-4"></i>
            </inertia-link>
        </div>
        <div class="flex flex-col">
            
        </div>
    </div>
</template>

<script>
    import JetButton from '@/Jetstream/Button';
    import JetSecondaryButton from '@/Jetstream/SecondaryButton';

    export default {
        components: {
            JetButton,
            JetSecondaryButton,
        },

        data() {
            return {
                product: this.$page.data,
            }
        },

        computed: {
            navbarColorTheme() {
                return `bg-${this.$page.color_choosen}-500 text-white`
            }
        }
    }
</script>