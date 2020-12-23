<template>
    <app-layout>
        <template #header>
            Layout Picker
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="grid grid-cols-12 grid-flow-row gap-6">
                    <div class="col-span-12 sm:col-span-5 md:col-span-6 lg:col-span-4 xl:col-span-4">
                        <layout-chooser :disabled="isRequested" :colorChoosen="this.form.color_scheme_used" class="mb-6" @layoutChoosen="layoutChoosen" />
                        <color-theme-chooser :disabled="isRequested" class="mb-6" @colorChoosen="colorChoosen" />
                        <div class="block lg:hidden">Layout Modifier (Pro Only)</div>
                    </div>
                    <div class="col-span-12 sm:col-span-7 md:col-span-6 lg:col-span-5 xl:col-span-4">
                        <previewer class="shadow-md" :layoutChoosen="this.form.layout_id_used" :colorChoosen="this.form.color_scheme_used" />
                    </div>
                    <div class="hidden lg:block lg:col-span-3 xl:col-span-4">
                        Layout Modifier (Pro Only)
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

    export default {
        components: {
            AppLayout,
            ColorThemeChooser,
            LayoutChooser,
            Previewer
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

            isRequested() {
                return this.$page.data.form_order.requested;
            }
        }
    }
</script>