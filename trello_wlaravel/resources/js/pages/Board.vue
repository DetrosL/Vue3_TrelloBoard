<script setup lang="ts">
    import Button from '@/components/ui/button/Button.vue';
    import HeaderT from './board/HeaderT.vue';
    import AppLayout from '@/layouts/AppLayout.vue';
    import { board }  from '@/routes';
    import { create as createP }  from '@/routes/position';
    import { create as createT }  from '@/routes/task';
    import {type BreadcrumbItem} from '@/types';
    import { Head, Link, usePage } from '@inertiajs/vue3';
    import { defineProps } from 'vue';

    
    interface Props {
        title: string;
    }

    defineProps<Props>();

    const breadcrumbs: BreadcrumbItem[] = [
        {
            title: 'Board',
            href: board.url(),
        },
    ];
    
    
    const page = usePage();
    // const board = page.props;
    console.log(page.props);
</script>
<template>    
    <Head title="Board" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <!-- <HeaderT/> -->
        <div class="p-4">
            <Link :href="createP.url()"><Button>New Position</Button></Link>
            <!-- <Link :href="createT.url()"><Button>New Task</Button></Link> -->
            <br>
            <!-- {{ board.title}} <br> -->
            teste
        </div>
    </AppLayout>
</template>