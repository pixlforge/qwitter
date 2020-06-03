<template>
  <div class="mb-4">
    <video
      :src="generateVideoPreview(video)"
      class="w-full rounded-lg"
      controls
      preload
    />
  </div>
</template>

<script>
export default {
  props: {
    video: {
      type: File,
      required: true
    }
  },
  methods: {
    generateVideoPreview (video) {
      return URL.createObjectURL(video)
    }
  }
}
</script>
