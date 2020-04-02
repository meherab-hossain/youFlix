Vue.component('subscribe-button',{
    props:{
        channel:{
            type:Object,
            required:true,
            default:()=>([])
        },
        subscriptions:{
            type:Array,
            required:true,
            default:()=>([])
        }
    },
    computed:{
        subscribed() {
            if (!__auth()) {
                return false
            }else if(__auth() && this.subscriptions.find(subscription => subscription.user_id === __auth().id)){
                return true
            }
        },
        owner(){
            if (__auth()&& this.channel.user_id ===__auth().id){
                return true
            }else
                return false
        }

    },
    methods:{
        toggoleSubscribtion(){
            if(!__auth()){
                alert('please login to subscribe')
            }
            return true
        }
    }
});