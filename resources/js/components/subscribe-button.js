import numeral from 'numeral'

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
    data(){
      return{
          number:this.subscriptions.length
      }
    },
    computed:{
        subscribed() {
            if (!__auth()|| this.subscriptions.user_id===__auth().id ) {
                return false
            }else{
                return !!this.subscription
            }
        },
        owner(){
            if (__auth()&& this.channel.user_id ===__auth().id){
                return true
            }else
                return false
        },
        subscription(){
          if(!__auth()){
              return false
          }  else {
             return (__auth() && this.subscriptions.find(subscription => subscription.user_id === __auth().id))
          }
        },
        count(){
            var SI_SYMBOL = ["", "k", "M", "G", "T", "P", "E"];
            // what tier? (determines SI symbol)
            var tier = Math.log10(this.number) / 3 | 0;
            console.log('tier',tier);
            // if zero, we don't need a suffix
            if(tier === 0) return this.number;

            // get suffix and determine scale
            var suffix = SI_SYMBOL[tier];
            var scale = Math.pow(10, tier * 3);

            // scale the number
            var scaled = this.number / scale;
            // format number and add suffix
            return scaled.toFixed(2) + suffix;


            //another way to use number format using package called numeral
            //step-1--> import numeral from 'numeral'
            //step-2-->return numeral(this.number).format('0a');

        }

    },
    methods:{
        toggoleSubscribtion(){
            if(!__auth()){
                alert('please Login to continue')
            }
            if(this.owner){
                alert('you cant subscribe your own channel')
            }
            /*if(this.subscribed){
                console.log('subscribe')
                axios.delete(`http://127.0.0.1:8000/api/channels/${this.channel.id}/subscription/${this.subscription.id}`)
            }else{
                axios.post(`/channels/${this.channel.id}/subscription`)
            }*/
            if (this.subscribed) {
                axios.delete(`/channels/${this.channel.id}/subscription/${this.subscription.id}`)
                    .then((res)=>{
                        console.log(res)
                    })
            } else {
                axios.post(`/channels/${this.channel.id}/subscription`)
            }
        }
    }
});