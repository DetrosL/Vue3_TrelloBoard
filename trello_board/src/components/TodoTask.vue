<script setup>
    import { ref, inject } from 'vue'
    
    const list_columns  = inject('list_columns');
    const steps_todo    = ref([]);
    const tags_todo    = ref([]);
    const list_todo     = inject('list_todo');
    const title_step    = ref('');
    const completed_step= ref(false);
    const title_todo    = ref('');
    const desc_todo     = ref('');
    const color_todo    = ref('');

    function addTag(){
        const idX = tags_todo.value.length;

        steps_todo.value.push({
            id: idX,
            titleS: title_step.value,
            completedS: completed_step.value,
        });

        title_step.value = '';
        completed_step.value = false;
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
            tagT: tags_todo.value,
            colorT: color_todo.value,
            stepsT: [...steps_todo.value],
        });
        list_columns.value[0].taskC.push(
            idX
        );
        console.log(list_columns.value[0]);

        title_todo.value    = '';
        desc_todo.value     = '';
        tags_todo.value     = '';
        color_todo.value    = '#000000';
        steps_todo.value    = [];
    }
</script>
<template>
    <div class="modal fade" id="addTaskModal">
        <div class="modal-dialog modal-dialog-centered modal-total">
            <div class="modal-content d-flex">
                <div class="modal-header">
                    <h4 class="modal-title">New Task</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div> <!--header-->

                <div class="modal-body">
                    <form @submit.prevent="newTask">
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
                                            v-model="tags_todo"
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
                                                v-model="color_todo"
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

                                <div v-for="tag in tags_todo" :key="tag.id" style="text-align: left;">
                                    {{ tag.titleG }}
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
                                        /> <!--
                                            @keyup.enter="addStep"-->
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
                            <button type="submit" class="btn btn-success save">Add</button>
                        </div> <!--end-->
                    </form> <!--form-->
                </div> <!--body-->
            </div> <!--content-->
        </div> <!--dialog-->
    </div>
</template>