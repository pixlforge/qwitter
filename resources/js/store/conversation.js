import mutations from './qweet/mutations'
import actions from './qweet/actions'

export default {
  namespaced: true,
  state: {
    qweets: []
  },
  getters: {
    qweet (state) {
      return id => state.qweets.find(qweet => qweet.id == id)
    },
    parents (state) {
      return id => state.qweets.filter((qweet) => {
        return qweet.id != id && !qweet.parent_ids.includes(parseInt(id))
      })
        .sort((a, b) => a.created_at - b.created_at)
    },
    replies (state) {
      return id => state.qweets.filter(qweet => qweet.parent_id == id)
        .sort((a, b) => a.created_at - b.created_at)
    }
  },
  mutations,
  actions
}
