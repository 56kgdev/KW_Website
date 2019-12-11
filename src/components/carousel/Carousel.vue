<template>
  <div>
    <slot></slot>
  </div>
</template>

<script>
export default {
  data(){
    console.log(this.$children)
    return{
      index:0,
      slides:[]
    }
  },
  mounted (){
    this.slides=this.$children
    this
  }
}
</script>

