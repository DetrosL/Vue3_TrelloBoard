<script setup>
    import { ref, inject } from 'vue'
    
    const list_todo     = inject('list_todo');

    function newTask(){
        const lastId = list_todo.value.length > 0 ? list_todo.value[list_todo.value.length - 1].id : 0

        list_todo.value.push({
            id: lastId + 1,
            titleT: title_todo.value,
            descT: title_todo.value,
            tagT: completed.value,
            colorT: completed.value,
            // stepT: completed.value,
        })
    
        title_todo.value = '';
        completed.value = '';
    }    
</script>
<template>
    <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
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
                        name="title">

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
                        <option value="a">a</option>
                    </select>
                    <br>
                    
                    <label for="colors">Color todo: </label>
                    <input 
                        v-model="color_todo"
                        type="color" 
                        class="form-control form-control-color colors" 
                        id="colors"
                        name="colors"
                        value="#18c00c">
                    
                    <label for="step" class="form-label">Step todo:</label>
                    <input 
                        v-model="step_todo"    
                        type="text" 
                        class="form-control inputs" 
                        id="step"
                        name="step">
                    <button button type="submit" class="btn btn-primary save">Add</button> 
                </form>
            </div>
        </div>
    </div>
</template>
<style scoped>
    form {
        margin-top: 1em;
        text-align: center;
        justify-items: center;
    }

    label {
        font-size: 17px;
    }

    .inputs {
        width: 25em;
        border: 1px solid #a5a5a5da;
        margin-bottom: 1.4em;
    }

    .colors{
        margin-bottom: 1.4em;
    }

    .save {
        padding: 0.6em 1.2em;
        font-weight: 500;
        width: 25em;
        margin-bottom: 1.5em;
    }
</style>