<script>
  import "./app.css";
  import ProfileIcon from "./lib/ProfileIcon.svelte";
  import FilterIcon from "./lib/FilterIcon.svelte";
  import OrderIcon from "./lib/OrderIcon.svelte";
  import PostIt from "./lib/PostIt.svelte";
</script>

<template lang="pug">
  div(class="bg-p-light-gray flex flex-col items-center")
    div(class="w-full py-4 px-6 bg-p-gray flex place-content-between")
      h1(class="text-4xl text-p-white") Infinity Post-it
      div(class="w-40 flex justify-around place-content-center")
        a(href="/about" class="mt-2 text-p-white align-baseline duration-150 hover:text-p-navy") About
        button
          ProfileIcon(class="h-8 w-8 [&>*]:stroke-p-white [&>*]:duration-150 [&>*]:hover:stroke-p-navy")

    div(class="h-96 w-4/5 sm:w-[30rem] my-20 bg-p-gray rounded-lg flex flex-col items-center justify-center")
      form(class="h-full w-11/12 flex flex-col justify-evenly")
        div(class="w-full flex justify-center items-center")
          div(class="h-full w-1/2 flex items-center gap-3")
            ProfileIcon(class="h-10 w-10 [&>*]:stroke-p-white")
            p(class="text-p-white") Anonymous
          div(class="h-full w-1/2 flex items-center justify-end")
            input(name="post" value="Post-it!" type="submit" class="h-8 w-3/6 rounded-2xl bg-p-navy border border-solid border-p-gray transition-all duration-300 ease-in-out hover:cursor-pointer hover:bg-p-light-navy hover:border hover:border-solid hover:border-p-navy hover:shadow-[0_0_6px_0_rgba(0,173,181,1)]")
        textarea(placeholder="Type your Post-it..." class="h-4/6 w-full p-3 rounded-md bg-p-white resize-none outline-none border-2 border-solid border-p-gray focus:border-2 focus:border-solid focus:border-p-navy transition-all duration-300 ease-in-out focus:shadow-[0_0_6px_0_rgba(0,173,181,1)]")

  div(class="w-full bg-p-brown")
    div(class="w-full py-4 px-6 bg-p-gray flex place-content-end gap-5")
        button
          //- https://www.svgrepo.com/svg/510981/filter
          FilterIcon(class="h-8 w-8 [&>*>*]:stroke-p-white [&>*>*]:duration-150 [&>*>*]:hover:stroke-p-navy")
        button
          //- https://www.svgrepo.com/svg/364195/arrows-down-up-fill
          OrderIcon(class="h-8 w-8 [&>*]:fill-p-white [&>*]:duration-150 [&>*]:hover:fill-p-navy")
    ul(class="grid grid-cols-7 grid-flow-row justify-start")
      PostIt
      PostIt
      PostIt
      PostIt
      PostIt
      PostIt
      PostIt
      PostIt
      PostIt

</template>

<style lang="sass" scoped>
</style>