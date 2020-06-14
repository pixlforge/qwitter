<template>
  <div class="hover:bg-blue-800">
    {{ notification }}
  </div>
</template>

<script>
export default {
  props: {
    notification: {
      type: Object,
      required: true
    }
  }
}
</script>
