<script setup>
    import { ref, inject, defineProps, watch } from 'vue'
    import { index } from '@/routes/board';
    import {onClickOutside} from '@vueuse/core'
    
    const steps_task    = ref([]);
    const tags_task     = ref([]);
    const tag           = ref('');
    const color         = ref('');
    const list_task     = inject('list_task');
    const title_step    = ref('');
    const completed_step= ref(false);
    const title_task    = ref('');
    const desc_task     = ref('');
    const comments_task = ref([]);
    const attach_task   = ref([]);

    function addTag(){
        const idX = tags_task.value.length;

        tags_task.value.push({
            id: idX,
            titleG: tag.value,
            colorG: color.value,
        });

        tag.value = '';
        color.value = '#000000';
    }

    function delTag(tag) {
        tags_task.value = tags_task.value.filter(t => t.id !== tag.id)
    }

    function addStep(){
        const idX = steps_task.value.length;

        steps_task.value.push({
            id: idX,
            titleS: title_step.value,
            completedS: completed_step.value,
        });

        title_step.value = '';
        completed_step.value = false;
    }

    function newTask(){
        const idX = list_task.value.length;

        list_task.value.push({
            id: idX,
            titleT: title_task.value,
            descT: desc_task.value,
            tagT: [...tags_task.value],
            stepsT: [...steps_task.value],
            commentsT: [],
            attachT: [],
        });
        list_columns.value[0].taskC.push(
            idX
        );
        console.log(list_columns.value[0]);

        title_task.value    = '';
        desc_task.value     = '';
        steps_task.value    = [];

        //
    }

    // 
    function editTask(id){
        let todo = list_task.value[id]

        let title_task      = todo.titleT.value
        let desc_task       = todo.descT.value
        let tags_task       = todo.tagT.value
        let steps_task      = todo.stepsT.value
        let comments_task   = todo.commentsT.value
        let attach_task     = todo.attachT.value

        // process
    }

    function saveEdit(id){
        list_task.value.push({
            id: id,
            titleT: title_task.value,
            descT: desc_task.value,
            tagT: [...tags_task.value],
            stepsT: [...steps_task.value],
            commentsT: [...comments_task.value],
            attachT: [...attach_task.value],
        });
    }
</script>
<template>
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm overflow-y-auto p-4">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-5xl mx-auto animate-fade-in">
            <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4">
                <h4 class="text-lg font-semibold text-gray-800">
                    {{ isEdit ? 'Edit Task' : 'New Task' }}
                </h4>
                <button @click="$emit('close-task')" class="text-gray-500 hover:text-gray-700 rounded-full p-1 transition" >
                    <span class="material-icons text-xl">close</span>
                </button>
            </div>

            <div class="p-6">
                <form @submit.prevent="newTask" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="md:col-span-2 space-y-5">
                            <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title task</label>
                            <input
                                v-model="title_task"
                                type="text"
                                id="title"
                                name="title"
                                class="w-full border border-gray-300 rounded-md p-2.5 text-sm focus:ring-blue-500 focus:border-blue-500"
                            />
                            </div>

                            <div>
                                <label for="desc" class="block text-sm font-medium text-gray-700 mb-1">Description task</label>
                                <textarea
                                    v-model="desc_task"
                                    id="desc"
                                    name="text"
                                    rows="5"
                                    class="w-full border border-gray-300 rounded-md p-2.5 text-sm focus:ring-blue-500 focus:border-blue-500 trello-textarea"></textarea>
                            </div>
                            <div>
                                <label for="tags" class="block text-sm font-medium text-gray-700 mb-1">Tag task</label>
                                <div class="flex items-center gap-2">
                                    <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                                        <select
                                            v-model="tag"
                                            id="tags"
                                            name="tags"
                                            class="flex-1 border border-gray-300 rounded-md p-2.5 text-sm focus:ring-blue-500 focus:border-blue-500"
                                            >
                                            <option value=""></option>
                                            <option value="back">Back-end</option>
                                            <option value="front">Front-end</option>
                                            <option value="api">API</option>
                                        </select> <!--dark:border-white/10 dark:text-white dark:placeholder:text-neutral-200 dark:autofill:shadow-autofill dark:focus:border-primary-->                                    
                                        <input
                                            v-model="color"
                                            type="color"
                                            id="colors"
                                            name="colors"
                                            class="w-10 h-10 border border-gray-300 rounded-md cursor-pointer"/> <!-- dark:border-white/10 dark:text-white-->
                                        <button
                                            type="button"
                                            @click="addTag"
                                            class="bg-blue-600 hover:bg-blue-700 text-white rounded-md p-2.5 flex items-center justify-center">
                                            <span class="material-icons text-sm">add</span>
                                        </button> <!-- dark:border-white/10 dark:text-white-->
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-wrap gap-2 pt-2">
                                <button
                                    v-for="tag in tags_task"
                                    :key="tag.id"
                                    class="trello-tag-color"
                                    :style="{ backgroundColor: tag.colorG }"
                                    @click="delTag(tag)"></button>
                            </div>
                        </div>

                        <div class="space-y-5">
                            <div>
                                <label for="step" class="block text-sm font-medium text-gray-700 mb-1">Steps todo</label>
                                <div class="flex items-center gap-2">
                                    <input
                                        v-model="completed_step"
                                        type="checkbox"
                                        class="rounded border-gray-300 focus:ring-blue-500"/>
                                    <input
                                        v-model="title_step"
                                        type="text"
                                        id="step"
                                        name="step"
                                        class="flex-1 border border-gray-300 rounded-md p-2.5 text-sm focus:ring-blue-500 focus:border-blue-500"/>
                                    <button
                                        type="button"
                                        @click="addStep"
                                        class="bg-blue-600 hover:bg-blue-700 text-white rounded-md p-2.5 flex items-center justify-center">
                                        <span class="material-icons text-sm">add</span>
                                    </button>
                                </div>
                            </div>

                            <div>
                                <h6 class="text-sm font-semibold mb-2 text-gray-700">
                                    Steps List:
                                </h6>
                                <div
                                    v-for="step in steps_task"
                                    :key="step.id"
                                    class="flex items-center gap-2 text-sm text-gray-800">
                                    <input
                                        type="checkbox"
                                        :checked="step.completedS"
                                        :id="step.id"
                                        class="accent-blue-600"/>
                                    <label :for="step.id">{{ step.titleS }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end pt-4 border-t border-gray-100 trello-footer-form">
                        <button type="submit" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 trello-save"> 
                            <span class="material-icons">add</span>
                            <span>{{ isEdit ? 'Save' : 'Add' }}</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>