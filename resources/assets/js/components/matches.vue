<template>
    <div>
        <h2>Matches</h2>
        
    </div>
</template>
<script>
    export default{
        data(){
            return{
                articles: [],
                article: {
                    id: '',
                    title: '',
                    body: ''
                },
                article_id: '',
                pagination: {},
                edit: false
            }
        }
       
    }
</script>