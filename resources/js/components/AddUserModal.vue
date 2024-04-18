<template>
    <!-- Create a Client Modal -->
    <div class="modal fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
    
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add a User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" v-model="user.name" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" v-model="user.email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="text" v-model="user.password" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="select" class="form-label">User Type</label>
                        <select class="form-select" v-model.number="user.user_type" id="select" aria-label="Floating label select example">
                        <option value="0">Admin</option>
                        <option value="1">SMM</option>
                        <option value="2">Client</option>
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
                <button type="button" @click="create" id="close" class="btn btn-success"><i class="bi bi-person-fill-add"></i> Create User</button>
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
                user: {
                    name:'',
                    user_type:'',
                    email:'',
                    password:''
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
                axios.post('/api/admin/users',this.user)
                .then(res=>{
                    // Log successful response
                    console.log("Data got through",res);
                    location.reload();
                    // Show success toast message
                    var toastEl = document.getElementById('toastMessage');
                    //var toast = new bootstrap.Toast(toastEl);
                    //toast.show();
                    // Reset client data and error list
                    this.user = {
                        name:'',
                        user_type: '',
                        email:'',
                        password:'',
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
    
    