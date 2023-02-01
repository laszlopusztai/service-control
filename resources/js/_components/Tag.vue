<template>
    <div class="tag">
        {{ tag.name }}
    </div>
</template>

<script>
export default {
    name: "Tag",
    props: {
        tag: Object
    }
}
</script>
