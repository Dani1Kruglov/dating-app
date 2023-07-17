<template>
    <body>
    <h3>Chat</h3>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="input-group">
                    <input type="text" v-model="body" class="form-control" placeholder="Type your message">
                    <div class="input-group-append">
                        <a @click.prevent="store" href="#" class="rounded-lg block w-48" style="text-decoration: none; color: white">
                            <button class="btn btn-primary" type="button">Send</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body" id="chatBody">
                <div v-for="message in messages">
                    <h5>От пользователя: {{message.user_1_name}}</h5>
                    <h5>Пользователю: {{message.user_2_name}}</h5>
                    <p style="color: deeppink">{{message.body}}</p>
                    <p>{{message.time}}</p>
                </div>
            </div>
        </div>
    </div>
    </body>
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
