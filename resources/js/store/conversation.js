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
    }
  },
  mutations,
  actions
}
