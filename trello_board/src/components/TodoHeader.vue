<script setup>
</script>
<template>
    <nav class="navbar navbar-expand-sm navbar-light bg-light"> <!--bg-dark-->
        <div class="container-fluid">
            <a class="navbar-brand" href="javascript:void(0)"><img src="../assets/freeline.png" alt="freeline" style="width: 40px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
            </button>
                <ul class="navbar-nav  justify-content-center">
                    <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">Workspaces</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">Recent</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">Starred</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">Templates</a>
                    </li>
                    <li>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addColModal">
                            ✚ Create C
                        </button> 
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTaskModal">
                            ✚ Create T
                        </button> 
                    </li>
                </ul>
                 <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item">
                        <form class="d-flex">
                            <input class="form-control me-2" type="text" placeholder="Search">
                        </form>                        
                    </li>
                    <li class="nav-item"><a href="">
                        <span class="material-symbols-outlined text-dark">notifications</span>
                    </a></li>
                    <li class="nav-item"><a href="">
                        <span class="material-symbols-outlined text-dark">help</span>
                    </a></li>
                    <li class="nav-item"><a href="">
                        <span class="material-symbols-outlined text-dark">account_circle</span>
                    </a></li>
                 </ul>
        </div>
    </nav>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Development Sprint Board</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav"> 
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)"><span class="material-symbols-outlined">grid_on</span> Board</a>
                    </li>
                </ul>
            </div>
            <button type="button" class="btn btn-secondary">Share</button> <!--  data-bs-toggle="modal" data-bs-target="#shareModal" -->
        </div>
    </nav>
</template>
<style scoped>
</style>
