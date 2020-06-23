<template>
  <a :href="`/mentions/${body}`">{{ body }}</a>
</template>

<script>
export default {
  props: {
    body: {
      type: String,
      required: true
    }
  }
}
</script>
