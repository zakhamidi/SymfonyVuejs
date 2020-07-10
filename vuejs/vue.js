new Vue({
    el: '#app',
    data () {
      return {
        info: [],
        loading: true,
        errored: false
      }
    },
    mounted () {
      axios
        //Get our json code from API
        .get('http://localhost:3000/api/beverages')
        .then(response => {
          this.info = response.data
        })
        //catch if there is any error
        .catch(error => {
          console.log(error)
          this.errored = true
        })
        .finally(() => this.loading = false)
    }
  })