import axios from 'axios'

export default {
  async getQweets ({ commit }, url) {
    const res = await axios.get(url)

    commit('SET_QWEETS', res.data.data)

    commit('likes/SET_LIKES', res.data.meta.likes, { root: true })

    commit('reqweets/SET_REQWEETS', res.data.meta.reqweets, { root: true })

    return res
  },
  async quoteQweet (_, { qweet, data }) {
    await axios.post(`/api/qweets/${qweet.id}/quotes`, data)
  },
  async replyToQweet (_, { qweet, data }) {
    await axios.post(`/api/qweets/${qweet.id}/replies`, data)
  },
}
