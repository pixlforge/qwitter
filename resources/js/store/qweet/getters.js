export default {
  qweets (state) {
    return state.qweets
      .sort((a, b) => b.created_at - a.created_at)
  },
  qweet (state) {
    return id => state.qweets.find((qweet) => qweet.id === id)
  }
}
