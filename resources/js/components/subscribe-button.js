Vue.component('subscribe-button',{
    props:{
        type:Array,
        required:true,
        default:()=>[]
    },
    methods:{
        toggoleSubscribtion(){
            if(!__auth()){
                alert('please login to subscribe')
            }
        }
    }
});