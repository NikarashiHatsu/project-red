<template>
    <app-layout>
        <template #header>
            Layout Picker
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="grid grid-cols-12 grid-flow-row gap-6">
                    <div class="col-span-12 sm:col-span-5 md:col-span-6 lg:col-span-3 xl:col-span-4">
                        <layout-chooser :disabled="$page.data.form_order.requested" :colorChoosen="this.form.color_scheme_used" class="mb-6" @layoutChoosen="layoutChoosen" />
                        <color-theme-chooser :disabled="$page.data.form_order.requested" class="mb-6" @colorChoosen="colorChoosen" />
                    </div>
                    <div class="col-span-12 sm:col-span-7 md:col-span-6 lg:col-span-5 xl:col-span-4">
                        <previewer class="shadow-md mb-4 lg:mb-0" :layoutChoosen="this.form.layout_id_used" :colorChoosen="this.form.color_scheme_used" />
                    </div>
                    <div class="hidden lg:block lg:col-span-4">
                        <div v-if="$page.data.products[0]" class="w-full bg-gray-900 shadow-lg rounded-3xl p-4">
                            <div class="w-full flex flex-col bg-white rounded-3xl h-screen max-h-screen relative">
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
                                    <product-detail v-show="form.layout_id_used" :product="$page.data.products[0]" :colorChoosen="this.form.color_scheme_used" />
                                </div>
                            </div>
                        </div>
                        <div v-else class="p-4 bg-white rounded-lg shadow-lg">
                            Tambahkan satu produk untuk melihat layout detail produk
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout';
    import ColorThemeChooser from './ColorThemeChooser';
    import LayoutChooser from './LayoutChooser';
    import Previewer from './Previewer';
    import ProductDetail from './Layouts/ProductDetail';

    export default {
        components: {
            AppLayout,
            ColorThemeChooser,
            LayoutChooser,
            Previewer,
            ProductDetail,
        },

        data() {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    id: this.$page.data.layout_picker.id,
                    form_order_id: this.$page.data.layout_picker.form_order_id,
                    layout_id_used: this.$page.data.layout_picker.layout_id_used,
                    color_scheme_used: this.$page.data.layout_picker.color_scheme_used,
                }, {
                    resetOnSuccess: false,
                }),
            }
        },

        methods: {
            layoutChoosen(layoutId) {
                this.form.layout_id_used = layoutId;
                this.form.post(route('layout_picker.update', this.$page.data.layout_picker), {
                    preserveScroll: true,
                });
            },

            colorChoosen(color) {
                this.form.color_scheme_used = color;
                this.form.post(route('layout_picker.update', this.$page.data.layout_picker), {
                    preserveScroll: true,
                });
            },
        }
    }
</script>