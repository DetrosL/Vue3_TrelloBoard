<script setup lang="ts">
    import AppLayout from '@/layouts/AppLayout.vue';
    import { create }  from '@/routes/position';
    import {type BreadcrumbItem} from '@/types';
    import { Head, router } from '@inertiajs/vue3';
    import { defineProps } from 'vue';

    import { ref, inject } from 'vue'

    const position_col  = ref('');
    const title_col     = ref('');
    
    // const props = defineProps<{
    //     title: string,
    // }>();  

    const emit = defineEmits(['close']);

    function closeModal() {
        emit('close');
    }

    async function newCol(){        
        try {
            await router.post('/board/', {
                board_id: 1, // fixo por enquanto
                cod: position_col.value,
                desc: title_col.value,
                status: "A"
            }, {
                onSuccess: (page) => {
                    console.log('col created', page)
                    position_col.value = '';
                    title_col.value = '';
                },
                onError: (errors) => {
                    console.error('Error col:', errors)
                }
            })
        } catch (error) {
            console.error(error)
        }    
    }

</script>
<template>
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm overflow-y-auto">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md mx-auto animate-fade-in">
            <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4">
                <h4 class="text-lg text-gray-800"> New Column </h4>
                <button @click="closeModal" class="text-gray-500 hover:text-gray-700 rounded-full p-1 transition" >
                    <span class="material-icons text-xl">close</span>
                </button>
            </div>

            <div class="p-6">
                <form @submit.prevent="newCol" class="space-y-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                    <input
                        v-model="title_col"
                        type="text"
                        id="title"
                        name="title"
                        class="w-full border border-gray-300 rounded-md p-2.5 text-sm focus:ring-blue-500 focus:border-blue-500 trello-savei"/>

                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Position</label>
                    <input
                        v-model="position_col"
                        type="text"
                        id="title"
                        name="title"
                        class="w-full border border-gray-300 rounded-md p-2.5 text-sm focus:ring-blue-500 focus:border-blue-500 trello-savei"/>
                        <button type="submit" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 trello-save"> 
                            <span class="material-icons">add</span>
                        </button>
                </form>
            </div>
        </div>
    </div>
</template>