<script>
  import "./app.css";
  import Profile_icon from "./lib/Profile_icon.svelte";
</script>

<template lang="pug">
  div(class="bg-p-white h-screen flex flex-col items-center")
    div(class="w-full py-4 px-6 bg-p-gray flex place-content-between")
      h1(class="text-4xl text-p-white") Infinity Post-it
      div(class="w-40 flex justify-around place-content-center")
        a(href="/about" class="mt-2 text-p-white align-baseline duration-150 hover:text-p-navy") About
        button
          Profile_icon(size="32px" color="white" class="[&>*]:duration-150 [&>*]:hover:stroke-p-navy")

    div(class="h-2/6 w-4/5 sm:w-[30rem] mt-20 bg-p-gray rounded-lg flex flex-col items-center justify-center")
      form(class="h-full w-11/12 flex flex-col justify-evenly")
        div(class="w-full flex justify-center items-center")
          div(class="h-1/5 w-1/2 flex items-center")
            Profile_icon(size="40px" color="white" class="mr-2")
            p(class="text-p-white") Annonymous
          div(class="h-full w-1/2 flex items-center justify-end")
            input(name="post" value="Post-it!" type="submit" class="h-8 w-3/6 rounded-2xl bg-p-navy")
        textarea(placeholder="Type your Post-it..." class="h-4/6 w-full p-3 rounded-md bg-p-white resize-none")

    //- div(class="h-2/5 w-4/5 sm:w-[30rem] mt-20 bg-p-blue rounded-lg flex flex-col items-center")
    //-   div(class="h-1/5 w-5/6 flex items-center")
    //-     img(src="src/assets/images/profile_icon.svg" alt="test" class="h-10 mr-2")
    //-     p Annonymous
    //-   form(class="h-4/5 w-5/6 flex flex-col items-center")
    //-     div(class="h-3/4 w-full flex justify-center items-center")
    //-       textarea(placeholder="Type your Post-it..." class="h-full w-full p-3 rounded-md bg-p-white resize-none")
    //-     div(class="h-1/4 w-full flex justify-end items-end")
    //-       input(name="post" value="Post-it!" type="submit" class="h-1/2 w-2/5 mb-4 rounded-lg bg-p-yellow")

</template>

<style lang="sass" scoped>
</style>