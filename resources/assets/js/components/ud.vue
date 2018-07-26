<template>
    <table class="nk-table">
    <thead>
        <tr>
            <th colspan="2">Account Details</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th class="text-center">Points</th>
            <th>Latest Active Predictions </th>
            
        </tr>
        <tr>
            <td class="text-center"><strong>{{arr.points}}</strong></td>
            <td>{{arr.team1}} vs {{arr.team2}}</td>
            
        </tr>
        
    </tbody>
</table>
</template>
<script>
    export default{
        data(){
            return{
                points:0,
                team1: '',
                team2: '',
                details:'',
                status:'',
                arr:{}
            }
        },
        created(){
            this.getDetails();
        },
        methods:{
            getDetails(){
                this.status = "Loading...";
                var app = this;
                axios.get('/api/user-details/1')
                .then(function (response){
                    app.arr = response.data;
                    console.log(app.arr);
                })
                .catch(function (error){
                    app.status = "An error occured: "+error;
                });
            }
        }
    }
</script>