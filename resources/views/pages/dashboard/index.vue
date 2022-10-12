<template>
    <BackendLayout>
        <div class="card">
            <div class="header">
                <span>Dashboard</span>
            </div>
            <div class="body p-3" style="position: relative;min-height: 300px;">
                <p>Welcome ! MBM Group Admin</p>

                <pre style="margin-top: 15px;">
                    Developer Contact:
                    -------------------
                    MD. Shaikot Ikbal Hridoy
                    Senior Software Engineer
                    Mobile: +880-01734476075
                    Email: ikbal15.1320.japan@gmail.com
                </pre>

                <div style="display:flex;gap:10px;position:absolute;bottom: 35px;">
                    <img :src="baseURL+'/public/icons/laravel.png'" style="width: 40px;">
                    <img :src="baseURL+'/public/icons/plus.png'" style="width: 50px;">
                    <img :src="baseURL+'/public/icons/vue.png'" style="width: 40px;">
                </div>
            </div>
        </div>
    </BackendLayout>
</template>

<script setup>
    import { ref, reactive, onMounted, computed } from "vue";
    import { usePage, useForm } from '@inertiajs/inertia-vue3';

    const baseURL = window.baseURL;

</script>   

<style lang="scss" scoped>
    .search{
        margin: 0px;
        input{
            width: 200px;
            height: 35px;
            padding: 5px;
        }
    }
    label{
        text-transform: capitalize;
        font-weight: 600;
        &:after{
            content: ' : '
        }
    }
    pre{
        display: flex;
        align-items: flex-end;
        position: absolute;
        left: -135px;
    }
</style>