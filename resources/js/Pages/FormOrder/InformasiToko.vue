<template>
    <jet-form-section @submitted="submitInformasiToko">
        <template #title>
            Informasi Toko
        </template>

        <template #description>
            Data-data ini diperlukan untuk aplikasi Android Anda.
        </template>

        <template #form>
            <!-- Banner Toko -->
            <div class="col-span-6 sm:col-span-4">
                <!-- File input banner toko -->
                <input type="file" :disabled="sudahDiajukan" ref="bannerToko" class="hidden" @change="updateBannerTokoPreview">
                <jet-label for="bannerToko" value="Banner Toko (Ratio 16:5, Max 2MB)" />

                <!-- Banner toko sekarang -->
                <div class="mt-2" v-show="!bannerTokoPreview">
                    <div class="block rounded-md aspect-w-16 aspect-h-5 border"
                        :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + informasi.storage_banner_toko_path + '\');'"></div>
                </div>

                <!-- Preview banner toko baru -->
                <div class="mt-2" v-show="bannerTokoPreview">
                    <span class="block rounded-md aspect-w-16 aspect-h-5 border"
                        :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + bannerTokoPreview + '\');'"></span>
                </div>
                
                <!-- Buttons -->
                <jet-secondary-button :disabled="sudahDiajukan" :class="{ 'bg-gray-100': sudahDiajukan }" class="mt-2 mr-2" type="button" @click.native.prevent="selectNewBannerToko">
                    Pilih Banner Toko
                </jet-secondary-button>

                <!-- Error message -->
                <jet-input-error :message="form.error('banner_toko_path')" class="mt-2" />
            </div>
            
            <!-- Logo Toko -->
            <div class="col-span-6 sm:col-span-4">
                <!-- File input logo toko -->
                <input type="file" :disabled="sudahDiajukan" class="hidden" ref="logoToko" @change="updateLogoTokoPreview" />
                <jet-label for="logoToko" value="Logo Toko (Ratio 1:1, Max 1MB)" />

                <!-- Logo toko sekarang -->
                <div class="mt-2" v-show="!logoTokoPreview">
                    <img :src="informasi.storage_logo_toko_path" alt=" " class="rounded-full h-20 w-20 object-cover border" />
                </div>

                <!-- Preview logo toko baru -->
                <div class="mt-2" v-show="logoTokoPreview">
                    <span class="block rounded-full w-20 h-20 border"
                          :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + logoTokoPreview + '\');'">
                    </span>
                </div>
                
                <!-- Buttons -->
                <jet-secondary-button :disabled="sudahDiajukan" :class="{ 'bg-gray-100': sudahDiajukan }" class="mt-2 mr-2" type="button" @click.native.prevent="selectNewLogoToko">
                    Pilih Logo Toko
                </jet-secondary-button>

                <!-- Error message -->
                <jet-input-error :message="form.error('logo_toko_path')" class="mt-2" />
            </div>

            <!-- Nama -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="nama_pemilik" value="Nama Pemilik" />
                <jet-input id="nama_pemilik" :disabled="sudahDiajukan" type="text" :class="{ 'bg-gray-100': sudahDiajukan }" class="mt-1 block w-full bg-gray-100" v-model="form.nama_pemilik" autocomplete="nama_pemilik" readonly />
                <jet-input-error :message="form.error('nama_pemilik')" class="mt-2" />
            </div>

            <!-- Nama Toko -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="nama_toko" value="Nama Toko" />
                <jet-input id="nama_toko" :disabled="sudahDiajukan" type="text" :class="{ 'bg-gray-100': sudahDiajukan }" class="mt-1 block w-full" v-model="form.nama_toko" autocomplete="nama_toko" />
                <jet-input-error :message="form.error('nama_toko')" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Tersimpan
            </jet-action-message>
            
            <jet-button :disabled="sudahDiajukan" :class="{ 'opacity-25': sudahDiajukan }" @type="'submit'">
                Simpan
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
    import JetButton from '@/Jetstream/Button';
    import JetSecondaryButton from '@/Jetstream/SecondaryButton';
    import JetActionMessage from '@/Jetstream/ActionMessage';
    import JetFormSection from '@/Jetstream/FormSection';
    import JetLabel from '@/Jetstream/Label';
    import JetInput from '@/Jetstream/Input';
    import JetInputError from '@/Jetstream/InputError';

    export default {
        // Daftarkan komponen-komponen yang digunakan
        components: {
            JetButton,
            JetSecondaryButton,
            JetActionMessage,
            JetFormSection,
            JetLabel,
            JetInput,
            JetInputError,
        },

        props: ['informasi', 'sudahDiajukan'],

        // Set data
        data() {
            return {
                // Digunakan untuk preview
                logoTokoPreview: null,
                bannerTokoPreview: null,
                
                // Form untuk PUT atau STORE
                form: this.$inertia.form({
                    _method: 'PUT',
                    id: this.informasi.id,
                    nama_pemilik: this.$page.user.name,
                    nama_toko: this.informasi.nama_toko,
                    logo_toko_path: null,
                    banner_toko_path: null,
                }, {
                    resetOnSuccess: false,
                }),
            }
        },

        // Daftarkan metode-metode
        methods: {
            // Submit informasi toko
            submitInformasiToko() {
                // Masukkan logo toko ke form
                if (this.$refs.logoToko) {
                    this.form.logo_toko_path = this.$refs.logoToko.files[0];
                }

                // Masukkan banner toko ke form
                if (this.$refs.bannerToko) {
                    this.form.banner_toko_path = this.$refs.bannerToko.files[0];
                }

                // Lakukan transaksi
                this.form.post(route('form_order.update', this.$page.data), {
                    preserveScroll: true,
                });
                
                // Emit
                this.$emit('submitted');
            },
            
            // Buka file manager untuk logo
            selectNewLogoToko() {
                this.$refs.logoToko.click();
            },
            
            // Buka file manager untuk banner
            selectNewBannerToko() {
                this.$refs.bannerToko.click();
            },

            // Mengupdate logo (hanya sebagai preview)
            updateLogoTokoPreview() {
                const reader = new FileReader();

                reader.onload = (e) => {
                    this.logoTokoPreview = e.target.result;
                };

                reader.readAsDataURL(this.$refs.logoToko.files[0]);
            },

            // Mengupdate banner (hanya sebagai preview)
            updateBannerTokoPreview() {
                const reader = new FileReader();

                reader.onload = (e) => {
                    this.bannerTokoPreview = e.target.result;
                };

                reader.readAsDataURL(this.$refs.bannerToko.files[0]);
            },
        }
    }
</script>