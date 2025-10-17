<script setup lang="ts">
// import ProfileController from '@/actions/App/Http/Controllers/Settings/ProfileController';
// import { edit } from '@/routes/profile';
// import { send } from '@/routes/verification';
import { Form, Head, Link, usePage } from '@inertiajs/vue3';

import { login, register } from '@/routes';
import { index } from '@/routes/board';
// import DeleteUser from '@/components/DeleteUser.vue';
// import HeadingSmall from '@/components/HeadingSmall.vue';
// import { Button } from '@/components/ui/button';
// import { Input } from '@/components/ui/input';
// import { Label } from '@/components/ui/label';
// import InputError from '@/components/InputError.vue';

interface Props {
    mustVerifyEmail: boolean;
    status?: string;
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
                        
                        <a class="navbar-brand" href="#"><img src="../assets/freeline.png" alt="freeline" style="width: 40px;"></a>
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
        <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-sm items-center justify-center mx-auto mt-20">
            <form class="space-y-6" action="#">
                <h5 class="text-xl font-medium">Sign in to our platform</h5>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium">Your email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required />
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium">Your password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                </div>
                <div class="flex items-start">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
                        </div>
                        <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-600">Remember me</label>
                    </div>
                    <a href="#" class="ms-auto text-sm text-blue-700 hover:underline dark:text-blue-500">Forget Password?</a>
                </div>
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    Not registered? <a href="#" class="text-blue-700 hover:underline dark:text-blue-500">Create account</a>
                </div>
            </form>
        </div>
    </div>
    
</template>