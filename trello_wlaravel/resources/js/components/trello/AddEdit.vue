<script setup>
    import { ref, inject, defineProps, watch } from 'vue'
    import {onClickOutside} from '@vueuse/core'
    
    const list_columns  = inject('list_columns');
    const steps_todo    = ref([]);
    const tags_todo     = ref([]);
    const tag           = ref('');
    const color         = ref('');
    const list_todo     = inject('list_todo');
    const title_step    = ref('');
    const completed_step= ref(false);
    const title_todo    = ref('');
    const desc_todo     = ref('');
    const comments_todo = ref([]);
    const attach_todo   = ref([]);

    const props = defineProps({
        showModal: Boolean,
        isEdit: Boolean,
        id: [Number, String, null]
    });
    console.log('AddEdit: props', props);

    const emit = defineEmits(["close-task"]);

    watch(() => props.id, () => {
        if (props.isEdit) {
            editTask(props.id);
        }
    })

    function addTag(){
        const idX = tags_todo.value.length;

        tags_todo.value.push({
            id: idX,
            titleG: tag.value,
            colorG: color.value,
        });

        tag.value = '';
        color.value = '#000000';
    }

    function delTag(tag) {
        tags_todo.value = tags_todo.value.filter(t => t.id !== tag.id)
    }

    function addStep(){
        const idX = steps_todo.value.length;

        steps_todo.value.push({
            id: idX,
            titleS: title_step.value,
            completedS: completed_step.value,
        });

        title_step.value = '';
        completed_step.value = false;
    }

    function newTask(){
        const idX = list_todo.value.length;

        list_todo.value.push({
            id: idX,
            titleT: title_todo.value,
            descT: desc_todo.value,
            tagT: [...tags_todo.value],
            stepsT: [...steps_todo.value],
            commentsT: [],
            attachT: [],
        });
        list_columns.value[0].taskC.push(
            idX
        );
        console.log(list_columns.value[0]);

        title_todo.value    = '';
        desc_todo.value     = '';
        steps_todo.value    = [];
    }

    // 
    function editTask(id){
        let todo = list_todo.value[id]

        let title_todo      = todo.titleT.value
        let desc_todo       = todo.descT.value
        let tags_todo       = todo.tagT.value
        let steps_todo      = todo.stepsT.value
        let comments_todo   = todo.commentsT.value
        let attach_todo     = todo.attachT.value

        // process
    }

    function saveEdit(id){
        list_todo.value.push({
            id: id,
            titleT: title_todo.value,
            descT: desc_todo.value,
            tagT: [...tags_todo.value],
            stepsT: [...steps_todo.value],
            commentsT: [...comments_todo.value],
            attachT: [...attach_todo.value],
        });
    }
</script>
<template>
    <div class="overflow-y-auto backdrop-blur-xs fixed inset-0 flex z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full trello-modal-total">
        
        <!--class="modal-dialog modal-dialog-centered modal-total"-->
        <div class="relative max-h-full ">
            <div class="relative bg-white rounded-lg shadow-sm w-full"> <!--dark:bg-gray-700-->
                <!-- header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200"> <!--dark:border-gray-600-->
                    <h3 class="text-lg text-gray-900"><!--dark:text-white-->
                        {{ isEdit ? 'Edit Task' : 'New Task' }}
                    </h3>
                    <button @click="$emit('close-task')" class="text-gray-900 bg-transparent hover:bg-gray-200 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"><!--dark:text-white-->
                        <span class="material-icons">close</span>
                    </button>
                </div>
                <!-- body -->
                <form class="grid grid-cols-2 p-4 md:p-5" @submit.prevent="newTask">
                    <!-- <div class="flex trello-modal-tam gap-6"> -->

                        <div class="grid gap-4 trello-form1">
                            <div class="col-span-2">
                                <label 
                                    for="title" 
                                    class="block mb-2 text-sm font-medium text-gray-900">Title task</label> <!--dark:text-white-->
                                <input 
                                    v-model="title_task"
                                    type="text" 
                                    name="title" 
                                    id="title" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " 
                                    placeholder="..." 
                                    required=""> <!--dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500-->
                            </div>
                            <div class="col-span-2">
                                <label 
                                    for="message" 
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Task Description</label> <!--dark:text-white-->
                                <textarea 
                                    v-model="desc_todo"
                                    id="desc"
                                    name="desc"
                                    rows="5" 
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="..."></textarea> <!--dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500-->
                            </div>
                            <div class="col-span-2">
                                <div>
                                    <label
                                        for="tag" 
                                        class="block text-sm/6 font-medium text-black">Tag Task</label> <!--dark:text-black-->
                                    <div class="mt-3">
                                        <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-gray-600 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-500">
                                            <select
                                                v-model="tag"
                                                id="tags"
                                                name="tags"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                                <option selected="">Select tag</option>
                                                <option value="back">Back-end</option>
                                                <option value="front">Front-end</option>
                                                <option value="api">API</option>
                                            </select> <!--dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500-->
                                            <div class="grid shrink-0 grid-cols-1 focus-within:relative">
                                                <input
                                                    v-model="color"
                                                    type="color"
                                                    class="rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                    id="colors"
                                                    name="colors"
                                                    value="#000000"
                                                />
                                                
                                            </div>
                                            <div class="grid shrink-0 grid-cols-1 focus-within:relative">
                                                <button
                                                    class="btn btn-primary"
                                                    type="button"
                                                    @click="addTag"
                                                >
                                                <span class="material-icons">add</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-for="tag in tags_todo" :key="tag.id" class="rello-div-tags" >
                                <button class="trello-tag-color" :style="{backgroundColor: tag.colorG }" @click="delTag(tag)" ></button>
                            </div>
                        </div>

                        <div class="grid gap-4 trello-form2">
                            <div class="col-span-2">
                                <div>
                                    <label for="step" class="block text-sm/6 font-medium text-black">Step Task</label> <!--dark:text-black-->
                                    <div class="mt-3">
                                        <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-gray-600 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-500">
                                            <div class="grid shrink-0 grid-cols-1 focus-within:relative">
                                            <input 
                                                v-model="completed_step" 
                                                type="checkbox" />
                                            </div>
                                            <input 
                                                v-model="title_step"
                                                type="text" 
                                                name="step" 
                                                id="step" 
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " 
                                                placeholder="..." 
                                                required=""> <!--dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500-->
                                            <div class="grid shrink-0 grid-cols-1 focus-within:relative">
                                                <button
                                                    class="btn btn-primary"
                                                    type="button"
                                                    @click="addStep"
                                                >
                                                <span class="material-icons">add</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h6>Steps List:</h6>
                            <div v-for="step in steps_todo" :key="step.id" style="text-align: left;">
                                <input
                                    type="checkbox" 
                                    :checked="step.completedS"
                                    :id="step.id" /> - {{ step.titleS }}
                            </div>
                        </div>

                    <!-- </div> -->
                    
                    <button type="submit" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 trello-save"> <span class="material-icons">add</span><span>{{ isEdit ? 'Update' : 'Save' }}</span></button>
                    
                </form>
                
            </div> <!--content-->
        </div>
    </div> <!--dialog-->
</template>