<script setup lang="ts">
    import AppLayout from '@/layouts/AppLayout.vue';
    import { create }  from '@/routes/position';
    import {type BreadcrumbItem} from '@/types';
    import { Head } from '@inertiajs/vue3';
    import { defineProps } from 'vue';

    // import { ref, inject } from 'vue'

    // const list_columns  = inject('list_columns');
    // const title_col     = ref('');

    const breadcrumbs: BreadcrumbItem[] = [
        {
            title: 'Create a Column',
            href: create.url(),
        },
    ];
    
    // const props = defineProps<{
    //     title: string,
    // }>();

    // function newCol(){
    //     const idX = list_columns.value.length;

    //     list_columns.value.push({
    //         id: idX,
    //         titleC: title_col.value,
    //         taskC: [],
    //     });

    //     title_col.value = '';
    // }

</script>
<template>    
    <Head title="New Column" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="modal fade" id="addColModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content d-flex">
                    <div class="modal-header">
                        <h4 class="modal-title">New Column</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div> 
                    <form > <!--@submit.prevent="newCol"-->
                        <label for="title" class="form-label">Title column:</label>
                        <input 
                            type="text" 
                            class="form-control inputs" 
                            id="title"
                            name="title" /><!--v-model="title_col"-->
                        <button button type="submit" class="btn btn-success save">Add</button>
                    </form> 
                </div>
            </div>
        </div>
    </AppLayout>
</template>