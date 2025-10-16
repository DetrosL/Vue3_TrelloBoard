<script setup lang="ts">
    import AppLayout from '@/layouts/AppLayout.vue';
    import {index}  from '@/routes/board';
    import {type BreadcrumbItem} from '@/types';
    import { Head } from '@inertiajs/vue3';

    const breadcrumbs: BreadcrumbItem[] = [
        {
            title: 'Board',
            href: index.url(),
        },
    ];

</script>
<template>    
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4">
            teste
        </div>
    </AppLayout>
</template>