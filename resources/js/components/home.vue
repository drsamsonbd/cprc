<template>
<div>
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

   

   </div> 
</template>

<script type="text/javascript">
export default{
  created(){
    if(!User.loggedIn()){
      this.$router.push({name:'/'})
    }
  },

  }



</script>

<style type="text/css">

</style>