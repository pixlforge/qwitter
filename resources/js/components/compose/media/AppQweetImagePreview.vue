<template>
  <div class="flex flex-wrap mb-4">
    <div
      v-for="(image, index) in images"
      :key="index"
      class="w-1/2 relative flex-grow"
    >
      <img
        :src="generateImagePreview(image)"
        alt="Preview image"
        class="rounded-lg"
      >
    </div>
  </div>
</template>

<script>
export default {
  props: {
    images: {
      type: Array,
      required: false,
      default () {
        return []
      }
    }
  },
  methods: {
    generateImagePreview (image) {
      return URL.createObjectURL(image)
    }
  }
}
</script>
