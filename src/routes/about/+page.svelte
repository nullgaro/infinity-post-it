<script>
  import "../../app.css";
  import ProfileIcon from "../../lib/ProfileIcon.svelte";
  import FilterIcon from "../../lib/FilterIcon.svelte";
  import OrderIcon from "../../lib/OrderIcon.svelte";
  import PostIt from "../../lib/PostIt.svelte";

</script>

<template lang="pug">
  div(class="min-h-screen w-full bg-p-light-gray flex flex-col items-center justify-between")
    div(class="w-full py-4 px-6 bg-p-gray flex place-content-start")
      a(href="/")
        h1(class="text-4xl text-p-white") Infinity Post-it

    div(class="h-96 w-4/5 sm:w-[30rem] my-20 bg-p-gray rounded-lg flex flex-col items-center justify-center gap-5")
      h2(class="text-p-white text-3xl") About

    div(class="w-full py-4 px-6 bg-p-gray flex place-content-end")
</template>

<style lang="sass" scoped>
</style>