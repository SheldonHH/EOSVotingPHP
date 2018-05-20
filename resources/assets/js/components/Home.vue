<template>
    <div>
        <nav class="panel column is-offset-2 is-8">
            <p class="panel-heading">
                Phonebook
                <button class="button is-primary is-outlined" @click="openAdd">
                    Add New
                </button>
            </p>
            <div class="panel-block">
                <p class="control has-icons-left">
                    <input class="input is-small" type="text" placeholder="search" v-model="searchQuery">
                    <span class="icon is-small is-left">
        <i class="fas fa-search" aria-hidden="true"></i>
      </span>
                </p>
            </div>

            <a class="panel-block is-active" v-for="item, key in temp">
        <span class="column is-9">
            <!--marksheet-->
            {{item.name}}
        </span>
                <span class="panel-icon column is-1">
            <i class="has-text-danger fa fa-trash" aria-hidden="true " @click="del(key, item.id)"></i>
        </span>
                <span class="panel-icon column is-1">
            <i class="has-text-info fa fa-edit" aria-hidden="true" @click="openUpdate(key)"></i>
        </span>
                <span class="panel-icon column is-1">
            <i class="has-text-primary fa fa-eye" aria-hidden="true" @click="openShow(key)"></i>
        </span>
            </a>
            <label class="panel-block">
                <input type="checkbox">
                remember me
            </label>
            <div class="panel-block">
                <button class="button is-link is-outlined is-fullwidth">
                    reset all filters
                </button>
            </div>
        </nav>
        <Add :openmodal='addActive' @closeRequest='close'></Add>
        <Show :openmodal='showActive' @closeRequest='close'></Show>
        <Update :openmodal='updateActive' @closeRequest='close'></Update>
    </div>
</template>

<script>
    let Add = require('./Add.vue');
    let Show = require('./Show.vue');
    let Update = require('./Update.vue');
    export default {
        components: {
            Add, Show, Update
        },
        data() {
            return {
                addActive: '',
                showActive: '',
                updateActive: '',
                lists: {},
                errors: {},
                searchQuery: '',
                temp: {}
            }
        },
        // watch:{
        //         searchQuery(){
        //             // console.log(this.searchQuery)
        //             if(this.searchQuery.length>0){
        //                 let result = this.lists.filter((item)=>{
        //                         // console.log(index)
        //                     return item.name.toLowerCase().indexOf(this.searchQuery.toLowerCase())>-1
        //                 })
        //                 console.log(result)
        //                 this.temp = result
        //                 // this.lists = result // 不能让直接让lists等于 result
        //             }else{ // if no result, then show all result
        //                 this.temp = this.lists
        //             }
        //         }
        // },
        watch: {
            searchQuery() {
                // console.log(this.searchQuery)
                if (this.searchQuery.length > 0) {
                     this.temp = this.lists.filter((item) => {
                        // console.log(Object.keys(item))
                        return Object.keys(item).some((key) => {
                            let string = String(item[key])
                            // console.log(key)
                            return string.toLowerCase().indexOf(this.searchQuery.toLowerCase()) > -1
                        })
                    })
                }
            }
        },
        mounted() {
            console.log('mounted working')
            axios.post('/getData', this.$data.list).then((response) => this.temp = this.lists = response.data)
                .catch((error) => this.errors = error.response.data.errors)
        },
        methods: {
            del(key, id) {
                if (confirm("Are you sure?")) {
                    axios.delete(`/phonebook/${id}`)
                        .then((response) => this.lists.splice(key, 1))
                        .catch((error) => this.error.response.data.errors)
                }
                console.log(`${key} ${id}`)
            },
            openAdd() {
                this.addActive = "is-active"
            },
            openShow(key) {
                this.$children[1].list = this.temp[key]
                this.showActive = "is-active"
            },
            openUpdate(key) {
                this.$children[2].list = this.temp[key]
                this.updateActive = "is-active"
            },
            close() {
                this.addActive = this.showActive = this.updateActive = ""
            }
        }
    }
</script>

