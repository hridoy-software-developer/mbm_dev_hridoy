<template>
    <BackendLayout>
        <div class="card">
            <div class="header">
                <span>Post details</span>
                <div class="d-flex" style="gap: 5px;align-items: center;">
                    <img :src="baseURL+'/public/icons/wating.gif'" 
                        style="width: 35px;height: 35px;margin-right: 8px;display:none;" class="wating_loader">
                    <p class="search" style="display: flex;gap: 10px;align-items: center;">
                        <span>Search: </span>
                        <input type="text" name="" placeholder="type and press enter" 
                        @keyup.enter="searchAnythingEnter($event)" @keyup="searchAnything($event)">
                    </p> 
                    <select class="form-control" @change="download($event)">
                        <option value="">Export Record</option>
                        <option value="csv">Csv</option>
                    </select> 
                    <Link :href="baseURL+'/admin/post/create'" class="btn btn-sm btn-success" style="width: 100px;">Add New</Link>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>
                                    <span class="mr-2">Title</span>
                                    <span class="pointer" v-if="form.sort.title == 'desc'" 
                                    @click="sorting('title','asc')">⬆️</span>
                                    <span class="pointer" v-if="form.sort.title == 'asc'" 
                                    @click="sorting('title','desc')">⬇️</span>
                                </th>
                                <th>
                                    <span class="mr-2">Description</span>
                                    <span class="pointer" v-if="form.sort.description == 'desc'" 
                                    @click="sorting('description','asc')">⬆️</span>
                                    <span class="pointer" v-if="form.sort.description == 'asc'" 
                                    @click="sorting('description','desc')">⬇️</span>
                                </th>
                                <th class=""></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="form.records.length == 0">
                                <td colspan="100" class="text-center">No record found</td>
                            </tr>
                            <tr v-for="(record,index) in form.records">
                                <td>{{((paginationForm.current_page - 1) * paginationForm.per_page) + (index + 1)}}</td>
                                <td>{{record.title}}</td>
                                <td>{{record.description}}</td>
                                <td>
                                    <div style="display:flex;gap: 10px;">
                                        <Link :href="baseURL+'/admin/post/edit/'+record.id" class="btn btn-sm btn-warning">Edit</Link>
                                        <button class="btn btn-sm btn-danger" @click="deleteParams(record)">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <pagination 
                    :paginationForm="paginationForm"
                    @onPaginationChange="paginationChangeEvent">
                </pagination>
                <iframe src="" style="width:100%;height:300px;display:none;" id="iframe"></iframe>
            </div>
        </div>
    </BackendLayout>
</template>

<script setup>
    import { ref, reactive, onMounted, computed } from "vue";
    import { usePage, useForm } from '@inertiajs/inertia-vue3';

    const baseURL = window.baseURL;

    const paginationForm = reactive({
        current_page: 1,
        per_page: 0,
        total: 0,
        prev_page_url: null,
        next_page_url: null,
    });

    const form = reactive({
        records: [],
        sort:{
            title: 'desc',
            description: 'desc'
        }
    });

    const loadBaseApi = (url) => {
        $('.wating_loader').show();
        https.get(url)
        .then((response) => {
            var response = response.data;
            if(response.statusCode == 200){
                var results = response.results;
                paginationForm.current_page = results.current_page;
                paginationForm.total = results.total;
                paginationForm.per_page = results.per_page;
                paginationForm.prev_page_url = results.prev_page_url;
                paginationForm.next_page_url = results.next_page_url;
                form.records = results.data;
                $('.wating_loader').hide();
            }
        })
        .catch(error => {
            console.log(error);
        }).finally(() => $('.wating_loader').css('display', 'none'));
    };

    onMounted(() => {
        loadBaseApi(baseURL+"/admin/post/list");
    });

    const paginationChangeEvent = (url) => {
        loadBaseApi(url);
    };

    const searchAnything = (event) => {
        if(event.currentTarget.value == ''){
            loadBaseApi(baseURL+"/admin/post/list");
        }
    };

    const searchAnythingEnter = (event) => {
        loadBaseApi(baseURL+'/admin/post/list?search='+event.currentTarget.value);
    };

    const sorting = (field,sort) => {
        if(field == 'title'){
            form.sort.title = sort;
        }

        if(field == 'description'){
            form.sort.description = sort;
        }

        loadBaseApi(baseURL+'/admin/post/list?field='+field+'&&sort='+sort);
    };

    const deleteParams = (record) => {
        if(confirm('Are you share delete this information ? ')){
            $('.wating_loader').show();
            Inertia.post(baseURL+'/admin/post/delete',record);
            return;
        }
    };

    const download = (event) => {
        if(event.target.value !== ''){
            $('.wating_loader').show();
            $('#iframe').attr('src',baseURL+'/admin/post/download/'+event.target.value);
            setTimeout(function(){
                $('.wating_loader').hide();
            }, 2500);
        }
    };

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
    select{
        width: 200px;
        height: 35px;
        padding: 5px;
    }
    .pointer{
        cursor: pointer;
    }
</style>