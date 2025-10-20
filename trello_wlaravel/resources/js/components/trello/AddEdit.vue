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
    <div class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"> <!--class="modal-dialog modal-dialog-centered modal-total"-->
        
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm "> <!--dark:bg-gray-700-->
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
                <form class="p-4 md:p-5">
                    <div class="grid gap-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Title task:</label> <!--dark:text-white-->
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Type product name" required=""> <!--dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500-->
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                            <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                            <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="">Select category</option>
                                <option value="TV">TV/Monitors</option>
                                <option value="PC">PC</option>
                                <option value="GA">Gaming/Console</option>
                                <option value="PH">Phones</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                            <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here"></textarea>                    
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Add new product
                    </button>
                </form>
                
                <div class="modal-body">
                    <form @submit.prevent="newTask"> <!--dar um jeito de fazer acionar outra função(saveEdit) se for edição-->
                        <div class="row  modal-tam">

                            <!-- left -->
                            <div class="col-12 col-md-8 left">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title todo:</label>
                                    <input
                                        v-model="title_todo"
                                        type="text"
                                        class="form-control"
                                        id="title"
                                        name="title"
                                    />
                                </div>

                                <div class="mb-3">
                                    <label for="desc">Description todo:</label>
                                    <textarea
                                        v-model="desc_todo"
                                        class="form-control"
                                        rows="5"
                                        id="desc"
                                        name="text"
                                    ></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="tags">Tag todo:</label>
                                    <div class="input-group">
                                        <select
                                            v-model="tag"
                                            class="form-select"
                                            id="tags"
                                            name="tags"
                                        >
                                            <option value=""></option>
                                            <option value="back">Back-end</option>
                                            <option value="front">Front-end</option>
                                            <option value="api">API</option>
                                        </select>
                                        <div class="input-group-text">
                                            <input
                                                v-model="color"
                                                type="color"
                                                class="form-control form-control-color"
                                                id="colors"
                                                name="colors"
                                                value="#000000"
                                            />
                                        </div>
                                        <button
                                            class="btn btn-primary"
                                            type="button"
                                            @click="addTag"
                                        >
                                        <span class="material-symbols-outlined">add</span>
                                        </button>
                                    </div>
                                </div>

                                <div v-for="tag in tags_todo" :key="tag.id" class="div-tags" >
                                    <button class="tag-color" :style="{backgroundColor: tag.colorG }" @click="delTag(tag)" ></button>
                                </div>

                            </div>

                            <!-- right -->
                            <div class="col-12 col-md-4 right">
                                <div class="mb-3">
                                    <label for="step">Steps todo:</label>
                                    <div class="input-group">
                                    <div class="input-group-text">
                                        <input 
                                            v-model="completed_step" 
                                            type="checkbox" />
                                    </div>
                                        <input
                                            v-model="title_step"
                                            type="text"
                                            class="form-control"
                                            id="step"
                                            name="step"
                                        />
                                        <button
                                            class="btn btn-primary"
                                            type="button"
                                            @click="addStep"
                                        >
                                        <span class="material-symbols-outlined">add</span>
                                        </button>
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

                        </div> <!--row-->
                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-success save">{{ isEdit ? 'Save' : 'Add' }}</button>
                        </div> <!--end-->
                    </form> <!--form-->
                </div> <!--body-->
            </div> <!--content-->

        </div>

    </div> <!--dialog-->
</template>