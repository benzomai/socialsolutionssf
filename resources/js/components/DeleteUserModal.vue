<template>
    <!-- Delete a User Modal -->
    <div class="modal fade" id="deleteUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
    
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
            <div class="modal-body">
                <input id="id" v-model="id" name="id" hidden>
                <div class="mb-3">
                    <h3>Are you sure you want to delete ?</h3>
                </div>
                <div class="mb-3">
                    <label class="form-label">Enter <span class="text-danager">"DELETE"</span> below to confirm</label>
                    <input type="password" v-model="confirmation" class="form-control">
                </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <!--<input type="submit" class="btn btn-success" value="Add Client" />-->
                <button type="button" @click="delete" class="btn btn-danger">Delete</button>
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
        props: [ 'users'],


        data() {
            return {
                // Error list for validation errors
                errorList: [],
                // Client data to be submitted
                id:'',
                confirmation: ''
            }
        },
        methods:{
            // Method to create a new client
            delete() {
                var mythis = this;

                if(this.confirmation.value == "DELETE") {
                    // Axios request to create a client
                    axios.post('/api/admin/users/destroy',this.id)
                    .then(res=>{
                        // Log successful response
                        console.log("Data got through",res);
                        location.reload();
                        // Show success toast message
                        var toastEl = document.getElementById('toastMessage');
                        //var toast = new bootstrap.Toast(toastEl);
                        //toast.show();
                        // Reset client data and error list

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
    }
    </script>
    
    