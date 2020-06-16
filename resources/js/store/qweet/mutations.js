import { get } from 'lodash'

export default {
  SET_QWEETS (state, qweets) {
    state.qweets.push(
      ...qweets.filter((qweet) => {
        return !state.qweets.map((q) => q.id).includes(qweet.id)
      })
    )
  },
  SET_REQWEETS (state, { id, count }) {
    state.qweets = state.qweets.map((qweet) => {
      if (qweet.id === id) {
        qweet.reqweets_count = count
      }

      if (get(qweet.original_qweet, 'id') === id) {
        qweet.original_qweet.reqweets_count = count
      }

      return qweet
    })
  },
  SET_REPLIES (state, { id, count }) {
    state.qweets = state.qweets.map((qweet) => {
      if (qweet.id === id) {
        qweet.replies_count = count
      }

      if (get(qweet.original_qweet, 'id') === id) {
        qweet.original_qweet.replies_count = count
      }

      return qweet
    })
  },
  REMOVE_QWEET (state, { id }) {
    state.qweets = state.qweets.filter((qweet) => qweet.id !== id)
  },
  SET_LIKES (state, { id, count }) {
    state.qweets = state.qweets.map((qweet) => {
      if (qweet.id === id) {
        qweet.likes_count = count
      }

      if (get(qweet.original_qweet, 'id') === id) {
        qweet.original_qweet.likes_count = count
      }

      return qweet
    })
  }
}
