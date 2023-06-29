<script>
  import "./app.css";
  import Profile_icon from "./lib/Profile_icon.svelte";
</script>

<template lang="pug">
  div(class="bg-p-light-blue h-screen flex flex-col items-center")
    div(class="w-full py-4 px-6 bg-p-blue flex place-content-between")
      h1(class="text-4xl text-p-black") Infinity Post-it
      div(class="w-40 flex justify-around place-content-center")
        a(href="/about" class="mt-2 text-p-black align-baseline duration-150 hover:text-p-yellow") About
        button
          Profile_icon

    div(class="h-2/5 w-4/5 sm:w-[30rem] mt-20 bg-p-blue rounded-lg flex flex-col")
      div(class="h-1/4 w-full flex items-center")
        img(src="src/assets/images/profile_icon.svg" alt="test" class="h-10 px-2")
        p Annonymous
      form(class="h-3/4 w-fullflex flex-col items-center")
        div(class="h-2/3 w-full flex justify-center items-center")
          textarea(placeholder="Type your Post-it..." class="h-5/6 w-4/5 p-3 rounded-md bg-p-white resize-none")
        div(class="h-1/3 w-full flex justify-end items-end")
          input(name="post" value="Post-it!" type="submit" class="h-1/2 w-2/5 mr-4 mb-4 rounded-lg bg-p-yellow")

</template>

<style lang="sass" scoped>
</style>