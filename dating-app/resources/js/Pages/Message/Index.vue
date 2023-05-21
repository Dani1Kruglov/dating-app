<template>
    <div class="w-1/2 mx-auto py-6">
        <div>
            <div class="mb-4">
                <input type="text" v-model="body" class="rounded-full border">
            </div>
            <div class="mb-4">
                <a @click.prevent="store" href="#" class="rounded-lg block w-48">Send</a>
            </div>
        </div>
        <h3>Messages</h3>
        <div>
            <div v-for="message in messages">
                <p>От пользователя {{message.user_1_name}}</p>
                <p>Пользователю {{message.user_2_name}}</p>
                <p>{{message.body}}</p>
                <p>{{message.time}}</p>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "Index",
    props: [
        'messages'
    ],
    data(){
        return{
            body: ''
        }
    },

    created() {
        window.Echo.channel('store_message')
            .listen('.store_message', res=>{
                this.messages.unshift(res.message)
            })
    },
    methods:{
        store(){
            axios.post('/messages', {body:this.body, user_1_id: this.$page.props.messages[0].user_1_id, user_2_id: this.$page.props.messages[0].user_2_id})
                .then(res=>{
                    this.messages.unshift(res.data)
                })
        }
    }
}
</script>

<style scoped>

</style>
