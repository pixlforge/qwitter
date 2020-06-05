import axios from 'axios'

export default {
  data () {
    return {
      form: {
        body: '',
        media: []
      },
      media: {
        images: [],
        video: null,
        progress: 0
      },
      mediaTypes: {}
    }
  },
  mounted () {
    this.getMediaTypes()
  },
  methods: {
    async submit () {
      try {
        if (this.media.images.length || this.media.video) {
          const media = await this.uploadMedia()
          this.form.media = this.mapMediaIds(media)
        }
        
        await this.post()
        
        this.form.body = ''
        this.form.media = []
        this.media.video = null
        this.media.images = []
        this.media.progress = 0
      } catch (e) {
        console.log(e)
      }
    },
    mapMediaIds (media) {
      return media.data.data.map((m) => m.id)
    },
    async uploadMedia () {
      return await axios.post('/api/media', this.buildMediaForm(), {
        headers: {
          'Content-Type': 'multipart/form-data'
        },
        onUploadProgress: this.handleUploadProgress
      })
    },
    handleUploadProgress (event) {
      this.media.progress = parseInt(Math.round((event.loaded / event.total) * 100))
    },
    buildMediaForm () {
      const form = new FormData()
      
      if (this.media.images.length) {
        this.media.images.forEach((image, index) => {
          form.append(`media[${index}]`, image)
        })
      }

      if (this.media.video) {
        form.append('media[0]', this.media.video)
      }

      return form
    },
    async getMediaTypes () {
      try {
        const res = await axios.get('/api/media/types')
        this.mediaTypes = res.data.data
      } catch (e) {
        console.log(e)
      }
    },
    handleMediaSelected (files) {
      Array.from(files).slice(0, 4).forEach((file) => {
        if (this.mediaTypes.image.includes(file.type)) {
          this.media.images.push(file)
          this.media.video = null
        }

        if (this.mediaTypes.video.includes(file.type)) {
          this.media.video = file
          this.media.images = []
        }
      })
    },
    handleVideoRemove () {
      this.media.video = null
    },
    handleImageRemove (imageToRemove) {
      this.media.images = this.media.images.filter((image) => {
        return image != imageToRemove
      })
    }
  }
}