<template>
  <div class="w-10 h-10 relative">
    <svg viewBox="0 0 120 120" class="transform -rotate-90">

      <circle
        :r="radius"
        cx="60"
        cy="60"
        fill="none"
        stroke-width="8"
        class="stroke-current text-gray-700"
      />

      <circle
        :r="radius"
        :stroke-dasharray="dash"
        :stroke-dashoffset="offset"
        cx="60"
        cy="60"
        fill="none"
        stroke-width="8"
        class="stroke-current text-blue-500"
      />

    </svg>
  </div>
</template>

<script>
export default {
  data () {
    return {
      radius: 30
    }
  },
  computed: {
    dash () {
      return 2 * Math.PI * this.radius
    },
    offset () {
      let circ = this.dash
      let progress = 50 / 100

      return circ * (1 - progress)
    }
  }
}
</script>
