<template>
  <div class="w-full h-1 bg-gray-800">
    <div
      :style="`width: ${progress}%;`"
      class="h-full bg-blue-500"
    />
  </div>
</template>

<script>
export default {
  props: {
    progress: {
      type: Number,
      required: true
    }
  }
}
</script>
