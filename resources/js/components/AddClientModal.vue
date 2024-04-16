<template>
    <!-- Create a Client Modal -->
    <div class="modal fade" id="addClient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
    
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add a client</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Client Business Name</label>
                    <input type="text" v-model="client.client_name" class="form-control">
                </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="select" class="form-label">Assigned User</label>
                            <select class="form-select" v-model.number="client.assigned_user" id="select" aria-label="Floating label select example">
                                <option v-for="user in users" :key="user.id" :value="user.id" >{{ user.name }}</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="select" class="form-label">Assigned SMM</label>
                            <select class="form-select" v-model="client.assign_smm" id="select" aria-label="Floating label select example">
                            <option value="0">Lou</option>
                            <option value="1">Kyra</option>
                            <option value="2">Lor</option>
                            <option value="3">Den</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Client Email Address</label>
                        <input type="email" class="form-control" v-model="client.client_email" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                    <label for="select" class="form-label">Plan</label>
                        <select class="form-select" v-model="client.plan" id="select" aria-label="Floating label select example">
                            <option value="basic">Basic</option>
                            <option value="pro">Professional</option>
                            <option value="business">Business</option>
                        </select>
                    </div>
                    <div class="mb-3" v-if="Object.keys(this.errorList).length > 0">
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                <li v-for="(error, index) in this.errorList" :key="index"> {{ error[0] }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <!--<input type="submit" class="btn btn-success" value="Add Client" />-->
                <button type="button" @click="create" id="close" class="btn btn-primary">Create</button>
            </div>
        </form>
        </div>
    </div>

        <div class="toast bg-success text-white" style="position: absolute; top: 20px; right: 20px; z-index: 99;" id="toastMessage" role="alert" aria-live="assertive" aria-atomic="true" >
            <div class="toast-header">
                <strong class="me-auto">Success</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Client added successfully! Please refresh the page to see the update list.
            </div>
        </div>
    
    </div>
    </template>
    
    <script>
    import axios from 'axios';
    
    export default {
        name: 'add-client',
        props: [ 'users' ],

        data() {
            return {
                // Error list for validation errors
                errorList: [],
                // Client data to be submitted
                client: {
                    client_name:'',
                    assigned_user:'',
                    assign_smm:'',
                    client_email:'',
                    plan:''
                }
            }
        },
        created() {
            console.log(this.myData);
        },
        methods:{
            // Method to create a new client
            create() {
                var mythis = this;
                // Axios request to create a client
                axios.post('/api/admin/home',this.client)
                .then(res=>{
                    // Log successful response
                    console.log("Data got through",res);
                    
                    // Show success toast message
                    var toastEl = document.getElementById('toastMessage');
                    var toast = new bootstrap.Toast(toastEl);
                    toast.show();
                    // Reset client data and error list
                    this.client = {
                        client_name:'',
                        assigned_user:'',
                        assign_smm:'',
                        client_email:'',
                        plan:''
                    }
                    mythis.errorList = [];
                })
                .catch(function(error) {
                    // Handle errors
                    if (error.response) {
                        if(error.response.status == 422) {
                            // Set error list for validation errors
                            mythis.errorList = error.response.data.errors;
                        }
                    } else if (error.request) {
                        console.log("Request error:", error.request);
                    } else {
                        console.log('Error message:', error.message);
                    }
                });
            }
        }
    }
    </script>
    
    