<template>
    <div class="modal" :class='openmodal'>
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Modal title</p>
                <button class="delete" aria-label="close" @click='close'></button>
            </header>
            <section class="modal-card-body">
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input" :class="{'is-danger':errors.name}" type="text" placeholder="Name" v-model="list.name">
                    </div>
                    <label class="label">Phone</label>
                    <div class="control">
                        <input class="input" type="number" placeholder="phone" v-model="list.phone">
                    </div>
                    <label class="label">Email</label>
                    <div class="control">
                        <input class="input" type="email" placeholder="Name" v-model="list.email">
                    </div>
                    <small v-if="errors.name" class="has-text-danger">{{errors.name[0]}}</small>
                </div>
            </section>
            <footer class="modal-card-foot">
                <button class="button is-success" @click='save'>Save changes</button>
                <button class="button" @click='close'>Cancel</button>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['openmodal'],
        data() {
            return {
                list: {
                    name: '',
                    phone: '',
                    email: ''
                },
                errors: {}
            }
        },
        methods: {
            save() {
                axios.post('/phonebook',this.$data.list).then((response)=> this.close())
                    .catch((error) => alert(error))
            },
            close() {
                this.$emit('closeRequest')
            }
        }
    }
</script>
