const {createApp} = Vue;

const app = createApp({
    data() {
        return {
            chart: [],
            selectedElem: [],
            totalPrice: 0,
        }
    },
    methods: {
        getElementbyID(selID){
            // console.log(selID)
            this.selectedElem.length =0;

            axios.get('./server.php').then((answ)=>{
            this.selectedElem= answ.data.filter((elem)=> elem.id == selID);
            const selectionClone= [...this.selectedElem];
            const IDidentifier =selectionClone[0].id;
            this.chart.push(selectionClone);

            this.totalPrice = Math.round((this.totalPrice + selectionClone[0].price) * 100) / 100;

        })
        },
    },
    mounted() {
        
    },
})
app.mount('#app')