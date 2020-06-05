<template>
    <div>
        <p>{{message}}</p>
        <small>{{user}}</small>

    </div>
</template>

<script>
 export default 
    {
        data(){
            return{
                message: "This is a message",
                user: "John Doe"
            }
        }
    }
</script>

<style lang="css">

</style>