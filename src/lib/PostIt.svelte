<script>
    import "../app.css";

    let ProfileIcon;
    export let props;
</script>
<template lang="pug">
    li(class="bg-yellow-600 text-p-white block h-52 w-52 p-4 m-4 shadow-[0_35px_60px_-15px_rgba(0,0,0,0.3)]")
        h2(class="font-bold text-xl") {props.author}
        p(class="text-sm") {props.content}
</template>