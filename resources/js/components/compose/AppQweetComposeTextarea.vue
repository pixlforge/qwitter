<template>
  <textarea
    :value="value"
    @input="$emit('input', $event.target.value); resize($event)"
    :placeholder="placeholder"
    id=""
    class="w-full bg-gray-900 outline-none focus:shadow-outline text-lg resize-none mb-2"
  ></textarea>
</template>

<script>
export default {
  props: {
    value: {
      type: String,
      required: false,
      default () {
        return ''
      }
    },
    placeholder: {
      type: String,
      required: false,
      default() {
        return ""
      }
    }
  },
  methods: {
    resize (event) {
      event.target.style.height = 'auto'
      event.target.style.height = `${event.target.scrollHeight}px`
    }
  }
}
</script>