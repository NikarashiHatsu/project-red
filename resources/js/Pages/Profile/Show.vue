<template>
    <div>
        <app-layout v-if="$page.user.role == 'owner'">
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Profile
                </h2>
            </template>

            <div>
                <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                    <div v-if="$page.jetstream.canUpdateProfileInformation">
                        <update-profile-information-form :user="$page.user" />

                        <jet-section-border />
                    </div>

                    <div v-if="$page.jetstream.canUpdatePassword">
                        <update-password-form class="mt-10 sm:mt-0" />

                        <jet-section-border />
                    </div>

                    <div v-if="$page.jetstream.canManageTwoFactorAuthentication">
                        <two-factor-authentication-form class="mt-10 sm:mt-0" />

                        <jet-section-border />
                    </div>

                    <logout-other-browser-sessions-form :sessions="sessions" class="mt-10 sm:mt-0" />

                    <jet-section-border />

                    <delete-user-form class="mt-10 sm:mt-0" />
                </div>
            </div>
        </app-layout>

        <admin-app-layout v-if="$page.user.role == 'admin'">
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Profile
                </h2>
            </template>

            <div>
                <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                    <div v-if="$page.jetstream.canUpdateProfileInformation">
                        <update-profile-information-form :user="$page.user" />

                        <jet-section-border />
                    </div>

                    <div v-if="$page.jetstream.canUpdatePassword">
                        <update-password-form class="mt-10 sm:mt-0" />

                        <jet-section-border />
                    </div>

                    <div v-if="$page.jetstream.canManageTwoFactorAuthentication">
                        <two-factor-authentication-form class="mt-10 sm:mt-0" />

                        <jet-section-border />
                    </div>

                    <logout-other-browser-sessions-form :sessions="sessions" class="mt-10 sm:mt-0" />

                    <jet-section-border />

                    <delete-user-form class="mt-10 sm:mt-0" />
                </div>
            </div>
        </admin-app-layout>
    </div>
</template>

<script>
    import AdminAppLayout from '@/Layouts/AdminAppLayout'
    import AppLayout from '@/Layouts/AppLayout'
    import DeleteUserForm from './DeleteUserForm'
    import JetSectionBorder from '@/Jetstream/SectionBorder'
    import LogoutOtherBrowserSessionsForm from './LogoutOtherBrowserSessionsForm'
    import TwoFactorAuthenticationForm from './TwoFactorAuthenticationForm'
    import UpdatePasswordForm from './UpdatePasswordForm'
    import UpdateProfileInformationForm from './UpdateProfileInformationForm'

    export default {
        props: ['sessions'],

        components: {
            AdminAppLayout,
            AppLayout,
            DeleteUserForm,
            JetSectionBorder,
            LogoutOtherBrowserSessionsForm,
            TwoFactorAuthenticationForm,
            UpdatePasswordForm,
            UpdateProfileInformationForm,
        },
    }
</script>
