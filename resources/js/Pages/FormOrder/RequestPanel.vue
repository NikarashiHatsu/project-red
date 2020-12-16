<template>
    <jet-form-section>
        <template #title>
            Ajukan Permintaan Aplikasi
        </template>

        <template #description>
            Ajukan permintaan pembuatan aplikasi Android Anda.
        </template>

        <template #form>
            <!-- Banner Toko -->
            <div class="col-span-6 sm:col-span-4">
                <p class="mb-4">Catatan: Pengajuan permintaan aplikasi akan dilaksanakan dengan jangka waktu 2-14 hari. Anda tidak bisa mengedit form apapun pada halaman ini setelah tombol dibawah ditekan. Pastikan semua informasi dan produk-produk diisi dengan sempurna.</p>
                <ol>
                    <li class="mb-2">
                        <p class="italic">Informasi Toko</p>
                        <ol>
                            <li>
                                <shiroyuki-fulfilled :info="'Logo Toko'" :value="informasi.logo_toko_path" />
                                <shiroyuki-fulfilled :info="'Banner Toko'" :value="informasi.banner_toko_path" />
                                <shiroyuki-fulfilled :info="'Nama Pemilik'" :value="informasi.nama_pemilik" />
                                <shiroyuki-fulfilled :info="'Nama Toko'" :value="informasi.nama_toko" />
                            </li>
                        </ol>
                    </li>
                    <li class="mb-2">
                        <p class="italic">Informasi Aplikasi</p>
                        <ol>
                            <li>
                                <shiroyuki-fulfilled :info="'Nama Aplikasi'" :value="informasi.nama_aplikasi" />
                                <shiroyuki-fulfilled :info="'Deskripsi Aplikasi'" :value="informasi.deskripsi_aplikasi" />
                                <shiroyuki-fulfilled :info="'Alamat Perusahaan'" :value="informasi.alamat_perusahaan" />
                                <shiroyuki-fulfilled :optional="true" :info="'URL Website Perusahaan (Opsional)'" :value="informasi.url_website_perusahaan" />
                            </li>
                        </ol>
                    </li>
                    <li class="mb-2">
                        <p class="italic">Informasi Media Sosial</p>
                        <ol>
                            <li>
                                <shiroyuki-fulfilled :info="'Nomor WhatsApp'" :value="informasi.whatsapp_number" />
                                <shiroyuki-fulfilled :optional="true" :info="'Link Facebook (Opsional)'" :value="informasi.facebook_link" />
                                <shiroyuki-fulfilled :optional="true" :info="'Link Instagram (Opsional)'" :value="informasi.instagram_link" />
                                <shiroyuki-fulfilled :optional="true" :info="'Link Twitter (Opsional)'" :value="informasi.twitter_link" />
                                <shiroyuki-fulfilled :optional="true" :info="'Link YouTube (Opsional)'" :value="informasi.youtube_link" />
                            </li>
                        </ol>
                    </li>
                </ol>
            </div>
        </template>
    </jet-form-section>
</template>

<script>
import JetButton from '@/Jetstream/Button';
import JetSecondaryButton from '@/Jetstream/SecondaryButton';
import JetFormSection from '@/Jetstream/FormSection';
import ShiroyukiFulfilled from '@/Shiroyuki/Fulfilled';

export default {
    components: {
        JetButton,
        JetSecondaryButton,
        JetFormSection,
        ShiroyukiFulfilled,
    },

    props: ['informasi'],
}
</script>