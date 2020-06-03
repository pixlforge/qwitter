<template>
  <div class="relative mb-4">
    <video
      :src="generateVideoPreview(video)"
      class="w-full rounded-lg"
      controls
      preload
    />
    <a
      @click.prevent="$emit('video:remove')"
      href="#"
      class="w-8 h-8 absolute top-0 right-0 flex justify-center items-center bg-gray-900 hover:bg-gray-800 rounded-full text-gray-400 hover:text-white transition-colors duration-100 ease-out mr-3 mt-3"
    >
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="fill-current">
        <path d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z"/>
      </svg>
    </a>
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
