<script setup lang="ts">
    import { Form, Head, Link, usePage } from '@inertiajs/vue3';

    import { login, register } from '@/routes';
    import { index } from '@/routes/board';

    interface Props {
        mustVerifyEmail: boolean;
        status: string;
    }

    defineProps<Props>();

    const page = usePage();
    const user = page.props.auth.user;

</script>
<template>
    <div class="min-h-screen bg-gray-100">
        <header class="bg-white">
            <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="md:flex md:items-center md:gap-12">
                    <a class="block text-teal-600" href="#">
                        <span class="sr-only">Home</span>
                        <img src="../assets/freeline.png" alt="freeline" style="width: 40px;">
                    </a>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="sm:flex sm:gap-4">
                            <div class="hidden sm:flex">
                                <Link
                                    v-if="$page.props.auth.user"
                                    :href="index.url()"
                                    class="inline-block">
                                <a class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white shadow-sm" href="#">Dashboard</a>
                                </Link>
                                <template v-else>
                                    <Link :href="login()" class="inline-block">
                                        <a class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white shadow-sm" href="#">Login</a>
                                    </Link>
                                    <Link :href="register()" class="inline-block">
                                        <a class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-teal-600" href="#">Register </a>
                                    </Link>
                                </template>
                            </div>
                        </div>
                        <div class="block md:hidden">
                            <button
                            class="rounded-sm bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75"
                            >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8 "> <!--dark:bg-gray-800 dark:border-gray-700-->
            <h5 class="mb-2 text-3xl font-bold text-gray-900 ">Work fast from anywhere</h5> <!--dark:text-white-->
            <p class="mb-5 text-base text-gray-500 sm:text-lg ">Stay up to date and move work forward with Flowbite on iOS & Android. Download the app today.</p> <!--dark:text-gray-400-->
            <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
                <a href="#" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 "> <!--dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700-->
                    <svg class="me-3 w-7 h-7" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="apple" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"></path></svg>
                    <div class="text-left rtl:text-right">
                        <div class="mb-1 text-xs">Download on the</div>
                        <div class="-mt-1 font-sans text-sm font-semibold">Mac App Store</div>
                    </div>
                </a>
                <a href="#" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5">
                    <svg class="me-3 w-7 h-7" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google-play" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M325.3 234.3L104.6 13l280.8 161.2-60.1 60.1zM47 0C34 6.8 25.3 19.2 25.3 35.3v441.3c0 16.1 8.7 28.5 21.7 35.3l256.6-256L47 0zm425.2 225.6l-58.9-34.1-65.7 64.5 65.7 64.5 60.1-34.1c18-14.3 18-46.5-1.2-60.8zM104.6 499l280.8-161.2-60.1-60.1L104.6 499z"></path></svg>
                    <div class="text-left rtl:text-right">
                        <div class="mb-1 text-xs">Get in on</div>
                        <div class="-mt-1 font-sans text-sm font-semibold">Google Play</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    
</template>