<script setup>
    import { ref, inject } from 'vue'
    
    const steps_todo    = ref([]);
    const list_todo     = inject('list_todo');
    const title_step    = ref('');
    const completed_step= ref(false);
    const title_todo    = ref('');
    const desc_todo     = ref('');
    const tags_todo     = ref('');
    const color_todo    = ref('');

    function addStep(){
        const lastIdS = steps_todo.value.length > 0 ? steps_todo.value[steps_todo.value.length - 1].id : 0

        steps_todo.value.push({
            id: lastIdS + 1,
            titleS: title_step.value,
            completedS: completed_step.value,
        });

        title_step.value = '';
        completed_step.value = false;
    }

    function newTask(){
        const lastId = list_todo.value.length > 0 ? list_todo.value[list_todo.value.length - 1].id : 0

        list_todo.value.push({
            id: lastId + 1,
            titleT: title_todo.value,
            descT: desc_todo.value,
            tagT: tags_todo.value,
            colorT: color_todo.value,
            stepsT: steps_todo,
        });
    
        title_todo.value    = '';
        desc_todo.value     = '';
        tags_todo.value     = '';
        color_todo.value    = '#000000';
        steps_todo.value    = [];
    }
</script>
<template>
    <div class="modal fade" id="addTaskModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content d-flex">
                <div class="modal-header">
                    <h4 class="modal-title">New Task</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div> 
                <form @submit.prevent="newTask">
                    <label for="title" class="form-label">Title todo:</label>
                    <input 
                        v-model="title_todo"    
                        type="text" 
                        class="form-control inputs" 
                        id="title"
                        name="title" />

                    <label for="desc">Description todo:</label>
                    <textarea 
                        v-model="desc_todo"
                        class="form-control inputs" 
                        rows="5" 
                        id="desc" 
                        name="text">
                    </textarea>
                    
                    <label for="tags">Tag todo:</label><br>
                    <select 
                        v-model="tags_todo"
                        class="form-select inputs"
                        id="tags"
                        name="tags">
                        <option value=""></option>
                        <!-- para cada coluna existente, fazer uma option, dinamicamente -->
                        <!-- <option value="backlog">Backlog</option>
                        <option value="inprogress">In Progress</option>
                        <option value="codereview">Code Review</option>
                        <option value="readytest">Ready for Testing</option>
                        <option value="awaiting">Awaiting Realease</option> -->
                    </select>
                    
                    <label for="colors">Color todo: </label>
                    <input 
                        v-model="color_todo"
                        type="color" 
                        class="form-control form-control-color colors" 
                        id="colors"
                        name="colors"
                        value="#000000" />

                    <label for="step">Steps todo: </label>
                    <div class="input-group mb-3 inputs">
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
                            @keyup.enter="addStep" />
                            <button class="btn btn-primary" type="button" @click="addStep"><span class="material-symbols-outlined">add</span></button>
                    </div>

                    <div v-for="step in steps_todo" :key="step.id">
                        {{ step.titleS }} {{ step.completedS }} <br>
                    </div>

                    <button button type="submit" class="btn btn-success save">Add</button> 
                    <!-- {{ list_todo }} -->
                </form> 
                             
            </div>
        </div>
    </div>
</template>