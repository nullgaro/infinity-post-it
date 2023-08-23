<script>
    import "../app.css";

    let ProfileIcon;
    export let props;
    let profilePath = `./public/images/profiles/${props.author.toLowerCase()}.png`
    console.log(profilePath)
</script>
<template lang="pug">
    li(class="bg-yellow-600 text-p-white block h-52 w-52 p-4 m-4 shadow-[0_35px_60px_-15px_rgba(0,0,0,0.3)]")
        div(class="flex w-full h-1/6 justify-start mb-2")
            img(src="{profilePath}" alt="{props.author}" class="h-full mr-2")
            h2(class="font-bold text-xl") {props.author}
        p(class="text-sm") {props.content}
</template>