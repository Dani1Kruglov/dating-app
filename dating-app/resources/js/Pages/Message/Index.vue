<template>
    <body>
    <h3>Chat with: {{interlocutor[0].interlocutor_name}}</h3>
    <img  class="rounded-circle me-2" v-bind:src="'/storage/' + interlocutor[0].interlocutor_image"   style="height: 250px; width: 250px; object-fit: cover;">
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
        'messages',
        'interlocutor'
    ],
    data(){
        return{
            body: ''
        }
    },

    created() {
        window.Echo.channel(`store_message_${this.$page.props.messages[0].private_channel}`)
            .listen('.store_message', res=>{
                console.log(res)
                this.messages.unshift(res.message)
            })
    },
    methods:{
        store(){
            axios.post('/messages', {body:this.body, user_1_id: this.$page.props.messages[0].user_1_id, user_2_id: this.$page.props.messages[0].user_2_id, private_channel: this.$page.props.messages[0].private_channel, hash_private_channel: this.$page.props.messages[0].hash_private_channel})
                .then(res=>{
                    this.messages.unshift(res.data)
                })
        }
    }
}
</script>

<style scoped>

</style>

