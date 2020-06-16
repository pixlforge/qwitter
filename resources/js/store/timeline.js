import getters from './qweet/getters'
import mutations from './qweet/mutations'
import actions from './qweet/actions'

export default {
  namespaced: true,
  state: {
    qweets: []
  },
  getters,
  mutations,
  actions
}